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

    protected $fillable = [
        'name',
        'surname',
        'national_id',
        'is_main',
        'patronymic',
        'birthday',
        'blood_group_type',
        'gender_type',
        'contractor_id',
        'nationality_id',
        'country_id'
    ];


    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class);
    }


    public function bloodGroup(): BelongsTo
    {
        return $this->belongsTo(BloodGroup::class);
    }


    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }


    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}

