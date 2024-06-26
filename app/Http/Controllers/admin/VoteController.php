<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vote;
use App\Models\poste;
use App\Models\candidat;
use App\Models\User;
use App\Http\Requests\SavePosteRequest;
use Illuminate\Validation\Rule;
use Exception; // Import de la classe Exception

class VoteController extends Controller
{
    public function index_vote(){
       $votes=Vote::paginate(10);
       $postes = poste::all();
       $candidats = candidat::all();
       $electeurs =User::all();
        return view('admin.vote.index_vote',compact('votes','postes','candidats','electeurs'));
    }

    public function resetVotes()
    {
        // Supprimer tous les votes
        Vote::truncate();

        // Redirection avec message de succès
        return redirect()->back()->with('success_message', 'Tous les votes ont été réinitialisés avec succès.');
    }
}
