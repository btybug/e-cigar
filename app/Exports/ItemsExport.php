<?php


namespace App\Exports;

use App\Models\Items;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $dataTable = \DataTables::of(Items::leftJoin('item_translations', 'items.id', '=', 'item_translations.items_id')
            ->leftJoin('brands', 'items.brand_id', '=', 'brands.id')
            ->leftJoin('item_categories', 'item_categories.item_id', '=', 'items.id')
            ->leftJoin('brands_translations', 'brands.id', '=', 'brands_translations.brands_id')
            ->leftJoin('categories', 'item_categories.categories_id', '=', 'categories.id')
            ->leftJoin('categories_translations', 'categories.id', '=', 'categories_translations.category_id')
            ->select(
                'items.id', 'item_translations.name',
                'item_translations.short_description',
                'brands_translations.name as brand',
                'items.sku', 'items.barcode',
                'items.type', 'items.alert', 'items.image',
                'items.other_images', 'items.default_price',
                'items.status', 'items.length', 'items.width',
                'items.height', 'items.weight', 'items.item_length',
                'items.item_width', 'items.item_height', 'items.item_weight'
            )->groupBy('items.id')->where('items.is_archive', false)
            ->where('item_translations.locale', \Lang::getLocale()))
            ->addColumn('actions', function ($attr) {
                return null;
            });

        $response = $dataTable->make(true);
        $query = $dataTable->getQuery()->get();
        return ($query);

    }

    public function headings(): array
    {
       return [
           '#', 'Name:name', 'Description:description', 'Brand:brand_id',
           'Sku:sku', 'Barcode:barcode',
           'Type:type',
           'Alert:alert', 'Image:image',
           'Other Images:other_images', 'Price:default_price',
           'status:Status', 'Length:length', 'Width:width',
           'Height:height', 'Weight:weight',
           'Item width:item_weight', 'Item length:item_height', 'Item weight:item_weight'
       ];
    }

}
