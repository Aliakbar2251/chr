<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Passport extends Model
{
    use HasFactory;


    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }


    public function BloodGroup(): HasMany
    {
        return $this->hasMany(BloodGroup::class, 'blood_group_type');
    }


    public function Gender(): HasMany
    {
        return $this->hasMany(Gender::class, 'gender_type');
    }


    public function Nationality(): HasMany
    {
        return $this->hasMany(Nationality::class, 'nationality_id');
    }


    public function Country(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}

