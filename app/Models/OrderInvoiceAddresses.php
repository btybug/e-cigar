<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11/1/2018
 * Time: 1:40 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class OrderInvoiceAddresses extends Model
{
    protected $table = 'order_invoice_addresses';
    protected $guarded=['id'];

    public function order()
    {
        return $this->belongsTo(OrderInvoice::class,'order_id');
    }
}
