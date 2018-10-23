<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $view='frontend.guest';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getFaq()
    {
        return $this->view('faq');
    }

    public function getKnowledgeBase()
    {
        return $this->view('knowledge_base');
    }

    public function getManuals()
    {
        return $this->view('manuals');
    }

    public function getTicket()
    {
        return $this->view('ticket');
    }

    public function getTermsConditions()
    {
        return $this->view('terms_conditions');
    }

    public function getDelivery()
    {
        return $this->view('delivery');
    }

    public function getWholeSellers()
    {
        return $this->view('whole_sellers');
    }
}
