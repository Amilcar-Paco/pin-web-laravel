<?php

namespace App\Http\Controllers\admin;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Turmas");
        
        $turmas = $ref->getValue();
        
        if($turmas != null){
            foreach($turmas as $turma) {
                $todas_turmas[] = $turma;
            }
    
        }
        else
        $todas_turmas[] = null;
       
        return view('admin.gestao.turmas.index', compact('todas_turmas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://pinapp-96d0a.firebaseio.com/')
        ->create();

        $database = $firebase->getDatabase();

        $ref_formadores = $database->getReference("Formadores");

        $ref_cursos = $database->getReference("Cursos");
        
        
        $formadores = $ref_formadores->getValue();

        $cursos = $ref_cursos->getValue();
        
        if($formadores != null){
            foreach($formadores as $formador) {
                $todos_formadores[] = $formador;
            }
    
        }

        if($cursos != null){
            foreach($cursos as $curso) {
                $todos_cursos[] = $curso;
            }
    
        }

       
       
        return view('admin.gestao.turmas.create', compact('todos_formadores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
