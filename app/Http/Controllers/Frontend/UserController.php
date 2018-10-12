<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $view = 'frontend.my_account';

    public function index()
    {
        return $this->view('index');
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

}
