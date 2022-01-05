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
        'status',
        'client_id'
    ];

    /**
     * Get the client that owns the tdc.
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
