<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'name'
    ];

    /**
     * Get the TDC's for the client.
     */
    public function tdcs()
    {
        return $this->hasMany(TDC::class);
    }
}
