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
use App\Models\Countries;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\SiteLanguages;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $view = 'admin.settings';

    public function getLanguages()
    {
        $languages = SiteLanguages::all();
        return $this->view('languages');
    }

    public function getLanguagesNew()
    {
        $model = null;
        $languages = Languages::pluck('name','code')->all();

        return $this->view('new_languages',compact(['model','languages']));
    }

    public function postLanguages(Request $request)
    {
        $language = SiteLanguages::updateOrCreate($request->except("_token"),['id' =>$request->id]);

        return redirect()->route('admin_settings_languages');
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

    public function postCountryGetWithCode(Request $request)
    {
       $country = Countries::where('code',$request->code)->first();
       if($country) {
           return \Response::json(['error' => false,'data' => $country]);
       }

        return \Response::json(['error' => true,'message' => "Error"]);
    }

    public function postLanguageGetWithCode(Request $request)
    {
       $lang = Languages::where('code',$request->code)->first();
       if($lang) {
           return \Response::json(['error' => false,'data' => $lang]);
       }

        return \Response::json(['error' => true,'message' => "Error"]);
    }
}