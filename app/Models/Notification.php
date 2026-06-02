<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'message',
        'is_read',
        'service_record_id',
        'type',
    ];

    public function serviceRecord()
    {
        return $this->belongsTo(ServiceRecord::class);
    }
}
