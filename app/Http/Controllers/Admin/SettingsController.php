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
        return $this->view('languages', compact(['languages']));
    }

    public function getLanguagesNew()
    {
        $model = null;
        $countries = Languages::pluck('name', 'code')->all();

        return $this->view('new_languages', compact(['model', 'countries']));
    }

    public function getLanguagesEdit($id)
    {
        $model = SiteLanguages::findOrFail($id);
        $countries = Countries::pluck('name', 'code')->all();

        return $this->view('new_languages', compact(['model', 'countries']));
    }

    public function postLanguages(Request $request)
    {
        $language = SiteLanguages::updateOrCreate(['id' => $request->id], $request->except("_token"));

        return redirect()->route('admin_settings_languages');
    }

    public function getMailTemplates()
    {
        return $this->view('mail_templates');
    }

    public function getCreateMailTemplates($id = null)
    {
        $model = null;
        if ($id) {
            $model = Emails::findOrFail($id);
        }
        $shortcodes = new ShortCodes();
        return $this->view('emails.manage', compact('model', 'shortcodes'));
    }

    public function postCreateOrUpdate(Request $request)
    {
        $data = $request->all();
        MailTemplates::updateOrCreate($request->id, $data);
        return redirect()->route('admin_mail_templates');
    }

    public function postLanguageGetWithCode(Request $request)
    {
        $lang = Languages::where('code', $request->code)->first();
        if ($lang) {
            return \Response::json(['error' => false, 'data' => $lang]);
        }

        return \Response::json(['error' => true, 'message' => "Error"]);
    }

    public function getLanguagesDelete(Request $request, $id)
    {
        $lang = SiteLanguages::findOrFail($id);
        if ($lang && $lang->default == 0) {
            $lang->delete();
        }

        return redirect()->back();
    }

    public function getEmails()
    {
        return $this->view('emails.index');
    }


    public function getGeneral(Countries $countries)
    {
        $zones = ShippingZones::all();
        return $this->view('store.general',compact('zones'));
    }
    public function newShippingZones(Countries $countries)
    {
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('store.general.new_shipping_zone',compact('countries'));
    }
    public function getShippingNew(Countries $countries,Settings $settings)
    {
        $activePayments=$settings->where('section','active_payments_gateways')->where('val',1)->pluck('key','key');
        $active_couriers=$settings->where('section','active_couriers')->where('val',1)->pluck('key','key');
        $shipping_zone = null;
        $shipping_zones = ShippingZones::all();
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('store.general.new_shipping_zone',compact('countries','shipping_zone','activePayments','shipping_zones','active_couriers'));
    }
    public function editShippingZone(Countries $countries,$id,Settings $settings)
    {
        $activePayments=$settings->where('section','active_payments_gateways')->where('val',1)->pluck('key','key');
        $active_couriers=$settings->where('section','active_couriers')->where('val',1)->pluck('key','key');
        $shipping_zones = ShippingZones::all();
        $shipping_zone = ShippingZones::find($id);
        $countries = $countries->all()->pluck('name.common','name.common')->toArray();
        return $this->view('store.general.new_shipping_zone',compact('countries','shipping_zone','activePayments','shipping_zones','active_couriers'));
    }
    public function saveShippingNew(Request $request)
    {
        $data = $request->except('_token');
        ShippingZones::updateOrCreate($request->id,$data);
        return redirect(route('admin_store_shipping_zones'));
    }
    public function findRegion(Request $request)
    {
        $coontries = new Countries();
        $posible = array();
        $regions = $coontries->where('name.common', $request->country)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        foreach ($regions as $region)
        {
            if (preg_match("/(" . $request->id . ")/i",$region))
            {
                $posible[] = $region;
            }
        }
        return \Response::json(['error'=>false,'data'=>$posible]);
    }

    public function getStore()
    {
        return $this->view('store.index');
    }

    public function getStoreShipping()
    {
        $shipping_zones = ShippingZones::all();
        return $this->view('store.shipping', compact('shipping_zones'));
    }

    public function getStorePaymentsGateways(Settings $settings)
    {
        $model = $settings->getEditableData('active_payments_gateways');
        return $this->view('store.payments_gateways',compact('model'));
    }


    public function getStorePaymentsGatewaysSettings(Settings $settings)
    {
        $model = $settings->getEditableData('payments_gateways');
        return $this->view('store.payments_gateways.settings', compact('model'));
    }

    public function postStorePaymentsGatewaysSettings(Request $request, Settings $settings)
    {
        $settings->updateOrCreateSettings('payments_gateways', $request->except('_token'));
        return redirect()->back();
    }

    public function postStorePaymentsGatewaysEnable(Request $request, Settings $settings)
    {
        $data[$request->get('key')] = ( $request->get('onOff')=='true')?1:0;
        $settings->updateOrCreateSettings('active_payments_gateways', $data);
        return 1;
    }
    public function postCouriersEnable(Request $request, Settings $settings)
    {
        $data[$request->get('key')] = ( $request->get('onOff')=='true')?1:0;
        $settings->updateOrCreateSettings('active_couriers', $data);
        return 1;
    }

    public function getCouriers(Settings $settings)
    {
        $model = $settings->getEditableData('active_couriers');
        return $this->view('store.couriers',compact('model'));
    }

    public function getCouriersPickUp(Settings $settings)
    {
        $model = $settings->getEditableData('couriers');
        return $this->view('store.couriers.pick_up',compact('model'));
    }
    public function getCouriersDHL(Settings $settings)
    {
        $model = $settings->getEditableData('couriers');
        return $this->view('store.couriers.dhl',compact('model'));
    }
    public function getCouriersLocalEmail(Settings $settings)
    {
        $model = $settings->getEditableData('couriers');
        return $this->view('store.couriers.local_email',compact('model'));
    }
    public function getDeliveryCost(Settings $settings)
    {
        $model = $settings->getEditableData('deliverycost');
        return $this->view('store.delivery_cost',compact('model'));
    }


}