<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodGroup extends Model
{
    use HasFactory;

    protected $keyType = "string";
    protected $primaryKey = 'type';
    public $timestamps = false;
    public $incrementing = false;


    public function passport(): HasMany
    {
        return $this->hasMany(Passport::class);
    }
}