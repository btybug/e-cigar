<?php


namespace App\Search\Orders;


use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersSearch
{
    protected $model;

    public function __construct()
    {
        $this->model =  new Orders();
    }

    public static function apply(Request $request)
    {
        return (new self())->run($request)->get();
    }

    public function code($value)
    {
        return $this->model->where('orders.code', 'LIKE', "%" . $value . "%");
    }

    public function amount($value)
    {
        return $this->model->where('orders.amount', 'LIKE', "%" . $value . "%");
    }


    public function run($request)
    {
        $fields = $request->all();
        foreach ($fields as $key => $value) {
            if ($value && is_callable(array($this, $key))) {
                $this->model=$this->$key($value);
            }
        }
        return $this;
    }

    public function get()
    {
       return $this->model->get();
    }
}
