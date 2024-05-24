<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Bar extends Model
{
    use HasFactory;
    use Searchable;

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

    public function isPending()
    {
        return $this->bar_registrion_status_id == BarRegistrationStatus::PENDING;
    }

    public function isApproved()
    {
        return $this->bar_registrion_status_id == BarRegistrationStatus::APPROVED;
    }

    public function isRejected()
    {
        return $this->bar_registrion_status_id == BarRegistrationStatus::REJECTED;
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'bars_index';
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    public function scopePending($query)
    {
        return $query->where('bar_registrion_status_id', BarRegistrationStatus::PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('bar_registrion_status_id', BarRegistrationStatus::APPROVED);
    }

    public function scopeRejected($query)
    {
        return $query->where('bar_registrion_status_id', BarRegistrationStatus::REJECTED);
    }
}
