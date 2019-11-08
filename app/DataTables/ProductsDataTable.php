<?php

namespace App\DataTables;

use App\Models\Category;
use App\Models\Stock;
use App\Models\StockCategories;
use App\ProductSearch\ProductSearch;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
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
            ->editColumn('brand_id',function ($item){
                $brand= Category::find($item->brand_id);
                return  ($brand)?$brand->name:null;
            })->editColumn('status',function ($item){
                switch ($item->status){
                    case 0:return 'Draft';break;
                    case 1:return 'Published';break;
                }
            })->editColumn('categories',function ($item){
                $ItemCategories= StockCategories::where('stock_id',$item->id)->get();
                $text='';
                foreach ($ItemCategories as $itemCategory){
                    $category= $itemCategory->category;
                    $text.=$category->name.',';
                }
                return  trim($text,',');
            })->addColumn('actions', function ($stock) {
                return  ((userCan('admin_stock_edit')) ? "<a class='badge btn-warning mr-1' href='" . route("admin_stock_edit", $stock->id) . "'><i class='fa fa-edit'></i></a>" : '');
            })->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stock $model,Request $request)
    {
        $products = ProductSearch::applyQuery($request);
        return $products->groupBy('stocks.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('products-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
            ->parameters([
                'dom' => 'lBfrtip',
                'order' => [1, 'asc'],
                'scrollX'=>true,
                'lengthMenu'=>[[10, 25, 50, -1], [10, 25, 50, "All"]],
                'tfoot ',
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
            'brand_id',
            'price',
            'slug',
            'categories',
            'status',
            [
                'data' => 'actions',
                'defaultContent' => '',
                'className' => '',
                'title' => 'Actions',
                'orderable' => false,
                'searchable' => false
            ]

        ];
//        dd( [
//            Column::computed('action')
//                  ->exportable(false)
//                  ->printable(false)
//                  ->width(60)
//                  ->addClass('text-center'),
//            Column::make('id'),
//            Column::make('add your columns'),
//            Column::make('created_at'),
//            Column::make('updated_at'),
//        ]);
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Products_' . date('YmdHis');
    }
}
