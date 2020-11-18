@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cursos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cursos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.cursos.create") }}">
                {{ trans('global.adicionar') }} {{ trans('global.curso.title_singular') }}
            </a>
        </div>
    </div>
    <div class="card">
    <div class="card-header">
        {{ trans('global.formador_lista') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.curso.fields.img') }}
                        </th>
                        <th>
                            {{ trans('global.curso.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.curso.fields.inscricao') }}
                        </th>
                        <th>
                            {{ trans('global.curso.fields.mensalidade') }}
                        </th>
                        <th>
                            {{ trans('global.curso.fields.duracao') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos_cursos as $key => $curso)
                        <tr data-entry-id="">
                            <td>

                            </td>
                            <td ><img src="{{ $curso['image'] ?? '' }}" style="height: 50px; width: 50px;">
                                
                            </td>
                            <td>
                            {{ $curso['nome'] ?? '' }}
                            </td>
                            <td>
                            {{ $curso['inscricao'] ?? '' }}
                            </td>
                            <td>
                            {{ $curso['mensalidade'] ?? '' }}
                            </td>
                            <td>
                            {{ $curso['duracao'] ?? '' }}
                            </td>
                            <td>
                                
                                  <a class="btn btn-xs btn-primary" onclick="total()" href="{{ route('admin.cursos.show', $curso['chave']) }}" title="Ver mais detalhes">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                
                                
                                  <a class="btn btn-xs btn-info" href="{{ route('admin.cursos.edit',  $curso['chave'])}}" title="Editar curso">
                                    <i class="fas fa-pen"></i>
                                    </a>
                                
                                  <a class="btn btn-xs btn-danger" href="{{ route('admin.cursos.index') }}" onclick="removerCurso(confirm('{{ trans('global.areYouSure') }}'), '{{ $curso['chave']}}');" style="display: inline-block;" title="Remover o curso">
                                    <i class="fas fa-times"></i></a>
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