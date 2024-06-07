<?php

namespace App\Http\Controllers\admin;
use App\Models\Poste;
use App\Models\Candidat;
use App\Models\User;
use App\Models\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function CompteAdmin (){
            $postes_disponible=Poste::all()->count();
            $nombre_candidat=Candidat::all()->count();
            $nombre_electeur=User::all()->count();
            $nombre_electeur_vote = Vote::distinct('id_user')->count('id_user');
            return view('admin.home',compact('postes_disponible','nombre_candidat','nombre_electeur','nombre_electeur_vote'));
        }
}
