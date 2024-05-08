<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'common_name',
        'official_name',
        'region',
        'subregion',
        'cca2',
        'ccn3',
        'cca3',
        'cioc',
        'active',
    ];
}
