@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Inscrições</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Início</a></li>
              <li class="breadcrumb-item active">Inscricoes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div style="margin-bottom: 10px;" class="row">
    
    </div>
    <div class="card">
    <div class="card-header">
        {{ trans('global.inscricoes.lista') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.inscricoes.fields.estudante_nome') }}
                        </th>
                        <th>
                        {{ trans('global.inscricoes.fields.bi') }}
                        </th>
                        <th>
                        {{ trans('global.inscricoes.fields.curso_nome') }}
                        </th>
                        <th>
                        {{ trans('global.inscricoes.fields.horario') }}
                        </th>
                        <th>
                        {{ trans('global.inscricoes.fields.estado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todas_inscricoes as $key => $inscricao)
                    
                        <tr data-entry-id="">
                            <td>
                            
                            </td>
                            <td >
                            {{ $inscricao['nome'] ?? '--' }}
                            </td>
                            <td>
                                {{ $inscricao['bi_pass'] ?? '' }}
                            </td>
                            <td>
                            {{ $inscricao['curso'] ?? '--' }}
                            </td>
                            <td>
                            {{ $inscricao['Horario'] ?? '--' }}
                            
                            </td>
                            <td>
                          
                           
                            @if($inscricao['estado'])         
                            <span class="label label-success">{{ trans('global.pago') }}</span>
                            @else
                            <a href="#" class="label label-default" id="pendenteBtn" >{{ trans('global.pendente') }}</a>

                            @endif
                            </td>

                            <td>
                                @can('ver_inscricao_detalhes')
                                <a class="btn btn-xs btn-primary" title="Ver mais detalhes">
                                <i class="fas fa-eye"></i>
                                </a>
                                  @endcan

                                  @can('editar_inscricao')
                                <a class="btn btn-xs btn-info" title="Editar Inscrição">
                                <i class="fas fa-pen"></i>
                                </a>
                                @endcan

                                @can('eliminar_inscricao')
                                <a class="btn btn-xs btn-danger" href="{{ route('inscricoes.index') }}"  style="display: inline-block;" title="Eliminar inscrição">
                                <i class="fas fa-times"></i></a>
                                @endcan
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