<?php

namespace App\Http\Controllers\Frontend;

use App\Events\Tickets;
use App\Http\Controllers\Admin\Requests\UserAvaratRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Requests\ChangePasswordRequest;
use App\Http\Controllers\Frontend\Requests\MyAccountContactRequest;
use App\Http\Controllers\Frontend\Requests\MyAccountRequest;
use App\Http\Controllers\Frontend\Requests\VerificationRequest;
use App\Http\Requests\AddressesRequest;
use App\Models\Addresses;
use App\Models\Category;
use App\Models\GeoZones;
use App\Models\MailJob;
use App\Models\Media\Folders;
use App\Models\Media\Items;
use App\Models\Newsletter;
use App\Models\Notifications\CustomEmails;
use App\Models\Notifications\CustomEmailUser;
use App\Models\Orders;
use App\Models\Statuses;
use App\Models\Ticket;
use App\Models\Settings;
use App\Models\ZoneCountries;
use App\Services\FileService;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class WholesalerController extends Controller
{
    private $countries;
    private $geoZones;
    private $statuses;
    private $category;
    private $user;
    private $fileService;
    private $settings;

    protected $view = 'frontend.wholesaler';

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

    public function index(Request $request)
    {
        $categories = Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name', 'slug');
        $items = Items::all();

        if($request->ajax()){
            $html = View('frontend.wholesaler._partials.items_render',compact(['items']))->render();
            return response()->json(['error' => false, 'html' => $html]);
        }
        return $this->view('index', compact('items'));
    }
}

