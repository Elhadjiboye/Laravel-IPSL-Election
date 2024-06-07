<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poste;
use App\Http\Requests\SavePosteRequest;
use Illuminate\Validation\Rule;
use Exception; // Import de la classe Exception

class PosteController extends Controller
{
    public function index_poste(){
       $postes=Poste::paginate(10);
        return view('admin.poste.index_poste',compact('postes'));
    }
    public function create_poste(){
        return view('admin.poste.create_poste');
    }
    public function edit_poste(Poste $poste){
        return view('admin.poste.edit_poste', compact('poste'));
    }

    public function delete_poste(Poste $poste){
        return view('admin.poste.delete_poste', compact('poste'));
    }

    //Action avec la BD

        public function store_poste(Poste $poste, Request $request)
        {
            try {
                $request->validate([
                    'type_poste' => ['required', Rule::unique('postes', 'type_poste')],
                    'max_vote' => ['required'],
                    'date_debut' => ['required', 'date'],
                    'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
                ]);
                // Si la validation réussit, vous pouvez simplement utiliser les données du formulaire
                $poste->type_poste = $request->type_poste;
                $poste->max_vote = $request->max_vote;
                $poste->date_debut = $request->date_debut;
                $poste->date_fin = $request->date_fin;
                $poste->save();

                // Rediriger avec un message de succès
                return redirect()->route('poste.index_poste')->with('success_message', 'Poste enregistrée');
            } catch (\Exception $e) {
                // Si une exception se produit, afficher l'erreur
                return redirect()->route('poste.index_poste')->withErrors(['error_message' => 'Une erreur s\'est produite lors de l\'enregistrement du poste']);
            }
        }

        public function update_poste(Poste $poste , Request $request)
                {
                    try {
                            $poste->type_poste = $request->type_poste;
                            $poste->max_vote = $request->max_vote;
                            $poste->date_debut = $request->date_debut;
                            $poste->date_fin = $request->date_fin;
                            $poste->update();
                        // Rediriger avec un message de succès
                        return redirect()->route('poste.index_poste')->with('success_message', 'Poste mis à jour');
                    } catch (\Exception $e) {
                        // Si une exception se produit, afficher l'erreur
                        return redirect()->route('poste.index_poste')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la mise à jour du poste']);
                    }
                }

        public function delete(Poste $poste)
                {
                    try {
                            $poste->delete();
                        // Rediriger avec un message de succès
                        return redirect()->route('poste.index_poste')->with('success_message', 'Poste supprimée');
                    } catch (\Exception $e) {
                        // Si une exception se produit, afficher l'erreur
                        return redirect()->route('poste.index_poste')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la mise à jour du poste']);
                    }
                }

}
