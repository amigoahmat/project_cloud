<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinateur extends Model
{
    use HasFactory;
    protected $table = 'ordinateurs';
    protected $fillable = [
        'model',
        'ram',
        'disquedur',
    ];
}
