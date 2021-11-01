<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use function Symfony\Component\Translation\t;

class Contractor extends Model
{

    use HasFactory;

    protected $fillable = ['full_name'];


    public function passports(): HasMany
    {
        return $this->hasMany(Passport::class);
    }


    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }


    public function addressLastCreated(): HasOne
    {
        return $this->hasOne(Address::class)->orderByDesc('created_at');
    }


    public function taxIdentifier(): HasOne
    {
        return $this->hasOne(TaxIdentifier::class);
    }


    public function socialMedias(): HasMany
    {
        return $this->hasMany(SocialMedia::class);
    }


    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class);
    }

}
