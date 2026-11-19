<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServicePayment extends Model
{
    protected $fillable = [
        'service_registration_id',
        'amount',
        'payment_method',
        'description',
    ];

    public function serviceRegistration(): BelongsTo
    {
        return $this->belongsTo(ServiceRegistration::class);
    }
}
