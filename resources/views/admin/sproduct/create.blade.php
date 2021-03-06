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
			@if($errors->any())
			{{ implode('', $errors->all('<div>:message</div>')) }}
			@endif
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

                      Product Management <small class="text-muted">Product Add</small>


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
		  

         {!! Form::open(array('url' => 'admin/product/store')) !!}

          

          <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Product Name', __( 'Product Name' ).':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('productname', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Product Name' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Available Language', __( 'Available Language' ) . ':*', [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">
					  {!! Form::select('languageid', (['0' => 'Select a Language'] + $language),[], ['class' => 'form-control']) !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Office', __( 'Office' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					 {!! Form::select('officeid', (['0' => 'Select a Office'] + $office),[], ['class' => 'form-control','' ]  ); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Type', __( 'Type' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::select('typeid', array('1' => 'Ongoing monthly subscription', '2' => 'Stora Fondboken','3' => 'Lists', '4' => 'Services'),null, ['class' => 'form-control','' ]  ); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Category', __( 'Category' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					    {{ Form::radio('result', 'auto' , false) }}  Auto-list  
						{{ Form::radio('result', 'custom' , false) }} Custom-list
						{{ Form::radio('result', 'na' , false) }} N/A

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Currency', __( 'Currency' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					   {!! Form::text('currency', 'SEK', ['class' => 'form-control', '','value' =>'SEK' ,'readonly']); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Price*', __( 'Price*' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('price', null, ['class' => 'form-control price', 'onkeypress'=>'gettotalproduct();', 'placeholder' => __( 'Enter Price' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Subscription?', __( 'Subscription?' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					 {{ Form::radio('subscription', '1' , false) }}  Yes
					{{ Form::radio('subscription', '0' , false) }} No

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Display In?', __( 'Display In?' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					   {{ Form::radio('display', '1' , false) }}  Backend Only
						{{ Form::radio('display', '0' , true) }} Both Frontend & Backend
					
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Payment Mode', __( 'Payment Mode' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::select('paymentmood', (['0' => 'Select a Payment Method'] + $payment),[],['class' => 'form-control','' ]  ); !!}

					</div>
				</div>

          </div>
		
		<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Discount Label', __( 'Discount Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('discountlabel', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Discount Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Discount Amount', __( 'Discount Amount' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('discountamount', null, ['class' => 'form-control disamt', 'onkeypress'=>'gettotalproduct();', 'placeholder' => __( 'Enter Discount Amount' ) ]); !!}

					</div>
				</div>

          </div>
			
			<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('VAT Label', __( 'VAT Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('vatlabel', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter VAT Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('VAT %', __( 'VAT %' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('vatamount', null, ['class' => 'form-control vattax', 'onkeypress'=>'gettotalproduct();', 'placeholder' => __( 'Enter VAT %' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Label', __( 'Freight Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('freightlabel', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Freight Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Charge', __( 'Freight Charge' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('freightamount', null, ['class' => 'form-control framt','onkeypress'=>'gettotalproduct();', 'placeholder' => __( 'Enter Freight Charge' ) ]); !!}

					</div>
				</div>

          </div>
		  
		   <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Tax Label', __( 'Freight Tax Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('freighttaxlabel', null, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Freight Tax Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Tax %', __( 'Freight Tax %' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('freighttax', null, ['class' => 'form-control frtax', 'onkeypress'=>'gettotalproduct();', 'placeholder' => __( 'Enter Freight Tax %' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Total Amount', __( 'Total Amount' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('totalprice', null, ['class' => 'form-control grandtotal', '', 'placeholder' => __( '' ),'readonly' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Description', __( 'Description' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::textarea('description', null, ['class' => 'form-control', '', 'placeholder' => __( 'Write Description...' ) ]); !!}

					</div>
				</div>

          </div>
		  
		 

          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/products'); !!}">Cancel</a>

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

   