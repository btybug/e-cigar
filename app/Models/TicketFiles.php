<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketFiles extends Model
{
    protected $table = 'ticket_files';

    protected $fillable = [
        'name', 'original_name','path','type', 'extension', 'ticket_id'
    ];


    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}