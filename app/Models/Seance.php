<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $table = 'seances';
    protected $fillable = [
        'jour_semaine',
        'heure',
        'groupe',
        'salle_id',
        'ens_id',
    ];

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id');
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'ens_id');
    }
}
