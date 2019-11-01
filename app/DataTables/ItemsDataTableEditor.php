<?php

namespace App\DataTables;

use App\Models\Items;
use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class ItemsDataTableEditor extends DataTablesEditor
{
    protected $model = Items::class;

    public function createRules()
    {
        return [
            'name' => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
        //    'price' => 'required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }

    /**
     * Pre-create action event hook.
     *
     * @param Model $model
     * @return array
     */
    public function creating(Model $model, array $data)
    {


        return $data;
    }

    /**
     * Pre-update action event hook.
     *
     * @param Model $model
     * @return array
     */
    public function updating(Model $model, array $data)
    {
        if(isset($data['barcodes_code'])){
            $data['barcode_id']=$data['barcodes_code'];
            unset($data['barcodes_code']);
        };
        if(isset($data['brands'])){
            $data['brand_id']=$data['brands'];
            unset($data['brands']);
        };

        return $data;
    }
}
