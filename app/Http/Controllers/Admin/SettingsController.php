<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MailTemplates;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $view = 'admin.settings';

    public function getLanguages()
    {
        return $this->view('languages');
    }

    public function getLanguagesNew()
    {
        $model = null;
        return $this->view('new_languages',compact(['model']));
    }

    public function getMailTemplates()
    {
        return $this->view('mail_templates');
    }

    public function getCreateMailTemplates($id=null)
    {
        $model=null;
        if($id){
            $model=MailTemplates::findOrFail($id);
        }
        return $this->view('create_mail_templates',compact('model'));
    }

    public function postCreateOrUpdate(Request $request)
    {
        $data=$request->all();
        MailTemplates::updateOrCreate($request->id,$data);
        return redirect()->route('admin_mail_templates');
    }
}