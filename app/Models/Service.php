<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name',
        'description',
        'price',
    ];

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function serviceRecordItems()
    {
        return $this->hasMany(ServiceRecordItem::class);
    }
}
