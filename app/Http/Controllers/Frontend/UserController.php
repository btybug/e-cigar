<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Requests\VerificationRequest;
use App\Models\Media\Folders;
use App\Models\Media\Items;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $view = 'frontend.my_account';

    public function index()
    {
        $user = \Auth::user();
        return $this->view('index', compact('user'));
    }

    public function getFavourites()
    {
        return $this->view('favourites');
    }

    public function getAddress()
    {
        return $this->view('address');
    }

    public function getOrders()
    {
        return $this->view('orders');
    }

    public function getTickets()
    {
        return $this->view('tickets');
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
        $user->verification_image=$item->relativeUrl;
        $user->verification_type=$request->get('verification_type');
        $user->save();
        return redirect()->back();
    }
}

