<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ticket_type;
class history extends Model
{
    use HasFactory;

    public function ticket_type()
    {
        return $this->belongsTo(ticket_type::class, 'ticket_type_id');
    }
}
