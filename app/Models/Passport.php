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


    public function bloodGroup(): BelongsTo
    {
        return $this->belongsTo(BloodGroup::class);
    }


    public function Gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }


    public function Nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }


    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}

