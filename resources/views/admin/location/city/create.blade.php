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
                    	Create Module <small class="text-muted">Module</small>
                		</h4>
					</div>
					<!--col-->
					<div class="col-sm-7">
						
					</div>
					<!--col-->
				</div>
				<!--row-->
				<hr>
				{!! Form::open(array('url' => 'admin/location/city/store')) !!}
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('country', __( 'Country ' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::select('country_id', $country_arr, '', ['class' => 'form-control']); !!}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('region', __( 'Region ' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::select('region_id', $region_arr, '', ['class' => 'form-control']); !!}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('city-name', __( 'City Name' ) . ':*') !!}
						</div>
						<div class="col-lg-10">
							{!! Form::text('city_name', null, ['class' => 'form-control', '', 'placeholder' => __( 'City Name' ) ]); !!}
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-2">
							{!! Form::label('status', __( 'Status' ) ) !!}
						</div>
						<div class="col-lg-10">
							<label class="switch switch-label switch-pill switch-primary">
	                            {!! Form::checkbox('status', true) !!}
	                            <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
	                        </label>
						</div>
					</div>

					<div class="card-footer clearfix">
		                <div class="row">
		                    <div class="col">
		                        <a class="btn btn-danger btn-sm" href="{!! url('/admin/location/city'); !!}">Cancel</a>
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