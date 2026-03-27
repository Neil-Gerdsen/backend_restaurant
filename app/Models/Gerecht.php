<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerecht extends Model
{
    protected $table = 'gerechten';
    protected $fillable = ['naam', 'beschrijving', 'prijs', 'img'];
}
