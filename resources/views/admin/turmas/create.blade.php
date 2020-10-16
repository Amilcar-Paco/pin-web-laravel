@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adicionar turma</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item " ><a href="#">Home</a></li>
              <li class="breadcrumb-item "><a href="#">Turma</a></li>
              <li class="breadcrumb-item active"><a href="#">Adicionar</a></li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
    <div class="card-header">
        {{ trans('global.adicionar') }} {{ trans('global.turma') }}
    </div>

    <div class="card-body">



        <div class=" {{ $errors->has('turmas') ? 'has-error' : '' }}">
               
            
           
            @csrf
            <div class="{{ $errors->has('codigo') ? 'has-error' : '' }}">
                <label for="codigo">{{ trans('global.turma_codigo') }}*</label>
                <input type="text" id="codigo" name="codigo" class="form-control">
               
              
            </div>

            <div class="">
                <label for="nome">{{ trans('global.turma_nome') }}*</label>
                <input type="text" id="nome" name="codigo" class="form-control">
              
            </div>
           

            <div class="">
                <label for="inicio">{{ trans('global.data_inicio') }}</label>
                <input id="inicio" class="form-control "/>
              
            </div>
            
            <div class="">
                <label for="fim">{{ trans('global.data_fim') }}</label>
                <input id="fim" class="form-control "/>
              
            </div>

            <div class="form-group">
                  <label>{{ trans('global.horario') }}</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="true" disabled="disabled">Selecciona o turno do curso</option>
                    <option value="8">8:00 AM - 10:00 AM</option>
                    <option value="8">8:00 AM - 10:00 AM</option>
                    <option value="8">8:00 AM - 10:00 AM</option>
                    <option value="8">8:00 AM - 10:00 AM</option>
                  </select>
            </div>
           <div class="form-group">
               <label>{{ trans('global.turma_professor') }}</label>

           </div>

            
           <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="formador">{{ trans('global.permission.fields.title') }}*</label>
                <input type="text" id="formador" name="formador" class="form-control" value="{{ $todos_formadores['nome']}}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>

            <div>
                <a class="btn btn-danger"  id ="save_btn_curso" >Guardar</a>
            </div>
            
    </div>
</div>
@endsection

