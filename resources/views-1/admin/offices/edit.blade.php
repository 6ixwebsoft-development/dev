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

                      Office  Management <small class="text-muted">Office  Add</small>


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

       {!! Form::open(array('route' => array('admin.Office.update', $Offices->id))) !!}
	   
          <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Country', __( 'Country' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('country', $Offices->country, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Country' ),'onkeypress' => 'return IsNumeric(event);' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Country Code', __( 'Country Code' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('countrycode', $Offices->countrycode, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Country Code' ),'onkeypress' => 'return alphaOnly(event);' ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('City', __( 'City' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('city', $Offices->city, ['class' => 'form-control', '', 'placeholder' => __( 'Enter City' ),'onkeypress' => 'return IsNumeric(event);' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Office', __( 'Office' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('office', $Offices->office, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Office' ),'onkeypress' => 'return IsNumeric(event);' ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Tag', __( 'Tag' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('tag', $Offices->tag, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Tag' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Phone Number', __( 'Phone Number' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('phonenumber', $Offices->phonenumber, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Phone Number' ),'onkeypress' => 'return alphaOnly(event);' ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Fax Number', __( 'Fax Number' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('faxnumber', $Offices->faxnumber, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Fax Number' ),'onkeypress' => 'return alphaOnly(event);' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Tin Number', __( 'Tin Number' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('tinnumber', $Offices->tinnumber, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Tin Number' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Bank Account', __( 'Bank Account' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('bankaccount', $Offices->bankaccount, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Bank Account' ),'onkeypress' => 'return alphaOnly(event);' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Bank Code', __( 'Bank Code' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('bankcode', $Offices->bankcode, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Bank Code' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Address', __( 'Address' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('address1', $Offices->address1, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Address' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Address', __( 'Address2' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('address2', $Offices->address2, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Address2' ) ]); !!}

					</div>
					
				</div>

          </div>


		<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Address', __( 'Address3' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('address3', $Offices->address3, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Address3' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Address', __( 'Address4' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('address4', $Offices->address4, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Address4' ) ]); !!}

					</div>
				</div>

          </div>


			<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Address', __( 'Address5' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('address5', $Offices->address5, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Address5' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Url Address', __( 'Url Address' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('urladdress', $Offices->urladdress, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Url Address' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Email', __( 'Email' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::email('email', $Offices->email, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Email' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Google Map', __( 'Google Map' ) . ':', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('googlemap', $Offices->googlemap, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Google Map' ) ]); !!}

					</div>
				</div>

          </div>

          <div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('status', __( 'Status' ). ':*',  [ 'class' => 'col-form-label'] ) !!}

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

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/Office'); !!}">Cancel</a>

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

   