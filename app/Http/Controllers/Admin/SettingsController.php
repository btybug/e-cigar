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
use App\Models\Currencies;
use App\Models\DeliveryCostsTypes;
use App\Models\Emails;
use App\Models\FooterLinks;
use App\Models\GeoZones;
use App\Models\GetForexData;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\Products;
use App\Models\Settings;
use App\Models\ShippingZones;
use App\Models\SiteLanguages;
use App\Models\Statuses;
use App\Models\TaxRates;
use App\Models\Translations\FooterLinkTranslation;
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


    public function setLanguageDefault(Request $request)
    {
        $lang_id = $request->language_id;
        SiteLanguages::where('default', '=', 1)->update(["default" => 0]);
        SiteLanguages::find($lang_id)->update(["default" => 1]);
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


    public function getGeneral(Settings $settings, Countries $countries)
    {
        $model = $settings->getEditableData('admin_general_settings');
        $countries = [null => 'Select Country'] + $countries->all()->pluck('name.common', 'name.common')->toArray();
        return $this->view('general', compact('model', 'countries'));
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

    public function getRegions(SiteLanguages $languages, Settings $settings, Countries $countries)
    {
        $default = $settings->where('section', 'currencies')->where('key', 'default_currency_code')->first();
        $siteCurrencies = array_keys(($default) ? [$default->val => 1] + $settings->getEditableData('currencies', $default->val)->toArray() : []);
        $currencies = [];
        foreach ($siteCurrencies as $siteCurrency) {
            $currencies[$siteCurrency] = $siteCurrency;
        };
        $regions = $settings->where('section', 'site_regions')->where('key', 'regions')->first();
        $regions = ($regions) ? json_decode($regions->val, true) : [];
        $languages = $languages->all()->pluck('name', 'name');
        $countries = $countries->all()->pluck('name.common', 'name.common')->toArray();
        return $this->view('regions', compact('languages', 'currencies', 'regions', 'countries'));
    }

    public function postRegions(Request $request)
    {
        $data = $request->except('_token');
        Settings::updateOrCreate(['section' => 'site_regions', 'key' => 'regions'], ['val' => json_encode($data, true)]);
        return redirect()->back();
    }

    public function getFooter()
    {
        $links=FooterLinks::leftJoin('footer_links_translations','footer_links.id','=','footer_links_translations.footer_links_id')
        ->whereNull('footer_links.parent_id')->select('footer_links.*','footer_links_translations.title','footer_links_translations.locale')
            ->with('children')->get()->toArray();
        $footer_links=[];
        foreach ($links as $footer_link) {
            $footer_links[$footer_link['locale']][]=$footer_link;
        }
        return $this->view('footer',compact('footer_links'));
    }

    public function postFooter(Request $request)
    {
        FooterLinkTranslation::truncate();
        FooterLinks::whereNotNull('id')->delete();
        $translatables = $request->get('translatable');
        foreach ($translatables as $lang => $translatable) {
            foreach ($translatable['name'] as $block => $name) {
                $footer_main = FooterLinks::create([]);
                FooterLinkTranslation::create(['title' => $name, 'locale' => $lang, 'footer_links_id' => $footer_main->id]);
                foreach ($translatable['link'][$block] as $key => $val) {
                    $footer = FooterLinks::create(['link' => $val,'parent_id'=>$footer_main->id]);
                    FooterLinkTranslation::create(['title' => $translatable['title'][$block][$key], 'locale' => $lang, 'footer_links_id' => $footer->id]);
                }
            }

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

    public function findRegion(Request $request)
    {
        $countries = new Countries();
        $regions = $countries->whereNameCommon($request->get('country'))->first()->hydrateStates()->states->pluck('name', 'name')->toArray();
        $id = uniqid();
        $html = \Form::select('region[' . $request->get('count') . '][]', $regions, null, ['class' => 'form-control region select-' . $id . '', 'multiple' => 'multiple'])->toHtml();
        $html .= ' <input type="checkbox" class="select-all" data-select="select-' . $id . '">Select All';
        return ['error' => false, 'html' => $html];
    }

    public function getStore(Currencies $currencies, Settings $settings, Request $request)
    {
        $default = $settings->where('section', 'currencies')->where('key', 'default_currency_code')->first();
        $p = $request->get('p', ($default) ? $default->val : null);
        $siteCurrencies = ($p) ? $settings->getEditableData('currencies', $p)->toArray() : [];
        $currencies = $currencies->all()->pluck('currency', 'currency');
        return $this->view('store.general', compact('currencies', 'p', 'siteCurrencies'));
    }

    public function postStore(Request $request, Settings $settings)
    {
        $data = [];
        $settings->updateOrCreateSettings('currencies', ['default_currency_code' => $request->get('default_currency_code')]);
        $currencies = $request->get('currency_code', []);
        $rates = $request->get('rate', []);
        foreach ($currencies as $key => $currency) {
            $data[$currency] = $rates[$key];
        }
        $settings
            ->where('section', 'currencies')
            ->where('sub_id', $request->get('default_currency_code'))
            ->whereNotIn('key', $currencies)->delete();
        $settings->updateOrCreateSettings('currencies', $data, $request->get('default_currency_code'));
        return redirect()->back();
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

    public function getStorePaymentsGatewaysCash(Settings $settings)
    {
        $model = $settings->getEditableData('payments_gateways_cash');
        return $this->view('store.payments_gateways.cash', compact('model'));
    }

    public function postStorePaymentsGatewaysCash(Request $request, Settings $settings)
    {
        $settings->updateOrCreateSettings('payments_gateways_cash', $request->except('_token'));
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
        $tax->is_active = ($request->get('onOff') == 'true') ? 1 : 0;
        $tax->save();
        return 1;
    }

    public function searchPaymentOptions(Request $request, Settings $settings)
    {
        return $settings->where('section', 'active_payments_gateways')->get();


    }

    public function getGifts()
    {
        return $this->view('store.gifts');
    }


    public function getGiftsManage($id = null)
    {
        $products = Products::where('status', 'published')->get()->pluck('name', 'id');
        $productsTableColumns = collect(\DB::select('show columns from products'))->pluck('Field', 'Field');
        return $this->view('store.gifts.manage', compact('products', 'productsTableColumns'));
    }

    public function postGiftsManage(Request $request)
    {
        $gifts = $request->except('_token');
//        dd($request->all());
    }


}