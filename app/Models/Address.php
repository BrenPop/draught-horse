<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line_one',
        'address_line_two',
        'city_id',
        'province_id',
        'country_id',
        'postal_code',
        'latitude',
        'longitude',
        'bar_id',
        'user_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bar()
    {
        return $this->belongsTo(Bar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
