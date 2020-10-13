<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    /**
     * @var string
     */
    protected $table = 'purchase_invoices';

    protected $guarded = ['id'];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_invoice_id');
    }
}
