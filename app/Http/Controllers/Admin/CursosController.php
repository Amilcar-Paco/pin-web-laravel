<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use google\appengine\api\cloud_storage\CloudStorageTools;
use App\Cursos;

class CursosController extends Controller
{
    public function index() {


        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Cursos");
        
        $cursos = $ref->getValue();
        
        if($cursos!= null){
            foreach($cursos as $curso) {
                $todos_cursos[] = $curso;
            }
        }
        else
        $cursos = null;
       

        
        //$cursos = Cursos::all();
        //return view('admin.cursos.index', compact('cursos'));
        return view('admin.gestao.cursos.index', compact('todos_cursos'));
    }

    public function create() {
        return view('admin.gestao.cursos.create');

    }


    public function store(){
  //      $options = ['size' => 400, 'crop' => true];
//$image_file = "gs://${my_bucket}/image.jpg";
        //$image_url = CloudStorageTools::getImageServingUrl($image_file, $options);
    }

    public function edit(Request $request, $id) {
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Cursos/".$id);

        $curso = $ref->getValue();

        return view('admin.gestao.cursos.edit', compact('curso'));
    }

    public function show($id)
    {

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Cursos/".$id);

        $curso = $ref->getValue();
        return view('admin.gestao.cursos.detalhes', compact('curso'));
    }
    
}

