<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDC extends Model
{
    protected $table = 'tdcs';
    protected $fillable = [
        'number',
        'pin',
        'valid_date',
        'balance',
        'status'
    ];
}
