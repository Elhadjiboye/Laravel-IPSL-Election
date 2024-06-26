<?php

namespace App\Http\Controllers\admin;
use App\Models\poste;
use App\Models\candidat;
use App\Models\User;
use App\Models\vote;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        public function CompteAdmin (){
            $postes_disponible=poste::all()->count();
            $nombre_candidat=candidat::all()->count();
            $nombre_electeur=User::all()->count();
            $settings = Setting::all();
            $nombre_electeur_vote = vote::distinct('id_user')->count('id_user');
            return view('admin.home',compact('postes_disponible','nombre_candidat','nombre_electeur','nombre_electeur_vote','settings'));
        }
}
