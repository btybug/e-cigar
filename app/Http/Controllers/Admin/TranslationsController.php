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
use App\Models\Common;
use App\Models\Couriers;
use App\Models\Currencies;
use App\Models\DeliveryCostsTypes;
use App\Models\Emails;
use App\Models\FooterLinks;
use App\Models\GeoZones;
use App\Models\GetForexData;
use App\Models\Gmail;
use App\Models\Items;
use App\Models\Languages;
use App\Models\MailTemplates;
use App\Models\Products;
use App\Models\Settings;
use App\Models\ShippingZones;
use App\Models\SiteCurrencies;
use App\Models\SiteLanguages;
use App\Models\Statuses;
use App\Models\Stock;
use App\Models\TaxRates;
use App\Models\Translations\FooterLinkTranslation;
use App\Services\ShortCodes;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Torann\GeoIP\GeoIP;

class TranslationsController extends Controller
{
    protected $view = 'admin.settings.translations';

    public function getIndex()
    {
        $model = null;
        return $this->view('index', compact(['model']));
    }

}
