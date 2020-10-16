<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Illuminate\Http\Request;

class InscricoesController extends Controller
{
    public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Inscricoes/");

        $inscricoes = $ref->getValue();

        foreach($inscricoes as $inscricao) {
            $todas_inscricoes[] = $inscricao;
        }

        return view('inscricoes.index', compact('todas_inscricoes'));
    }
}
