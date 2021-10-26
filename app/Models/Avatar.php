<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['image_path', 'contractor_id'];

    public function contractor()
    {
        $this->belongsTo(Contractor::class);
    }
}
