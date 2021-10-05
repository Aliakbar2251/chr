<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BloodGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'type';
    public $timestamps = false;

    public function passport(): BelongsTo
    {
        return $this->belongsTo(Passport::class);
    }
}
