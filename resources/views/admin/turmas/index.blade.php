@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Turmas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Turmas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.turmas.create") }}">
                {{ trans('global.adicionar') }} {{ trans('global.turma') }}
            </a>
        </div>
    </div>
    <div class="card">
    <div class="card-header">
        {{ trans('global.turma_lista') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.turma_codigo') }}
                        </th>
                        <th>
                        {{ trans('global.turma_nome') }}
                        </th>
                        <th>
                        {{ trans('global.turma_horario') }}
                        </th>
                        <th>
                        {{ trans('global.turma_inicio') }}
                        </th>
                        <th>
                        {{ trans('global.turma_fim') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todas_turmas as $key => $turma)
                        <tr data-entry-id="">
                            <td>

                            </td>
                            <td >
                                {{ $turma['codigo'] ?? '--' }}
                                
                            </td>
                            <td>
                                {{ $turma['nome'] ?? '--' }}
                            </td>
                            <td>
                            {{ $turma['horario'] ?? '--' }}
                            </td>
                            <td>
                            {{ $turma['inicio'] ?? '--' }}
                            </td>
                            <td>
                            {{ $turma['fim'] ?? '--' }}
                            </td>
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" >
                                        {{ trans('global.ver') }}
                                    </a>
                                
                                
                                    <a class="btn btn-xs btn-info" href="">
                                        {{ trans('global.editar') }}
                                    </a>
                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.turmas.index') }}" onclick="removerCurso(confirm('{{ trans('global.areYouSure') }}'), '{{ $turma['chave']}}');" style="display: inline-block;">
                                      {{ trans('global.remover') }}
                                    </a>
                                
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection