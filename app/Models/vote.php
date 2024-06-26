<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;

    public function poste()
    {
        return $this->belongsTo(Poste::class, 'id_poste');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'id_candidat');
    }
}
