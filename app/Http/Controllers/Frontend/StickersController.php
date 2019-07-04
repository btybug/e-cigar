<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Stickers;
use App\Models\Stock;
use Illuminate\Http\Request;

class StickersController extends Controller
{


    protected $view = 'frontend.stickers';

    public function index($id = null)
    {
        $stickers = Stickers::get();
        $id = ($id || !$stickers->count()) ? $id : $stickers->first()->id;
        $current = ($id) ? Stickers::find($id) : null;

        return $this->view('index', compact('stickers', 'slug', 'current'));
    }

    public function postSticker(Request $request)
    {
        $current = Stickers::findOrFail($request->id);
        if($current){
            $html = view("frontend.stickers._partials.current",compact('current'))->render();
            return response()->json(['error' => false,'html' => $html]);
        }

        return response()->json(['error' => true]);
    }

}

