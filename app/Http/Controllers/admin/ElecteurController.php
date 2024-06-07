<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\ElecteurImport;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ElecteurController extends Controller
{
    

        public function index_electeur(){
          $electeurs=User::paginate(100);
           return view('admin.electeur.index_electeur',compact('electeurs'));
       }

       public function create_electeur()
            {
                
                return view('admin.electeur.create_electeur');
            }



       public function edit_electeur(User $electeur){
           return view('admin.electeur.edit_electeur',compact('electeur'));
       }
       public function delete_electeur(User $electeur){
           return view('admin.electeur.delete_electeur',compact('electeur'));
       }

//Action avec la BD

public function store_electeur(User $electeur, Request $request)
{
    try {
        $request->validate([
            'prenom_electeur' => ['required'],
            'nom_electeur' => ['required'],
            'mail_electeur' => ['required', 'email'], // Vérifie si c'est un email valide
            'mot_de_passe_electeur'=> ['required'],
            'photo' => ['image', 'max:2048'], // Vérifie que c'est une image et que sa taille ne dépasse pas 2 Mo
        ]);

        // Assignation des valeurs des champs
        $electeur->prenom_electeur = $request->prenom_electeur;
        $electeur->nom_electeur = $request->nom_electeur;
        $electeur->email = $request->mail_electeur;
        // Hasher le mot de passe
        $electeur->password= Hash::make($request->mot_de_passe_electeur);
       if ($request->has('photo')) {
            $electeur->photo = $request->photo->store('photos', 'public'); // Assurez-vous que le nom du champ correspond à celui de la base de données et que vous stockez correctement l'image
        }
        $electeur->save();

        // Redirection avec un message de succès
        return redirect()->route('electeur.index_electeur')->with('success_message', 'Electeur enregistré avec succès');
    } catch (\Exception $e) {
        // En cas d'erreur, rediriger avec un message d'erreur
        return redirect()->route('electeur.index_electeur')->withErrors(['error_message' => 'Une erreur s\'est produite lors de l\'enregistrement de l\'electeur']);
    }
}





       public function update_electeur(User $electeur, Request $request)
       {
           try {
                $electeur->prenom_electeur = $request->prenom_electeur;
                $electeur->nom_electeur = $request->nom_electeur;
                $electeur->email = $request->mail_electeur;
                if ($request->hasFile('photo')) {
                    $electeur->photo = $request->photo->store('photos', 'public');
                }
                
               $electeur->update();

               // Redirection avec un message de succès
               return redirect()->route('electeur.index_electeur')->with('success_message', 'Electeur mis à jour avec succès');
           } catch (\Exception $e) {
               // En cas d'erreur, rediriger avec un message d'erreur
               return redirect()->route('electeur.index_electeur')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la mise à jour de l\electeur']);
           }
       }

       public function delete(User $electeur)
       {
           try {
               $electeur->delete();
               // Redirection avec un message de succès
               return redirect()->route('electeur.index_electeur')->with('success_message', 'Electeur supprimé avec succès');
           } catch (\Exception $e) {
               // En cas d'erreur, rediriger avec un message d'erreur
               return redirect()->route('electeur.index_electeur')->withErrors(['error_message' => 'Une erreur s\'est produite lors de la suppression de l\electeur']);
           }
       }

       public function import(Request $request)
    {
        // Vérifiez d'abord si un fichier a été téléchargé
        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');

            // Validez le fichier s'il s'agit d'un fichier Excel
            if ($file->getClientOriginalExtension() == 'xlsx' || $file->getClientOriginalExtension() == 'xls') {
                // Déplacez le fichier vers un emplacement temporaire
                $filePath = $file->storeAs('temp', $file->getClientOriginalName());

                // Instanciez la classe ElecteurImport et appelez la méthode d'importation
                $importer = new ElecteurImport();
                $importer->import(storage_path('app/' . $filePath));

                // Supprimez le fichier temporaire après l'importation
                unlink(storage_path('app/' . $filePath));

                return redirect()->back()->with('success', 'Importation réussie.');
            } else {
                return redirect()->back()->with('error', 'Le fichier doit être un fichier Excel.');
            }
        } else {
            return redirect()->back()->with('error', 'Veuillez sélectionner un fichier à importer.');
        }
    }
       
}
