@extends('admin.includes.adminlayout') @section('breadcrumb')
<!-- Breadcrumb-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">Home</li>
	<li class="breadcrumb-item"> <a href="#">Admin</a>
	</li>
	<li class="breadcrumb-item active">Dashboard</li>
	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"> <i class="icon-speech"></i>
			</a>
			<a class="btn" href="./"> <i class="icon-graph"></i>  Dashboard</a>
			<a class="btn" href="#"> <i class="icon-settings"></i>  Settings</a>
		</div>
	</li>
</ol>
@endsection @section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-5">
						<h4 class="card-title mb-0">
                    	Create Country <small class="text-muted">Country</small>
                		</h4>
					</div>
					<!--col-->
					<div class="col-sm-7">
						
					</div>
					<!--col-->
				</div>
				<!--row-->
				<hr>
				{!! Form::open(array('route' => array('admin.location.country.update', $country->id))) !!}
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('country-block', __( 'Country Block' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::select('nation_id', $block_arr , '' , ['class' => 'form-control']); !!}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('country-code', __( 'Country Code' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::text('country_code', $country->country_code, ['class' => 'form-control', '']); !!}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('country-name', __( 'Country Name' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::text('country_name', $country->country_name, ['class' => 'form-control', '' ]); !!}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('calling-code', __( 'Calling Code' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::text('calling_code', $country->calling_code, ['class' => 'form-control', '' ]); !!}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('status', __( 'Status' ) ) !!}
						</div>
						<div class="col-lg-10">
	                        <div class="custom-control custom-switch">
	                        	@if($country->status == 1)
							  		<input type="checkbox" class="custom-control-input" id="customSwitch1" name='status' checked="true" value='1'>
							  	@else
							  		<input type="checkbox" class="custom-control-input" id="customSwitch1" name='status' value='1'>
							  	@endif
							  		<label class="custom-control-label" for="customSwitch1">Activate</label>
							</div>
						</div>
					</div>

					<div class="card-footer clearfix">
		                <div class="row">
		                    <div class="col">
		                        <a class="btn btn-danger btn-sm" href="{!! url('/admin/location/country'); !!}">Cancel</a>
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

@endsection