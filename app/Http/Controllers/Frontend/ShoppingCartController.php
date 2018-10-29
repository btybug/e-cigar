<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Posts;
use App\Models\Products;
use App\Models\Stock;
use App\Models\StockVariationOption;
use View;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $view= 'frontend.shop';

    public function index()
    {
        return $this->view('index');
    }

    public function getCart()
    {
        return $this->view('cart');
    }

    public function getCheckOut()
    {
        return $this->view('check_out');
    }

    public function postAddToCart(Request $request)
    {
        dd($request->all());
    }
}
