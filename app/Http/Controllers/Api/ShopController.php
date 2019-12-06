<?php


namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

class ShopController
{
    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function getShop(Request $request)
    {
        return $request->user()->shops()->pluck('name', 'id');
    }
}
