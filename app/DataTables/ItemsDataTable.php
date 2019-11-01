<?php

namespace App\DataTables;


use App\ItemsSearch\ItemsSearch;
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
            })->editColumn('brand',function ($item){
             $brand= $item->brand;
             return   ($brand)?$brand->name:null;
            })
            ;

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
        return $products->select('items.id', 'item_translations.name','barcodes.code','items.default_price');
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
                'select' => [
                    'style' => 'os',
                    'selector' => 'td:first-child',
                ],
                'buttons' => [
//                    ['extend' => 'create', 'editor' => 'editor'],
//                    ['extend' => 'edit', 'editor' => 'editor'],
                    ['extend' => 'remove', 'editor' => 'editor'],
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
            'default_price',
            'barcode_id',
            'brand',
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
