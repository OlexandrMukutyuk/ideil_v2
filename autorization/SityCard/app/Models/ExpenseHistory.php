<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketType;

class ExpenseHistory extends Model
{
    use HasFactory;

    public function ticket_type()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }
}
