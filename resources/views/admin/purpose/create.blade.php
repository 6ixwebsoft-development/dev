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

                      Hitlist Management <small class="text-muted">Hitlist Add</small>


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

         {!! Form::open(array('url' => 'admin/purpose/store')) !!}

          

          <div class="form-group row">
		  
				<div class="col-lg-6">
					<div class="col-lg-4">
					  {!! Form::label('Form', __( 'Form' ) . '', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">				  
					  {!! Form::select('formid[]', $form,[], ['class' => 'form-control' ,'multiple']) !!}
					</div>					
					<div class="col-lg-4">
					  {!! Form::label('Hitlist', __( 'Hitlist' ).'', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">
					   {!! Form::select('hitlist[]', $hitlist,[], ['class' => 'form-control' ,'multiple']) !!}
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="col-lg-4">
					  {!! Form::label('Price (Auto)', __( 'Price (Auto)' ) . '', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">				  
						<select class="form-control" name="autoproductid">
							
							@foreach($product as $Products)
							<option value="{{$Products->id}}">{{$Products->productname}} ({{$Products->price}}) </option>
							@endforeach
						</select>

					</div>					
					<div class="col-lg-4">
					  {!! Form::label('coustomproductid (Custom)', __( 'Price (Custom)' ).'', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">
					   <select class="form-control" name="coustomproductid">
							
							@foreach($product as $Products)
							<option value="{{$Products->id}}">{{$Products->productname}} ({{$Products->price}}) </option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-8">
					  {!! Form::label('Related Purposes(home & search checkboxes)', __( 'Related Purposes(home & search checkboxes)' ).'', [ 'class' => 'col-form-label']) !!}
					</div>
					<div class="col-lg-12">
					   {!! Form::select('purposeid[]', $purpose,[], ['class' => 'form-control' ,'multiple']) !!}
					</div>
				</div>
				
			</div>
			
			
			 <hr>
			 
			 <ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Svenska</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">English</a>
				  </li>
			</ul>
			
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="form-group row">
						<div class="col-lg-6">
							<div class="col-lg-8">
								{!! Form::label('Home & Search Description', __( 'Home & Search Description' ).':*', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::text('description2', null, ['class' => 'form-control', '', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-4">
								{!! Form::label('Show', __( 'Show' ).'', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::checkbox('showseaechdesc2', true) !!}
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<div class="col-lg-8">
								{!! Form::label('Member Page Description', __( 'Member Page Description' ).':*', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::text('memberdescription2', null, ['class' => 'form-control', '', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-4">
								{!! Form::label('Show', __( 'Show' ).'', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::checkbox('showmemberdesc2', true) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


				<div class="form-group row">
						<div class="col-lg-6">
							<div class="col-lg-8">
								{!! Form::label('Home & Search Description', __( 'Home & Search Description' ).':*', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::text('description1', null, ['class' => 'form-control', '', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-4">
								{!! Form::label('Show', __( 'Show' ).'', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::checkbox('showseaechdesc1', true) !!}
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<div class="col-lg-8">
								{!! Form::label('Member Page Description', __( 'Member Page Description' ).':*', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::text('memberdescription1', null, ['class' => 'form-control', '', 'placeholder' => __( '' ) ]); !!}
							</div>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-4">
								{!! Form::label('Show', __( 'Show' ).'', [ 'class' => 'col-form-label']) !!}
							</div>
							<div class="col-lg-12">
								{!! Form::checkbox('showmemberdesc1', true) !!}
							</div>
						</div>
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

   