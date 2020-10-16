@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Criar turma</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item " ><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="#">Turma</a></li>
              <li class="breadcrumb-item">Criar</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
    <div class="card-header">
        {{ trans('global.criar') }} {{ trans('global.turma') }}
    </div>

    <div class="card-body">



        <div class=" {{ $errors->has('turmas') ? 'has-error' : '' }}">
               
            
           
            @csrf
            <div class="{{ $errors->has('codigo') ? 'has-error' : '' }} form-group">
                <label for="codigo">{{ trans('global.turma_codigo') }}*</label>
                <input type="text" id="codigo" name="codigo" class="form-control">
               
              
            </div>

            <div class="form-group">
                <label for="turma">{{ trans('global.turma_nome') }}*</label>
                <input type="text" id="turma" name="turma" class="form-control">
              
            </div>

            <div class="form-group">
                <label for="curso">{{ trans('global.curso_nome') }}*</label>
                <input type="text" id="curso" name="curso" class="form-control">
              
            </div>
           
           

            <div class="form-group">
                <label for="inicio">{{ trans('global.data_inicio') }}</label>
                <input name ="inicio" id="inicio" class="form-control "/>
              
            </div>
            
            <div class="form-group">
                <label for="fim">{{ trans('global.data_fim') }}</label>
                <input  name="fim" id="fim" class="form-control "/>
              
            </div>

            <div class="form-group">
                  <label for ="horario">{{ trans('global.horario') }}</label>
                  <input name="horario" id="horario" type="text" class="form-control" placeholder="HH:MM - HH:MM"/>
            </div>
           <div class="form-group">
               <label>{{ trans('global.turma_professor') }}</label>
               <select id="formador" class="form-control select2" multiple="multiple">
                    @foreach($todos_formadores as $formador)
                        <option value="{{ $formador['chave'] }}">
                            {{ $formador['nome'] }}
                        </option>
                    @endforeach
                </select>

           </div>

            <div>
                <a class="btn btn-danger"  id ="save_btn_turma" >Guardar</a>
            </div>
            
    </div>
</div>
@endsection

