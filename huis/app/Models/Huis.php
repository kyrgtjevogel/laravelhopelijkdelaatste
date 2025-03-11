<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Huis extends Model
{
    protected $fillable = [
        'naam',
        'beschrijving',
        'oppervlakte_m2',      
        'huur_per_week'   
    ];
    protected $table = 'huis';
    use HasFactory;
}
