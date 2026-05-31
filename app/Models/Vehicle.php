<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id',
        'plate_number',
        'brand',
        'model',
        'year',
        'color',
    ];

    /**
     * Relationship:
     * A vehicle belongs to one customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }
}
