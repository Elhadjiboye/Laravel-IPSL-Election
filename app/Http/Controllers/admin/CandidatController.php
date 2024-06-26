<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\candidat;
use App\Models\poste;

class CandidatController extends Controller
{
        public function index_candidat(){
          $candidats=candidat::paginate(100);
          $postes = poste::all();
           return view('admin.candidat.index_candidat',compact('candidats','postes'));
       }

       public function create_candidat()
            {
                
                return view('admin.candidat.create_candidat');
            }



       public function edit_candidat(candidat $candidat){
           return view('admin.candidat.edit_candidat',compact('candidat'));
       }
       public function delete_candidat(candidat $candidat){
           return view('admin.candidat.delete_candidat',compact('candidat'));
       }

//Action avec la BD

public function store_candidat(candidat $candidat, Request $request)
{
    try {
        $request->validate([
            'prenom_candidat' => ['required'],
            'nom_candidat' => ['required'],
            'mail_candidat' => ['required', 'email'], // Vérifie si c'est un email valide
            'poste' => ['required'],
            'photo' => ['image', 'max:2048'], // Vérifie que c'est une image et que sa taille ne dépasse pas 2 Mo
            'platform' => ['string'], // Vérifie que c'est une chaîne de caractères et que sa longueur ne dépasse pas 1000 caractères
        ]);

        // Assignation des valeurs des champs
        $candidat->prenom_candidat = $request->prenom_candidat;
        $candidat->nom_candidat = $request->nom_candidat;
        $candidat->mail_candidat = $request->mail_candidat;
        $candidat->id_poste = $request->poste; // Assurez-vous que le nom du champ correspond à celui de la base de données
        if ($request->has('photo')) {
            $candidat->photo = $request->photo->store('photos', 'public'); // Assurez-vous que le nom du champ correspond à celui de la base de données et que vous stockez correctement l'image
        }
        if ($request->has('platform')) {
            $candidat->programme_detude = $request->platform; // Assurez-vous que le nom du champ correspond à celui de la base de données
        }
        $candidat->save();

        // Redirection avec un message de succès
        return redirect()->route('candidat.index_candidat')->with('success_message', 'Candidat enregistré avec succès');
    } catch (\Exception $e) {
        // En cas d'erreur, rediriger avec un message d'erreur
        return redirect()->route('candidat.index_candidat')->withErrors(['error_message' => 'Une erreur s\'est produite lors de l\'enregistrement du candidat']);
    }
}





       public function update_candidat(candidat $candidat, Request $request)
       {
           try {
                $candidat->prenom_candidat = $request->prenom_candidat;
                $candidat->nom_candidat = $request->nom_candidat;
                $candidat->mail_candidat = $request->mail_candidat;
                $candidat->id_poste = $request->poste; // Assurez-vous que le nom du champ correspond à celui de la base de données
                if ($request->hasFile('photo')) {
                    $candidat->photo = $request->photo->store('photos', 'public'); // Assurez-vous que le nom du champ correspond à celui de la base de données et que vous stockez correctement l'image
                }
                if ($request->has('platform')) {
                    $candidat->programme_detude = $request->platform; // Assurez-vous que le nom du champ correspond à celui de la base de données
                }
               $candidat->update();

               // Redirection avec un message de succès
               return redirect()->route('candidat.index_candidat')->with('success_message', 'Candidat mis à jour avec succès');
           } catch (\Exception $e) {
               // En cas d'erreur, rediriger avec un message d'erreur
               return redirect()->route('candidat.index_candidat')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la mise à jour du candidat']);
           }
       }

       public function delete(candidat $candidat)
       {
           try {
               $candidat->delete();
               // Redirection avec un message de succès
               return redirect()->route('candidat.index_candidat')->with('success_message', 'Candidat supprimé avec succès');
           } catch (\Exception $e) {
               // En cas d'erreur, rediriger avec un message d'erreur
               return redirect()->route('candidat.index_candidat')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la suppression du candidat']);
           }
       }


}
