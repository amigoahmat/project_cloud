<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';
    protected $fillable = [
        'nom',
        'prenom',
        'groupe',
        'salle_id', // Mettez à jour le nom du champ pour refléter la clé étrangère
    ];

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'salle_id'); // Mettez à jour le nom du champ pour refléter la clé étrangère
    }
}
