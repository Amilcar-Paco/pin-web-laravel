@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalhes do Curso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Cursos</a></li>
              <li class="breadcrumb-item">Detalhes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="card">
        <div class="card-header">
          <h2 class="card-title">Detalhes do Curso</h2>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total de Inscritos</span>
                      <span class="info-box-number text-center text-muted mb-0" id="inscritos" >Aguarde ...</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total matriculados</span>
                      <span class="info-box-number text-center text-muted mb-0" id="matriculados">Aguarde ...</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total de Turmas</span>
                      <span class="info-box-number text-center text-muted mb-0" id ="turmas">Aguarde ... <span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h2>Geral</h2>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{$curso['image']}}">
                        <span class="username">
                          <a href="#">{{ $curso['nome']}}</a>
                        </span>
                        <span class="description">Criado em - 3 dias atrás</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$curso['description']}}
                      </p>
                      <p>
                        <a href="{{ $curso['programa'] }}" target_="_blank" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Programa</a>
                        <button href="#">Editar</button>
                      </p>
                    </div>

                    <div class="post clearfix">
                    <h2>Formador responsável</h2>
                    Amílcar Paco
                      <!-- /.user-block -->
                    </div>

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Dados da Conta Bancária</h3>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Nome do Banco
                  <b class="d-block">Millennium BIM</b>
                </p>
                <p class="text-sm">Numero da conta
                  <b class="d-block">1234456</b>
                </p>
                <p class="text-sm">Nome do titular
                  <b class="d-block">IFPELAC</b>
                </p>
              </div>
              
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Editar</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
</div>
@endsection