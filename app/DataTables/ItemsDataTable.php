<?php

namespace App\DataTables;


use App\ItemsSearch\ItemsSearch;
use App\Models\Barcodes;
use App\Models\Items;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;
use Yajra\DataTables\Html\Editor\Fields\Select;
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
        return $products->select('items.id', 'item_translations.name', 'barcodes.code', 'items.default_price');
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
                    ['extend' => 'edit', 'editor' => 'editor'],
                    ['extend' => 'remove', 'editor' => 'editor'],
                ]
            ]);
    }
    public function render($view, $data = [], $mergeData = [])
    {
        if ($this->request()->ajax() && $this->request()->wantsJson()) {
            return app()->call([$this, 'ajax']);
        }

        if ($action = $this->request()->get('action') and in_array($action, $this->actions)) {
            if ($action == 'print') {
                return app()->call([$this, 'printPreview']);
            }

            return app()->call([$this, $action]);
        }

        return view($view, $data, $mergeData)->with($this->dataTableVariable, $this->getHtmlBuilder());
    }

    public function ajax()
    {
        $source = null;
        if (method_exists($this, 'query')) {
            $source = app()->call([$this, 'query']);
            $source = $this->applyScopes($source);
        }

        /** @var \Yajra\DataTables\DataTableAbstract $dataTable */
        $options=[];
        $dataTable = app()->call([$this, 'dataTable'], compact('source','options'));
        $result=$dataTable->toArray();
        $result['options']=method_exists($this, 'getOptions')?app()->call([$this, 'getOptions']):[];
        $dataTable=new Collection($result);
        if ($callback = $this->beforeCallback) {
            $callback($dataTable);
        }

        if ($callback = $this->responseCallback) {
            $data = new Collection($dataTable->toArray());
            return new JsonResponse($callback($data));
        }

        return $dataTable->toJson();
    }

    public function getOptions()
    {
        return [
            'barcodes_code'=>Barcodes::select('code as label','id as value')->get()
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
            'default_price',
            ['name' => 'barcodes', 'data' => 'barcode_id', 'title' => 'Barcode','editField'=> "barcodes_code"],
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
