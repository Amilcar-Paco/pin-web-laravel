@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adicionar curso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Cursos</a></li>
              <li class="breadcrumb-item active">Editar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="card">
    <div class="card-header">
        {{ trans('global.adicionar') }} {{ trans('global.curso.title_singular') }}
    </div>

    <div class="card-body">

        </form id="add-course">
        <div class=" {{ $errors->has('inscricao') ? 'has-error' : '' }}">
                <label>
                Imagem do Curso *</br>
                <input type="file" id ="image" accept="image/*"/>
                </label>
                
                @if($errors->has('inscricao'))
                    <p class="help-block">
                        {{ $errors->first('inscricao') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.inscricao_helper') }}
                </p>
            </div>
           
            @csrf
            <div class="{{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.curso.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($curso) ? $curso->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.name_helper') }}
                </p>
            </div>
            <div class="{{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.curso.fields.descricao') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($curso) ? $curso->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.descricao_helper') }}
                </p>
            </div>


            <div class=" {{ $errors->has('inscricao') ? 'has-error' : '' }}">
                <label for="inscricao">{{ trans('global.curso.fields.inscricao') }}</label>
                <input type="text" id="inscricao" name="inscricao" class="form-control" value="{{ old('inscricao', isset($curso) ? $curso->inscricao : '') }}" step="0.01">
                @if($errors->has('inscricao'))
                    <p class="help-block">
                        {{ $errors->first('inscricao') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.inscricao_helper') }}
                </p>
            </div>


            <div class=" {{ $errors->has('mensalidade') ? 'has-error' : '' }}">
                <label for="menasalidade">{{ trans('global.curso.fields.mensalidade') }}</label>
                <input type="text" id="mensalidade" name="mensalidade" class="form-control" value="{{ old('mensalidade', isset($curso) ? $curso->mensalidade : '') }}" step="0.01">
                @if($errors->has('mensalidade'))
                    <p class="help-block">
                        {{ $errors->first('mensalidade') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.mensalidade_helper') }}
                </p>
            </div>

            <div class="{{ $errors->has('duracao') ? 'has-error' : '' }}">
                <label for="duracao">{{ trans('global.curso.fields.duracao') }}</label>
                <input type="text" id="duracao" name="duracao" class="form-control" value="{{ old('duracao', isset($curso) ? $curso->duracao : '') }}" step="0.01">
                @if($errors->has('duracao'))
                    <p class="help-block">
                        {{ $errors->first('duracao') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.curso.fields.duracao_helper') }}
                </p>
            </div>
            
            <label>
                Programa do Curso - pdf </br>
                <input type="file" id ="programa" accept="application/pdf"/>
                </label>

            <div>
                <button class="btn btn-primary"  id ="save_btn_curso" >Guardar</button>
            </div>
            </form>
    </div>
</div>
@endsection

