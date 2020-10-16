@extends('layouts.admin')
@section('content')

<div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>{{ trans('global.novas_inscricoes') }}</p>
              </div>
              <div class="icon">
              <i class="fas fa-clipboard"></i>
              </div>
              <a href="{{ route('inscricoes.index') }}" class="small-box-footer">{{ trans('global.mais_informacao') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>{{ trans('global.formandos')}}</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-graduate"></i>
              </div>
              <a href="#" class="small-box-footer">{{ trans('global.mais_informacao') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>{{ trans('global.turmas') }}</p>
              </div>
              <div class="icon">
              <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="#" class="small-box-footer">{{ trans('global.mais_informacao') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>{{ trans('global.formadores') }}</p>
              </div>
              <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="#" class="small-box-footer">{{ trans('global.mais_informacao') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>

@endsection
@section('scripts')
@parent

@endsection