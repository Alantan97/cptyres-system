<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRecordItem extends Model
{
    protected $fillable = [
        'service_record_id',
        'service_id',
        'quantity',
        'price',
        'subtotal',
    ];

    public function serviceRecord()
    {
        return $this->belongsTo(ServiceRecord::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}