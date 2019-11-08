<?php

namespace App\DataTables;

use App\Models\Orders;
use App\Order;
use App\OrdersSearch\OrdersSearch;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class OrdersDataTable extends DataTable
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
            ->eloquent($query)->addColumn('status',function ($attr){
               $history= $attr->history->first();
               return ($history)?$history->status->name:null;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Request $request)
    {
        $orders=OrdersSearch::applyQuery($request);
        return $orders;
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
            ->setTableId('orders-table')
            ->minifiedAjax()
            ->parameters([
                'dom' => 'lBfrtip',
                'order' => [1, 'asc'],
                'tfoot ',
                'scrollX'=>true,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, "All"]],
                'searching' => false,
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
            'id',
            ['name' => 'name', 'data' => 'name', 'title' => 'User','editField'=> "status"],
            'amount',
            'country',
            'region',
            'city',
            'status',
            'shipping_method',
            'payment_method',
            'currency',
            'order_number',
            'type',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }
}
