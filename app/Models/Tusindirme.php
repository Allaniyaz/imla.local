<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tusindirme extends Model
{
    use HasFactory;

    protected $table = 'tusindirme';

    protected static function booted()
    {
        // static::created(function ($tusindirme) {
            // $tusindirme->checksum = '';
        // });
        
    }
}
