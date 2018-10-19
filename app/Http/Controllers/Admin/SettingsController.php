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
use App\Models\Emails;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\Settings;
use App\Models\ShippingZones;
use App\Models\SiteLanguages;
use App\Services\ShortCodes;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class SettingsController extends Controller
{
    protected $view = 'admin.settings';

    public function getLanguages()
    {
        $languages = SiteLanguages::all();
        return $this->view('languages',compact(['languages']));
    }

    public function getLanguagesNew()
    {
        $model= null;
        $countries = Languages::pluck('name','code')->all();

        return $this->view('new_languages',compact(['model','countries']));
    }

    public function getLanguagesEdit($id)
    {
        $model = SiteLanguages::findOrFail($id);
        $countries = Countries::pluck('name','code')->all();

        return $this->view('new_languages',compact(['model','countries']));
    }

    public function postLanguages(Request $request)
    {
        $language = SiteLanguages::updateOrCreate(['id' =>$request->id],$request->except("_token"));

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
            $model=Emails::findOrFail($id);
        }
       $shortcodes= new ShortCodes();
        return $this->view('emails.manage',compact('model','shortcodes'));
    }

    public function postCreateOrUpdate(Request $request)
    {
        $data=$request->all();
        MailTemplates::updateOrCreate($request->id,$data);
        return redirect()->route('admin_mail_templates');
    }

    public function postLanguageGetWithCode(Request $request)
    {
       $lang = Languages::where('code',$request->code)->first();
       if($lang) {
           return \Response::json(['error' => false,'data' => $lang]);
       }

        return \Response::json(['error' => true,'message' => "Error"]);
    }

    public function getLanguagesDelete(Request $request, $id)
    {
        $lang = SiteLanguages::findOrFail($id);
        if($lang && $lang->default == 0){
            $lang->delete();
        }

        return redirect()->back();
    }

    public function getEmails()
    {
       return $this->view('emails.index');
    }



    public function getGeneral()
    {
        return $this->view('general.index');
    }
    public function getStore()
    {
        return $this->view('store.index');
    }

    public function getStoreShipping()
    {
        $shipping_zones = ShippingZones::all();
        return $this->view('store.shipping',compact('shipping_zones'));
    }

    public function getStorePaymentsGateways()
    {
        return  $this->view('store.payments_gateways');
    }

    public function getStorePaymentsGatewaysSettings(Settings $settings)
    {
        $model=$settings->getEditableData('payments_gateways');
        return  $this->view('store.payments_gateways.settings',compact('model'));
    }
    public function postStorePaymentsGatewaysSettings(Request $request,Settings $settings)
    {
        $settings->updateOrCreateSettings('payments_gateways',$request->except('_token'));
        return redirect()->back();
    }
    public function postStorePaymentsGatewaysEnable(Request $request,Settings $settings)
    {
        $data[$request->get('key')]=$request->get('onOff');
        $settings->updateOrCreateSettings('payments_gateways',$request->except('_token'));
        return redirect()->back();
    }

}