<?php

namespace App\Http\Controllers\Frontend;

use App\Events\Tickets;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Requests\ChangePasswordRequest;
use App\Http\Controllers\Frontend\Requests\MyAccountRequest;
use App\Http\Controllers\Frontend\Requests\VerificationRequest;
use App\Http\Requests\AddressesRequest;
use App\Models\Addresses;
use App\Models\Category;
use App\Models\GeoZones;
use App\Models\Media\Folders;
use App\Models\Media\Items;
use App\Models\Orders;
use App\Models\Statuses;
use App\Models\Ticket;
use App\Models\Settings;
use App\Models\ZoneCountries;
use App\Services\FileService;
use App\User;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UserController extends Controller
{
    private $countries;
    private $geoZones;
    private $statuses;
    private $category;
    private $user;
    private $fileService;
    private $settings;

    protected $view = 'frontend.my_account';

    public function __construct(
        Countries $countries,
        GeoZones $geoZones,
        Statuses $statuses,
        Category $category,
        User $user,
        FileService $fileService,
        Settings $settings
    )
    {
        $this->countries = $countries;
        $this->geoZones = $geoZones;
        $this->statuses = $statuses;
        $this->category = $category;
        $this->user = $user;
        $this->fileService = $fileService;
        $this->settings = $settings;
    }

    public function index()
    {
        $user = \Auth::user();
        return $this->view('index', compact('user'));
    }

    public function getFavourites()
    {
        $user = \Auth::user();
        return $this->view('favourites', compact('user'));
    }

    public function saveMyAccount(MyAccountRequest $request)
    {
        $data = $request->except('_token');
        $user = \Auth::user();
        $user->update($data);
        return redirect()->back();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if (\Hash::check($request->get('current_password'), \Auth::user()->password)) {
            $user = \Auth::user();
            $user->password = \Hash::make($request->get('current_password'));
            $user->save();
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['messages' => 'Current Password is wrong!!!']);
    }

    public function getAddress()
    {
        $user = \Auth::user();
        $billing_address = $user->addresses()->where('type', 'billing_address')->first();
        $default_shipping = $user->addresses()->where('type', 'default_shipping')->first();
        $address = $user->addresses()->where(function ($query) {
            $query->where('type', 'address_book')->orWhere('type', 'default_shipping');
        })
            ->pluck('first_line_address', 'id');
        $countries = $this->countries->all()->pluck('name.common', 'name.common')->toArray();
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries', 'geo_zones.id', '=', 'zone_countries.geo_zone_id')
                ->select('zone_countries.*', 'zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        return $this->view('address', compact('billing_address', 'default_shipping', 'address', 'user', 'countries', 'countriesShipping'));
    }

    public function postAddress(AddressesRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = \Auth::id();
        Addresses::updateOrCreate(['id' => $request->get('id', null), 'user_id' => $data['user_id']], $data);
        return redirect()->back();
    }

    public function postAddressBookForm(Request $request)
    {
        $id = $request->get('id', 0);
        $default = $request->get('default', false);

        $address_book = \Auth::user()->addresses()->find($id);
        $countriesShipping = [null => 'Select Country'] + $this->geoZones
                ->join('zone_countries', 'geo_zones.id', '=', 'zone_countries.geo_zone_id')
                ->select('zone_countries.*', 'zone_countries.name as country')
                ->groupBy('country')->pluck('country', 'id')->toArray();

        $html = $this->view('_partials.new_address', compact(['address_book', 'countriesShipping', 'default']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postAddressBookSelect(Request $request)
    {
        $address = Addresses::findOrFail($request->id);

        $html = $this->view('_partials.render_address', compact(['address']))->render();

        return \Response::json(['error' => false, 'html' => $html]);
    }

    public function postAddressBookSave(AddressesRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = \Auth::id();
        if ($request->get('make_default')) {
            $data['type'] = 'default_shipping';
            \Auth::user()->addresses()->where('type', 'default_shipping')->update(['type' => 'address_book']);
        }
        $address = Addresses::updateOrCreate(['id' => $request->get('id', null), 'user_id' => $data['user_id']], $data);

        return \Response::json(['error' => false, 'data' => $address]);
    }

    public function getOrders()
    {
        $user = \Auth::user()->with('orders')->first();
        return $this->view('orders', compact('user'));
    }

    public function getOrderInvoice($id)
    {
        $order = Orders::where('id', $id)
            ->with('items')
            ->with('user')->first();
        if (!$order) abort(404);

        return $this->view('order_invoice', compact('order'));
    }

    public function getTickets()
    {
        $tickets = \Auth::user()->tickets()->paginate(10);

        return $this->view('tickets', compact(['tickets']));
    }

    public function getTicketsNew()
    {
        $priorities = $this->statuses->where('type', 'ticket_priority')->get()->pluck('name', 'id')->all();
        $categories = $this->category->where('type', 'tickets')->get()->pluck('name', 'id')->all();

        return $this->view('tickets_open', compact(['priorities', 'categories']));
    }

    public function getTicketsView($id)
    {
        $ticket = Ticket::where('id', $id)->where('user_id', \Auth::id())->first();

        if (!$ticket) abort(404);
        $replies = $ticket->replies()->main()->get();
        $data = mergeCollections($replies, $ticket->history);

        return $this->view('ticket_view', compact(['ticket', 'data']));
    }

    public function postTicketsNew(Request $request)
    {
        $data = $request->except('_token', 'attachments');

        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->fileService->allExtensions());

        $validate = $this->fileService->validate($request->all(), [
            'subject' => 'required',
            'summary' => 'required',
            'attachments.*' => 'sometimes|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        if ($validate) return redirect()->back()->withErrors($validate);

        $status = $setting = $this->settings->getData('tickets', 'open');
        $data['user_id'] = \Auth::id();
        $data['status_id'] = ($status) ? $status->val : $this->statuses->where('type', 'tickets')->first()->id;

        $ticket = Ticket::create($data);

        if ($ticket) {
            if ($request->hasfile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $this->fileService->saveFiles($ticket->attachments(), $file);
                }
            }
        }
        event(new Tickets(\Auth::user(), $ticket));
        return redirect()->route('my_account_tickets');
    }

    public function ticketMarkCompleted(Request $request, $id)
    {
        $ticket = Ticket::where('id', $id)->where('user_id', \Auth::id())->first();
        $status = $this->settings->getData('tickets', 'completed');

        if (!$ticket or !$status) abort(404);
        $ticket->update(['status_id' => $status->val]);

        return redirect()->route('my_account_tickets');
    }

    public function getLogs()
    {
        return $this->view('logs');
    }

    public function getPassword()
    {
        return $this->view('password');
    }

    public function getVerification()
    {
        return $this->view('verification');
    }

    public function getPayments()
    {
        return $this->view('payment');
    }

    public function postVerification(VerificationRequest $request)
    {
        $item = $request->file('verification_image');
        $user = \Auth::user();
        $folder = Folders::where('name', 'drive')->first();
        if ($folder && \File::isDirectory($folder->path())) {
            $realName = $user->id . '.' . $request->get('verification_type');
            $originalName = md5(uniqid()) . '.' . $item->getClientOriginalExtension();
            if ($item->move($folder->path(), $originalName)) {
                $item = Items::create([
                    'original_name' => $originalName,
                    'real_name' => $realName,
                    'extension' => $item->getClientOriginalExtension(),
                    'size' => \File::size($folder->path() . DIRECTORY_SEPARATOR . $originalName),
                    'folder_id' => $folder->id
                ]);
            }
        }
        $user->verification_image = $item->relativeUrl;
        $user->verification_type = $request->get('verification_type');
        $user->save();
        return redirect()->back();
    }

    public function getNotifications()
    {
        $user=\Auth::getUser();
        $messages=$user->customEmails()->where('custom_emails.status',1)->orderBy('id','DESC')->get();
        return $this->view('notifications',compact('messages'));
    }

}

