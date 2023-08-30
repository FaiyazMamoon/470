<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public $timestamps = false;
    protected $fillable = [        
        'name',
        'address',
        'crop',
        'rent',        
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'crop' => 'string',
        'rent' => 'decimal:2',        
    ];
}
