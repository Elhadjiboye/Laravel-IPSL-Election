<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ElecteurImport
{
     public function import($filePath)
     {
         $spreadsheet = IOFactory::load($filePath);
         $worksheet = $spreadsheet->getActiveSheet();
 
         $data = [];
         foreach ($worksheet->getRowIterator() as $row) {
             $rowData = [];
             foreach ($row->getCellIterator() as $cell) {
                 $rowData[] = $cell->getValue();
             }
             $data[] = $rowData;
         }
 
         foreach ($data as $row) {
          // Vérifier si l'email existe déjà dans la base de données
          if (User::where('email', $row[2])->exists()) {
              // Gérer l'erreur et renvoyer un message approprié à l'utilisateur
              // Par exemple, vous pouvez rediriger l'utilisateur avec un message d'erreur
              return redirect()->back()->with('error', 'L\'adresse e-mail ' . $row[2] . ' existe déjà.');
          } else {
              // Si l'email est unique, créer l'utilisateur
              $user = new User([
                  'prenom_electeur' => $row[0],
                  'nom_electeur' => $row[1],
                  'email' => $row[2],
                  'password' => Hash::make($row[3]),
              ]);
              $user->save();
          }
      }
      
     }
}
