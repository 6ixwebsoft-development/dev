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
		  @if (count($errors) > 0)
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
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
			

        {!! Form::open(array('route' => array('admin.hitlist.update', $hitlist->id))) !!}
         <div class="form-group row">
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Language', __( 'Language' ) . ':*', [ 'class' => 'col-form-label']) !!}
					</div>

					<div class="col-lg-12">				  
					  {!! Form::select('lenguage', $language,$hitlist->lenguage, ['class' => 'form-control']) !!}

					</div>
				</div>
          
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Name', __( 'Name' ).':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('name', $hitlist->name, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Name' ) ]); !!}

					</div>
				</div>
			</div>
			
			 <div class="form-group row">
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Keyword', __( 'Keyword' ) . ':*', [ 'class' => 'col-form-label']) !!}
					</div>

					<div class="col-lg-12">				  
					   {!! Form::text('keyword', $hitlist->keyword, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Keyword' ) ]); !!}

					</div>
				</div>
          
				<div class="col-lg-6">
					<div class="col-lg-4">
					  {!! Form::label('Description', __( 'Description' ).':*', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">
					  {!! Form::textarea('description', $hitlist->description, ['class' => 'form-control', '', 'placeholder' => __( 'Write Description ' ) ]); !!}
					</div>
				</div>
			</div>
          

          <div class="card-footer clearfix">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-danger btn-sm" href="{!! url('/admin/hitlist'); !!}">Cancel</a>
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
   