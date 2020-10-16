@extends('layouts.admin')
@section('content')

@can('formando_adicionar')
<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.formandos.index') }}">
                {{ trans('global.add') }} {{ trans('global.turma') }}
            </a>
        </div>
    </div>
@endcan
@endsection