@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Formadores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formadores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.formadores.create") }}">
                {{ trans('global.adicionar') }} {{ trans('global.formador') }}
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
                            {{ trans('global.formador_nome') }}
                        </th>
                        <th>
                            {{ trans('global.formador_bi') }}
                        </th>
                        <th>
                            {{ trans('global.formador_nivel') }}
                        </th>
                        <th>
                            {{ trans('global.formador_estado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos_formadores as $key => $formador)
                        <tr data-entry-id="">
                            <td>

                            </td>
                            <td >
                                {{ $formador['nome'] ?? '--' }}
                                
                            </td>
                            <td>
                                {{ $formador['bi'] ?? '--' }}
                            </td>
                            <td>
                            {{ $formador['nivel'] ?? '--' }}
                            </td>
                            <td>

                                @if($formador['estado'])         
                                <a href="" class="label label-success"  onclick="desativo('{{ $formador['chave']}}')">{{ trans('global.activo') }}</a>
                                @else
                                <a  href="" class="label label-default" id="pendenteBtn" onclick="activo('{{ $formador['chave']}}')" >{{ trans('global.inactivo') }}</a>
                                @endif

                            </td>
                            <td>
                                
                                    <a class="btn btn-xs btn-primary" >
                                        {{ trans('global.ver') }}
                                    </a>
                                
                                
                                    <a class="btn btn-xs btn-info" href="">
                                        {{ trans('global.editar') }}
                                    </a>
                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.formadores.index') }}" style="display: inline-block;">
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