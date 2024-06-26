<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting; 
use App\Http\Requests\SavePosteRequest;
use Illuminate\Validation\Rule;
use Exception; // Import de la classe Exception

class TitreController extends Controller
{   
    /*public function index_titre()
    {
        $settings = Setting::where('key', 'election_title')->first(); // Récupère le paramètre de titre d'élection
        return view('admin.titre_vote.update_titre', compact('settings'));
    }*/
    
    public function savesConfig(Request $request)
{

    // Valider les données du formulaire
    $request->validate([
        'title' => 'required|string|max:255', // Définissez les règles de validation appropriées
    ]);

    // Enregistrer le titre dans la table settings
    $setting = Setting::firstOrNew(['key' => 'election_title']);
    $setting->value = $request->input('title');
    $setting->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success_message', 'Configuration sauvegardée avec succès.');
}

}
