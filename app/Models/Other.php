<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $fillable = [
        'user_id', // Add user_id to the fillable fields
        'name',
        'role',
        'specific_role',
        'address',
        'phone_no',
        'salary',
    ];

    protected $casts = [
        'role' => 'string',
        'specific_role' => 'string',
        'address' => 'string',
        'phone_no' => 'string',
        'salary' => 'decimal:2',
    ];

    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming your User model is named User
    }
}

