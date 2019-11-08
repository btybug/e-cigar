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
            })->addColumn('actions', function ($attr) {
                return "<a class='badge btn-warning' target='blank' href='".route('admin_items_edit',$attr->id)."'><i class='fa fa-edit'></i></a>
            <a class='badge btn-info' target='_blank' href='" . route('admin_items_purchase', $attr->id) . "'><i class='fa fa-eye'></i></a>
            <a class='badge btn-danger'  href='" . route('admin_items_archive', $attr->id) . "'><i class='fa fa-archive'></i></a>";
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
                if($category)
                 $text.=$category->name.',';
             }
             return  trim($text,',');
            })->rawColumns(['actions'])->with('options',$this->getOptions());
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
            ->setTableId('items-table')
            ->minifiedAjax()
            ->parameters([
                'dom' => 'lBfrtip',
                'order' => [1, 'asc'],
                'tfoot ',
                'scrollX'=>true,
                'lengthMenu'=>[[10, 25, 50, -1], [10, 25, 50, "All"]],
                'searching'=>false,
                'select' => [
                    'style' => 'os',
                    'selector' => 'td:first-child',
                ],
                'buttons' => [

        'selectAll',
        'selectNone'
//                    ['extend' => 'create', 'editor' => 'editor'],
//                    ['extend' => 'edit', 'editor' => 'editor'],
//                    ['extend' => 'remove', 'editor' => 'editor'],
                ]
            ]);
    }


    public function getOptions()
    {
        return [
            'status'=>collect([['label'=>'Select Status','value'=>null],['label'=>'Draft','value'=>'0'],['label'=>'Published','value'=>'1']]),
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
            ['name' => 'statuse', 'data' => 'status', 'title' => 'Status','editField'=> "status"],
            'default_price',
            ['name' => 'brand', 'data' => 'brand_id', 'title' => 'Brand','editField'=> "brands"],
            ['name' => 'categories', 'data' => 'categories','type'=>'select2','title' => 'Categories','editField'=> "categories_lists"],
            [
                'data' => 'actions',
                'defaultContent' => '',
                'className' => '',
                'title' => 'Actions',
                'orderable' => false,
                'searchable' => false
            ]
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
