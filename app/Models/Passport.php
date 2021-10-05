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


    public function bloodGroup(): HasOne
    {
        return $this->hasOne(BloodGroup::class);
    }


    public function Gender(): HasOne
    {
        return $this->hasOne(Gender::class);
    }


    public function Nationality(): HasOne
    {
        return $this->hasOne(Nationality::class);
    }


    public function Country(): HasOne
    {
        return $this->hasOne(Country::class);
    }
}

