<?php

namespace App\DataTables;


use App\ItemsSearch\ItemsSearch;
use App\Models\Barcodes;
use App\Models\Category;
use App\Models\ItemCategories;
use App\Models\Items;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;

class ItemsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->editColumn('barcode_id',function ($item){
             return $item->code;
            })->editColumn('status',function ($item){
             switch ($item->status){
                 case 0:return 'Draft';break;
                 case 1:return 'Published';break;
             }
            })
            ->editColumn('brand_id',function ($item){
             $brand= Category::find($item->brand_id);
             return  ($brand)?$brand->name:null;
            })
            ->editColumn('categories',function ($item){
             $ItemCategories= ItemCategories::where('item_id',$item->id)->get();
             $text='';
             foreach ($ItemCategories as $itemCategory){
                $category= $itemCategory->category;
                 $text.=$category->name.',';
             }
             return  trim($text,',');
            })->with('options',$this->getOptions());
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Item $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Items $model,Request $request)
    {
        $products = ItemsSearch::apply($request);
        return $products->with('brand')->select('items.*', 'item_translations.name', 'barcodes.code');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Bfrtip',
                'order' => [1, 'asc'],
                'tfoot ',
                'searching'=>false,
                'select' => [
                    'style' => 'os',
                    'selector' => 'td:first-child',
                ],
                'buttons' => [
//                    ['extend' => 'create', 'editor' => 'editor'],
//                    ['extend' => 'edit', 'editor' => 'editor'],
//                    ['extend' => 'remove', 'editor' => 'editor'],
                ]
            ]);
    }


    public function getOptions()
    {
        return [
            'barcodes_code'=>Barcodes::select('code as label','code as value')->get()->toArray(),
            'brands'=>Category::where('type','brands')->join('categories_translations','categories_translations.category_id','categories.id')->
                where('locale',app()->getLocale())->select('categories_translations.name as label','categories.id as value')->get(),
            'categories_lists'=>Category::where('type','stocks')->join('categories_translations','categories_translations.category_id','categories.id')->
                where('locale',app()->getLocale())->select('categories_translations.name as label','categories.id as value','categories.id as id')->get(),
        ];
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false
            ],
            'id',
            'name',
            'status',
            'default_price',
            ['name' => 'barcodes', 'data' => 'barcode_id', 'title' => 'Barcode','editField'=> "barcodes_code"],
            ['name' => 'brand', 'data' => 'brand_id', 'title' => 'Brand','editField'=> "brands"],
            ['name' => 'categories', 'data' => 'categories', 'title' => 'Categories','editField'=> "categories_lists"],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Items_' . date('YmdHis');
    }
}
