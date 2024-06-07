<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_candidat',
        'prenom_candidat',
        'mail_candidat',
        'programme_detude', // Ajoutez cette ligne pour inclure le champ programme_detude dans la liste des attributs pouvant être remplis
        'id_poste',
        'photo',
    ];
    
    /**
        * The primary key associated with the table.
        *
        * @var int
        */
       protected $primaryKey = 'id_candidat';

       public function poste()
    {
        return $this->belongsTo(Poste::class, 'id_poste');
    }
}
