<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Stickers;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    protected $view = 'admin.tools';

    public function index()
    {
        return $this->view('index');
    }

    public function stickers()
    {
        $stickers = Stickers::all();
        return $this->view('stickers',compact(['stickers']));
    }

    public function postStickersManage(Request $request)
    {
        $data=$request->except(['_token','translatable'],[]);
        Stickers::updateOrCreate($request->id,$data);
        return redirect()->back();
    }

    public function postStickersManageForm(Request $request)
    {
        $model=Stickers::findOrFail($request->get('id'));
        $path=$this->view.'.stickers_form';
        $html=\View::make($path)->with(['model'=>$model])->render();
        return \Response::json(['error'=>false,'html'=>$html]);
    }
}