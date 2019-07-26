<?php


namespace App\Search\Orders;


use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersSearch
{
    protected $model;

    public function __construct()
    {
        $this->model = new Orders();
    }

    public static function apply(Request $request)
    {
        return (new self())->run($request)->get();
    }

    public function code($value)
    {
        return $this->model->where('orders.code', 'LIKE', "%" . $value . "%");
    }

    public function currency($value)
    {
        return $this->model->where('orders.currency', $value);
    }

    public function shipping_method($value)
    {
        return $this->model->where('orders.shipping_method', $value);
    }

    public function payment_method($value)
    {
        return $this->model->where('orders.payment_method', $value);
    }

    public function customer($value)
    {
        return $this->model->where('orders.user_id', $value);
    }

    public function amount($value)
    {
        if (isset($value[1]) && !is_null($value[1])) {
            return $this->model->whereBetween('orders.amount', $value);
        }
        if (!is_null($value[0])) {
            return $this->model->where('orders.amount', '>', $value[0]);
        }
        return $this->model;
    }

    public function date($value)
    {
        return $this->model->where(function ($query) use ($value) {

            $value = explode(' - ',$value);
            $value[0] = Carbon::parse($value[0])->format('Y-m-d');
            if(Carbon::parse($value[1])->format('d.m.Y') == Carbon::today()->format('d.m.Y') ){
                $value[1] = Carbon::parse($value[1])->addDay(1)->format('Y-m-d');
            }else{
                $value[1] = Carbon::parse($value[1])->format('Y-m-d');
            }
            $query->whereBetween('orders.created_at', $value);
        });
    }


    public function run($request)
    {
        $fields = $request->all();
        foreach ($fields as $key => $value) {
            if (($value || (is_array($value) && count($value))) && is_callable(array($this, $key))) {
                $this->model = $this->$key($value);
            }
        }
        return $this;
    }

    public function get()
    {
        return $this->model->get();
    }
}
