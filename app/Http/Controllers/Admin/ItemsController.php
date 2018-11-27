<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/26/2018
 * Time: 10:34 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ItemsRequest;
use App\Models\Attributes;
use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    protected $view = 'admin.items';

    public function index()
    {
        return $this->view('index');
    }

    public function getNew()
    {
        $model = null;
        $allAttrs = Attributes::with('children')->whereNull('parent_id')->get();
        return $this->view('new', compact('model', 'allAttrs'));
    }

    public function postNew(ItemsRequest $request)
    {
        $data = $request->only('sku', 'image');
        $item = Items::updateOrCreate($request->id, $data);
        $this->saveImages($request, $item);
        $this->saveVideos($request, $item);
        $this->saveDownloads($request, $item);
        return redirect()->route('admin_items');
    }

    private function saveImages(Request $request, $item)
    {
        $images = $request->get('other_images');
        if ($images) {
            $data = [];
            foreach ($images as $image) {
                $data[] = ['url' => $image, 'type' => 'image', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    private function saveVideos(Request $request, $item)
    {
        $videos = $request->get('videos');
        if ($videos) {
            $data = [];
            foreach ($videos as $video) {
                $data[] = ['url' => $video, 'type' => 'video', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    private function saveDownloads(Request $request, $item)
    {
        $downloads = $request->get('downloads');
        if ($downloads) {
            $data = [];
            foreach ($downloads as $download) {
                $data[] = ['url' => $download, 'type' => 'download', 'item_id' => $item->id, 'created_at' => date('Y-m-d h:i:s')];
            }
            return \DB::table('items_media')->insert($data);
        }
        return null;
    }

    public function getPurchase($id)
    {
        $item = Items::FindOrFail($id);
        return $this->view('purchase', compact('item'));
    }

    public function getSuppliers()
    {
        return $this->view('suppliers.index');
    }

    public function getSaleChannels()
    {
        return $this->view('sale_channels.index');
    }
}