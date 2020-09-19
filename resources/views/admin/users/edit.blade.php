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
                        User Management <small class="text-muted">User Edit</small>
                   
                    </h4>
                </div><!--col-->

               
          </div><!--row-->
          <hr>
		  
		   @if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<ul id="login-validation-errors" class="validation-errors">
						@foreach ($errors->all() as $error)
							<li class="validation-error-item">{{ $error }}</li>
						@endforeach
					</ul>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif
		  
		  {!! Form::open(array('route' => array('admin.user.update', $user->id))) !!}
		
        <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('name', __( 'Name' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
                {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('email', __( 'Email' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
            {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'unique_email form-control')) !!}
            </div>
        </div>
     <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('password', __( 'Password' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('confirm-password', __( 'Confirm Password' ) . ':*') !!}
            </div>
            <div class="col-lg-10">
                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="form-group row">
            <div class="col-lg-2">
              {!! Form::label('role', __( 'Roles' )) !!}
            </div>
            <div class="col-lg-10">						<select class="form-control" name="roles">			@foreach($roles as $Role)				<option value="{{$Role->id}}"@if($userRole == $Role->id) selected @endif>{{$Role->name}}</option>			@endforeach						</select>
           
        </div>
    </div>
   <div class="card-footer clearfix">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-danger btn-sm" href="{!! url('/admin/users'); !!}">Cancel</a>
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
   