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
use App\Models\Couriers;
use App\Models\DeliveryCostOptions;
use App\Models\DeliveryCostsTypes;
use App\Models\Emails;
use App\Models\GeoZones;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\Settings;
use App\Models\ShippingZones;
use App\Models\SiteLanguages;
use App\Models\TaxRates;
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
        dd($data);
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


    public function getGeneral()
    {
        return $this->view('store.general');
    }


    public function getGeoZones()
    {
        return $this->view('store.shipping');
    }

    public function geoZoneForm(Countries $countries, Settings $settings, $id = null)
    {
        $activePayments = $settings->where('section', 'active_payments_gateways')->where('val', 1)->pluck('key', 'section');
        $tax_rates = TaxRates::where('is_active',1)->get()->pluck('name','id')->toArray();
        $active_couriers = Settings::LeftJoin('couriers', 'settings.key', '=', 'couriers.id')
            ->where('settings.section', 'active_couriers')
            ->where('settings.val', '1')
            ->select('couriers.*')
            ->LeftJoin('courier_translations', 'couriers.id', '=', 'courier_translations.couriers_id')
            ->where('courier_translations.locale', app()->getLocale())
            ->select('couriers.*', 'courier_translations.name')
            ->pluck('name', 'id');
        $geo_zone = GeoZones::find($id);
        $delivery_types = DeliveryCostsTypes::all()->pluck('title', 'id');
        $countries = $countries->all()->pluck('name.common', 'name.common')->toArray();
        return $this->view('store.general.new_shipping_zone', compact(
            'countries',
                'geo_zone',
                'activePayments',
                'active_couriers', 'delivery_types','tax_rates'));
    }


    public function saveGeoZone(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'name' => 'required|max:190',
            'tax_rate_id' => 'nullable|exists:tax_rates,id',
            'description' => 'required',
            'payment_options' => 'required',
            'delivery_cost' => 'required|array',
            'country' => 'required',
            'regions' => 'required',
            'delivery_cost.*.delivery_cost_types_id' => 'required|exists:delivery_cost_types,id',
            'delivery_cost.*.min' => 'required|integer|min:0',
            'delivery_cost.*.max' => 'required|integer',
            'delivery_cost.*.options' => 'required|array',
            'delivery_cost.*.options.*.courier_id' => 'required|exists:couriers,id',
            'delivery_cost.*.options.*.cost' => 'required|between:0,99.999999',
            'delivery_cost.*.options.*.time' => 'required',
        ]);
        if ($v->fails()) return redirect()->back()->withErrors($v)->withInput($request->except('_token'));
        $data = $request->except('_token', 'delivery_cost');
        $delivery_costs = $request->get('delivery_cost');
        $geo_zone = GeoZones::updateOrCreate(['id' => $request->id], $data);
        foreach ($delivery_costs as $key => $delivery_cost) {
            $options = $delivery_cost['options'];
            unset($delivery_cost['options']);
            if (!$request->id) $key = null;
            $delivery = $geo_zone->deliveries()->updateOrCreate(['id' => $key], $delivery_cost);
            foreach ($options as $key => $value) {
                $options[$key]['delivery_cost_id'] = $delivery->id;
                if ($request->id) {
                    $delivery->options()->updateOrCreate(['id' => $key], $value);
                }
            }
            if (!$request->id) {
                \DB::table('delivery_cost_options')->insert($options);
            }
        }

        return redirect()->back();
    }

    public function findRegion(Request $request)
    {
        $coontries = new Countries();
        $posible = array();
        $regions = $coontries->where('name.common', $request->country)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        foreach ($regions as $region) {
            if (preg_match("/(" . $request->id . ")/i", $region)) {
                $posible[] = $region;
            }
        }
        return \Response::json(['error' => false, 'data' => $posible]);
    }

    public function getStore()
    {
        return $this->view('store.index');
    }


    public function getStorePaymentsGateways(Settings $settings)
    {
        $model = $settings->getEditableData('active_payments_gateways');
        return $this->view('store.payments_gateways', compact('model'));
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
        $data[$request->get('key')] = ($request->get('onOff') == 'true') ? 1 : 0;
        $settings->updateOrCreateSettings('active_payments_gateways', $data);
        return 1;
    }

    public function postCouriersEnable(Request $request, Settings $settings)
    {
        $data[$request->get('key')] = ($request->get('onOff') == 'true') ? 1 : 0;
        $settings->updateOrCreateSettings('active_couriers', $data);
        return 1;
    }

    public function getCouriers(Settings $settings)
    {
        $model = $settings->getEditableData('active_couriers');
        $couriers = Couriers::all();
        return $this->view('store.couriers', compact('model', 'couriers'));
    }

    public function getCouriersEdit($id)
    {
        $model = Couriers::find($id);
        return $this->view('store.couriers.edit', compact('model'));
    }

    public function getCouriersSave(Request $request)
    {
        Couriers::updateOrCreate($request->id, $request->except('_token'));
        return redirect()->route('admin_settings_couriers');
    }

    public function getDeliveryCost(Settings $settings)
    {
        $model = $settings->getEditableData('deliverycost');
        return $this->view('store.delivery_cost', compact('model'));
    }

    public function getTaxRates(Settings $settings)
    {
        $tax_rates = TaxRates::all();
        return $this->view('store.tax_rates', compact('tax_rates'));
    }

    public function getCreateRate($id = null)
    {
        $model = TaxRates::find($id);
        return $this->view('store.tax_rates.create', compact('model'));
    }

    public function postCreateOrUpdateTaxRate(Request $request)
    {
        TaxRates::updateOrCreate($request->id, $request->except('_token', 'translatable'));
        return redirect()->route('admin_settings_tax_rates');
    }

    public function postTaxRatesEnable(Request $request)
    {

        $tax = TaxRates::find($request->get('key'));
        $tax->is_active= ($request->get('onOff') == 'true') ? 1 : 0;
        $tax->save();
        return 1;
    }


}