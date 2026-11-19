<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceRegistration extends Model
{
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'complaint',
        'service_date',
    ];

    protected $casts = [
        'service_date' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function serviceDetails(): HasMany
    {
        return $this->hasMany(ServiceDetail::class);
    }

    public function servicePayments(): HasMany
    {
        return $this->hasMany(ServicePayment::class);
    }
}
