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
	                    Permission Management <small class="text-muted">Permission Update</small>
	               
	                </h4>
	            </div><!--col-->

	           
          </div><!--row-->
          <hr>
        {!! Form::open(array('route' => array('admin.permission.update', $permission->id))) !!}
          {{ method_field('PATCH') }}
          <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('name', __( 'Permission' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
              {!! Form::text('name', $permission->name, ['class' => 'form-control', '', 'placeholder' => __( 'Permission' ) ]); !!}
            </div>
          </div>
          <div class="card-footer clearfix">
              <div class="row">
                  <div class="col">
                      <a class="btn btn-danger btn-sm" href="{!! url('/admin/permission'); !!}">Cancel</a>
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
   