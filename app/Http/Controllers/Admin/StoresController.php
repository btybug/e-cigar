<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    protected $view='admin.front_pages.stores';

    public function index()
    {
        return $this->view('index');
    }

    public function editOrCreate($id = null)
    {
        $shop = Stores::find($id);
        return $this->view('edit_create', compact('shop'));
    }

    public function postEditOrCreate(Request $request)
    {
        $data = $request->except('_token', 'translatable', 'emails', 'phones');
        $store = Stores::updateOrCreate($request->id, $data);
        $store->contacts()->delete();
        $emails = $request->get('emails', []);
        $phones = $request->get('phones', []);
        foreach ($emails as $email) {
            $email['type']='email';
            $store->contacts()->create($email);
        }
        foreach ($phones as $phone) {
            $phone['type']='phone';
            $store->contacts()->create($phone);
        }

        return redirect()->route('admin_stores');
    }
}
