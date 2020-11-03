<?php


namespace App\Exports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromCollection,WithHeadings
{
    public function collection()
    {
       return Items::leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
           ->leftJoin('brands', 'items.brand_id', '=', 'brands.id')
           ->leftJoin('brands_translations', 'brands.id', '=', 'brands_translations.brands_id')
           ->select(
               'items.id','item_translations.name',
               'item_translations.short_description',
               'brands_translations.name as brand',
               'items.sku','items.barcode',
               'items.type', 'items.alert','items.image',
               'items.other_images','items.default_price',
               'items.status','items.length','items.width',
               'items.height','items.weight','items.item_length',
               'items.item_width','items.item_height','items.item_weight'
               )
           ->groupBy('items.id')
           ->where('items.is_archive', false)
           ->where('item_translations.locale', \Lang::getLocale())->get();
    }

    public function headings(): array
    {
       return [
           '#','name','Description','Brand',
           'Sku','Barcode',
           'Type',
           'Alert','Image',
           'Other Images','Default price',
           'Status','Length','Width',
           'Height','Weight','Item length',
           'Item width','item height','Item weight'
       ];
    }

}
