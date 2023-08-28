<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $fillable = [
        'plot_id',
        'name',
        'plantation_date',
        'harvest_date',
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
}
