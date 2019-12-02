@extends('admin.includes.adminlayout')



@section('breadcrumb')

  <!-- Breadcrumb-->

  <ol class="breadcrumb">

    <li class="breadcrumb-item">Home</li>

    <li class="breadcrumb-item">

      <a href="#">Admin</a>

    </li>

    <li class="breadcrumb-item active">Dashboard</li>

    <!-- Breadcrumb Menu-->

    <li class="breadcrumb-menu d-md-down-none">

      <div class="btn-group" role="group" aria-label="Button group">

        <a class="btn" href="#">

        <i class="icon-speech"></i>

        </a>

        <a class="btn" href="./">

        <i class="icon-graph"></i>  Dashboard</a>

        <a class="btn" href="#">

        <i class="icon-settings"></i>  Settings</a>

      </div>

    </li>

  </ol>

@endsection

@section('content')  

  <div class="row">
    <div class="col-lg-12">

      <div class="card">

        <div class="card-body">

          <div class="row">

              <div class="col-sm-5">

                  <h4 class="card-title mb-0">

                      Language Management <small class="text-muted">Language Add</small>


                  </h4>

              </div><!--col-->
          </div><!--row-->

          <hr>

         {!! Form::open(array('url' => 'admin/language/store')) !!}

          

          <div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('language', __( 'Language' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-10">

              {!! Form::text('language', null, ['class' => 'form-control', '', 'placeholder' => __( 'Language name' ) ]); !!}

            </div>

          </div>

          <div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('name', __( 'Locale' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-10">

              {!! Form::text('locale', null, ['class' => 'form-control', '', 'placeholder' => __( 'Locale' ) ]); !!}

            </div>

          </div>



          <div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('status', __( 'Status' ),  [ 'class' => 'col-form-label'] ) !!}

            </div>

            <div class="col-lg-10">

              <label class="col-form-label">

                  {!! Form::checkbox('status', true) !!}

              </label>

            </div>

          </div>



          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/language'); !!}">Cancel</a>

                </div>

                <div class="col text-right">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>



        {!! Form::close() !!}

        </div>

      </div>

    </div>



  </div>

@endsection

   