<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceDetail extends Model
{
    protected $fillable = [
        'service_registration_id',
        'complaint',
        'estimated_cost',
        'mechanic_name',
        'replacement_sparepart',
    ];

    public function serviceRegistration(): BelongsTo
    {
        return $this->belongsTo(ServiceRegistration::class);
    }
}
