<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StoreUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enregistre les electeurs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $worksheet = $this->getActiveSheet(storage_path('data/electeur.xlsx'));

        foreach ($worksheet->getRowIterator() as $row) {
           $celliterator= $row->getCellIterator();
           $cellIterator->setIterateOnlyExistingCells(true);
           foreach ($cellIterator as $cell) {
                 dump($cell->getValue()) ;
        }

        }

        $this->comment('Electeurs enregistrés avec succes');
    }

    private function getActiveSheet(string $path):Worksheet{
        return (new Xlsx)
        ->load($path)
        ->getActiveSheet();

    }
}
