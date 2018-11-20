<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 10/10/2018
 * Time: 4:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Requests\AccountsRequest;
use App\Http\Controllers\Admin\Requests\GeoZonesRequest;
use App\Http\Controllers\Admin\Requests\MailTemplatesRequest;
use App\Http\Controllers\Controller;
use App\Models\Couriers;
use App\Models\DeliveryCostsTypes;
use App\Models\Emails;
use App\Models\GeoZones;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\Products;
use App\Models\Settings;
use App\Models\ShippingZones;
use App\Models\SiteLanguages;
use App\Models\TaxRates;
use App\Services\ShortCodes;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Torann\GeoIP\GeoIP;

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
        $countries = Languages::pluck('name', 'code')->all();
        
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

        $model = MailTemplates::find($id);
        $froms = Emails::where('type', 'from')->pluck('email', 'email');
        $tos = Emails::where('type', 'to')->pluck('email', 'email');
        $admin_model = MailTemplates::where('slug', 'admin_' . $model->slug)->first();
        $shortcodes = new ShortCodes();
        return $this->view('emails.manage', compact('model', 'shortcodes', 'admin_model', 'froms', 'tos'));
    }

    public function postCreateOrUpdate(MailTemplatesRequest $request)
    {
        $mail = MailTemplates::findOrFail($request->id);
        $data = $request->except('admin', 'translatable', '_token');
        $translatable = $request->get('translatable');
        $admin_data = $request->get('admin');
        MailTemplates::updateOrCreate($request->id, $data, $translatable);
        $translatable = $admin_data['translatable'];
        unset($admin_data['translatable']);
        $admin_data['slug'] = 'admin_' . $mail->slug;
        $admin_model = MailTemplates::where('slug', $admin_data['slug'])->first();
        $admin_data['is_for_admin'] = 1;
        $id = ($admin_model) ? $admin_model->id : null;
        MailTemplates::updateOrCreate($id, $admin_data, $translatable);
        return redirect()->route('admin_emails');
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


    public function getGeneral(Settings $settings,Countries $countries)
    {
        $model = $settings->getEditableData('admin_general_settings');
        $countries = [null => 'Select Country'] + $countries->all()->pluck('name.common', 'name.common')->toArray();
        return $this->view('general', compact('model','countries'));
    }

    public function saveGeneral(Request $request, Settings $settings)
    {
        $settings->updateOrCreateSettings('admin_general_settings', $request->except('_token'));
        return redirect()->back();
    }

    public function getAccounts()
    {
        $froms = Emails::where('type', 'from')->get();
        $tos = Emails::where('type', 'to')->get();
        return $this->view('accounts', compact('froms', 'tos'));
    }

    public function postAccounts(AccountsRequest $request)
    {
        $new = $request->get('new', []);
        $new_to = $request->get('new_to', []);
        $olds = $request->get('old', []);
        if (count($olds)) {
            Emails::whereNotIn('id', array_keys($olds))->delete();
            foreach ($olds as $id => $old) {
                \DB::table('emails')->where('id', $id)->update($old);
            }
        }
        $data = array_merge($new, $new_to);
        if (count($data)) {
            \DB::table('emails')->insert($data);
        }
        return redirect()->back();
    }


    public function getGeoZones()
    {
        return $this->view('store.shipping');
    }

    public function geoZoneForm(Countries $countries, Settings $settings, $id = null)
    {
        $activePayments = $settings->where('section', 'active_payments_gateways')->where('val', 1)->pluck('key', 'section');
        $tax_rates = TaxRates::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $active_couriers = Settings::LeftJoin('couriers', 'bty_settings.key', '=', 'couriers.id')
            ->where('bty_settings.section', 'active_couriers')
            ->where('bty_settings.val', '1')
            ->select('couriers.*')
            ->LeftJoin('courier_translations', 'couriers.id', '=', 'courier_translations.couriers_id')
            ->where('courier_translations.locale', app()->getLocale())
            ->select('couriers.*', 'courier_translations.name')
            ->pluck('name', 'id');
        $geo_zone = GeoZones::find($id);
        $delivery_types = DeliveryCostsTypes::all()->pluck('title', 'id');
        $countries = [null => 'Select Country'] + $countries->all()->pluck('name.common', 'name.common')->toArray();
        return $this->view('store.general.new_shipping_zone', compact(
            'countries',
            'geo_zone',
            'activePayments',
            'active_couriers', 'delivery_types', 'tax_rates'));
    }


    public function saveGeoZone(GeoZonesRequest $request)
    {

        $data = $request->except('_token', 'delivery_cost', 'delivery_cost_types_id');
        $delivery_costs = $request->get('delivery_cost');
        $geo_zone = GeoZones::updateOrCreate(['id' => $request->id], $data);
        $countries = $request->get('country');
        $regions = $request->get('region');
        $geo_zone->countries()->whereNotIn('name', $countries)->delete();
        foreach ($countries as $key => $country) {
            $zone_country = $geo_zone->countries()->where('name', $country)->first();
            if (!$zone_country) {
                $zone_country = $geo_zone->countries()->create(['name' => $country, 'all' => 0]);
            }
            $zone_country->regions()->whereNotIn('name', $regions[$key])->delete();
            if ($zone_country) {
                foreach ($regions[$key] as $region) {
                    $zone_country->regions()->create(['name' => $region]);
                }
            }
        }

        foreach ($delivery_costs as $key => $delivery_cost) {
            $options = $delivery_cost['options'];
            $delivery_cost['delivery_cost_types_id'] = $request->get('delivery_cost_types_id');
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

        return ['error' => false, 'url' => route('admin_settings_shipping')];
    }

    public
    function findRegion(Request $request)
    {
        $countries = new Countries();
        $regions = $countries->whereNameCommon($request->get('country'))->first()->hydrateStates()->states->pluck('name', 'name')->toArray();
        $id = uniqid();
        $html = \Form::select('region[' . $request->get('count') . '][]', $regions, null, ['class' => 'form-control region select-' . $id . '', 'multiple' => 'multiple'])->toHtml();
        $html .= ' <input type="checkbox" class="select-all" data-select="select-' . $id . '">Select All';
        return ['error' => false, 'html' => $html];
    }

    public
    function getStore()
    {
        return $this->view('store.general');
    }


    public
    function getStorePaymentsGateways(Settings $settings)
    {
        $model = $settings->getEditableData('active_payments_gateways');
        return $this->view('store.payments_gateways', compact('model'));
    }


    public
    function getStorePaymentsGatewaysSettings(Settings $settings)
    {
        $model = $settings->getEditableData('payments_gateways');
        return $this->view('store.payments_gateways.settings', compact('model'));
    }

    public
    function postStorePaymentsGatewaysSettings(Request $request, Settings $settings)
    {
        $settings->updateOrCreateSettings('payments_gateways', $request->except('_token'));
        return redirect()->back();
    }

    public
    function getStorePaymentsGatewaysCash(Settings $settings)
    {
        $model = $settings->getEditableData('payments_gateways_cash');
        return $this->view('store.payments_gateways.cash', compact('model'));
    }

    public
    function postStorePaymentsGatewaysCash(Request $request, Settings $settings)
    {
        $settings->updateOrCreateSettings('payments_gateways_cash', $request->except('_token'));
        return redirect()->back();
    }

    public
    function postStorePaymentsGatewaysEnable(Request $request, Settings $settings)
    {
        $data[$request->get('key')] = ($request->get('onOff') == 'true') ? 1 : 0;
        $settings->updateOrCreateSettings('active_payments_gateways', $data);
        return 1;
    }

    public
    function postCouriersEnable(Request $request, Settings $settings)
    {
        $data[$request->get('key')] = ($request->get('onOff') == 'true') ? 1 : 0;
        $settings->updateOrCreateSettings('active_couriers', $data);
        return 1;
    }

    public
    function getCouriers(Settings $settings)
    {
        $model = $settings->getEditableData('active_couriers');
        $couriers = Couriers::all();
        return $this->view('store.couriers', compact('model', 'couriers'));
    }

    public
    function getCouriersEdit($id)
    {
        $model = Couriers::find($id);
        return $this->view('store.couriers.edit', compact('model'));
    }

    public
    function getCouriersSave(Request $request)
    {
        Couriers::updateOrCreate($request->id, $request->except('_token'));
        return redirect()->route('admin_settings_couriers');
    }

    public
    function getDeliveryCost(Settings $settings)
    {
        $model = $settings->getEditableData('deliverycost');
        return $this->view('store.delivery_cost', compact('model'));
    }

    public
    function getTaxRates(Settings $settings)
    {
        $tax_rates = TaxRates::all();
        return $this->view('store.tax_rates', compact('tax_rates'));
    }

    public
    function getCreateRate($id = null)
    {
        $model = TaxRates::find($id);
        return $this->view('store.tax_rates.create', compact('model'));
    }

    public
    function postCreateOrUpdateTaxRate(Request $request)
    {
        TaxRates::updateOrCreate($request->id, $request->except('_token', 'translatable'));
        return redirect()->route('admin_settings_tax_rates');
    }

    public
    function postTaxRatesEnable(Request $request)
    {

        $tax = TaxRates::find($request->get('key'));
        $tax->is_active = ($request->get('onOff') == 'true') ? 1 : 0;
        $tax->save();
        return 1;
    }

    public
    function searchPaymentOptions(Request $request, Settings $settings)
    {
        return $settings->where('section', 'active_payments_gateways')->get();


    }

    public
    function getGifts()
    {
        return $this->view('store.gifts');
    }

    public
    function getGiftsManage($id = null)
    {
        $products = Products::where('status', 'published')->get()->pluck('name', 'id');
        $productsTableColumns = collect(\DB::select('show columns from products'))->pluck('Field', 'Field');
        return $this->view('store.gifts.manage', compact('products', 'productsTableColumns'));
    }

    public
    function postGiftsManage(Request $request)
    {
        $gifts = $request->except('_token');
        dd($request->all());
    }


}