<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarRegistrationStatus extends Model
{
    use HasFactory;

    const PENDING = 1;
    const APPROVED = 2;
    const REJECTED = 3;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
