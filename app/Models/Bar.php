<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'profile_picture_path',
        'user_id',
        'bar_type_id',
        'profile_completion_percentage',
        'bar_registrion_status_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(BarType::class, 'bar_type_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function barRegistrationStatus()
    {
        return $this->belongsTo(BarRegistrationStatus::class, 'bar_registrion_status_id');
    }
}
