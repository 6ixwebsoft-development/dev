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
                      Subscription Management <small class="text-muted">Subscription Add</small>
                  </h4>

              </div><!--col-->

            </div><!--row-->

            <hr>
            {!! Form::open(array('url' => 'admin/subscription/store')) !!}
          
          <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('name', __( 'Name' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Name' ) ]); !!}
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('role_id', __( 'Role' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
              {!! Form::text('role_id', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Role id' ) ]); !!}
            </div>
          </div>
          <div class="form-group row">
              <div class="col-lg-2">
                {!! Form::label('start_date', __( 'Start Date' ) . ':*') !!}
              </div>
              <div class="col-lg-10">
                {!! Form::text('start_date', null, array('placeholder' => 'Start Date', 'required' => 'required', 'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-2">
                {!! Form::label('end_date', __( 'End Date' ) . ':*') !!}
              </div>
              <div class="col-lg-10">
                {!! Form::text('end_date', null, array('placeholder' => 'End Date', 'required' => 'required', 'class' => 'form-control')) !!}
              </div>
            </div>
             <div class="form-group row">
              <div class="col-lg-2">
                {!! Form::label('status', __( 'Status' ) . ':*') !!}
              </div>
              <div class="col-lg-10">
                {!! Form::text('status',  null, array('placeholder' => 'Status', 'required' => 'required', 'class' => 'form-control')) !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-2">
                {!! Form::label('price', __( 'Price' ) . ':*') !!}
              </div>
              <div class="col-lg-10">
                {!! Form::text('price', null, array('placeholder' => 'Price', 'required' => 'required', 'class' => 'form-control')) !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-2">
                {!! Form::label('no_of_days', __( 'No of days' ) . ':*') !!}
              </div>
              <div class="col-lg-10">
                {!! Form::text('no_of_days',  null, array('placeholder' => 'No of days
                ', 'required' => 'required', 'class' => 'form-control')) !!}
              </div>
            </div>
          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/subscription'); !!}">Cancel</a>

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