<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'address',
    ];

    /**
     * Relationship:
     * A customer can have many vehicles
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}