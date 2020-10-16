<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FormadoresController extends Controller
{
    public function index() {

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Formadores");
        
        $formadores = $ref->getValue();

        if($formadores!= null){
            foreach($formadores as $formador) {
                $todos_formadores[] = $formador;
            }
        }
       
       return view('admin.administracao.formadores.index', compact('todos_formadores')); 
    }

    public function create() {
        return view('admin.administracao.formadores.create');
    }
}
