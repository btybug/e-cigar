<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GeoZones;
use App\Models\Items;
use App\Models\Statuses;
use App\Models\Settings;
use App\Services\FileService;
use App\User;
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

