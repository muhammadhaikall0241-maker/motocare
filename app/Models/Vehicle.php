<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'plate_number',
        'vehicle_type',
        'stnk_number',
        'manufacture_year',
        'owner_name',
        'color',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceRegistrations()
    {
        return $this->hasMany(ServiceRegistration::class);
    }
}