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
                      Role Management <small class="text-muted">Role Add</small>
                  </h4>

              </div><!--col-->

            </div><!--row-->

            <hr>
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="form-group row">

                <div class="col-lg-2">

                  {!! Form::label('name', __( 'Name' ) . ':*', [ 'class' => 'col-form-label']) !!}

                </div>

                <div class="col-lg-10">
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
			
			<div class="form-group row">

                <div class="col-lg-2">

                  {!! Form::label('User Type', __( 'User Type' ) . ':*', [ 'class' => 'col-form-label']) !!}

                </div>

                <div class="col-lg-10">
                    {!! Form::radio('usertype', 1,false, array('placeholder' => 'Name')) !!} Admin/staff
					{!! Form::radio('usertype', 0,false, array('placeholder' => 'Name')) !!} User
                </div>
            </div>
			
			
			

           <!-- <div class="form-group row">

                <div class="col-lg-2">

                  {!! Form::label('permission', __( 'Permission' ), [ 'class' => 'col-form-label']) !!}

                </div>

                <div class="col-lg-10">
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                    @endforeach
                </div>
            </div>-->
			@foreach($controllers as $key => $value)
			<div class="form-group row">
			
                <div class="col-lg-4">

                  {!! Form::label($key, __( $key ), [ 'class' => 'col-form-label']) !!}

                </div>
				
                <div class="col-lg-2">
                        <label>{{ Form::checkbox('permission[]', get_permission_id($value.'-index'), false, array('class' => 'name')) }}
                       View</label>
                </div>
				<div class="col-lg-2">
                        <label>{{ Form::checkbox('permission[]', get_permission_id($value.'-create'), false, array('class' => 'name')) }}
                       Create</label>
                </div>
				<div class="col-lg-2">
                        <label>{{ Form::checkbox('permission[]', get_permission_id($value.'-edit'), false, array('class' => 'name')) }}
                        Update</label>
                </div>
				<div class="col-lg-2">
                        <label>{{ Form::checkbox('permission[]', get_permission_id($value.'-delete'), false, array('class' => 'name')) }}
                        Delete</label>
                </div>
            </div>
			 @endforeach
			 
			<hr>
			<h5>Extra Permissions</h5>
			<hr>
			<div class="form-group row">
			
				 @foreach($extraPermission as $key => $value)
                <div class="col-lg-3">
                        <label>{{ Form::checkbox('permission[]', get_permission_id($value), false, array('class' => 'name')) }}
						{{$key}}</label>
                </div>
				@endforeach
            </div>
			 
			 
			 
			 
    <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/roles'); !!}">Cancel</a>

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