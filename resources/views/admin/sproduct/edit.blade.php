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

       {!! Form::open(array('route' => array('admin.product.update', $product->id))) !!}

          

          <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Product Name', __( 'Product Name' ).':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('productname', $product->productname, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Product Name' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Available Language', __( 'Available Language' ) . ':*', [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					 
					  
					  {!! Form::select('languageid', $language,$product->languageid, ['class' => 'form-control']) !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Office', __( 'Office' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					 {!! Form::select('officeid', $office,$product->officeid, ['class' => 'form-control','' ]  ); !!}

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
					    {{ Form::radio('category', 'auto' , false) }}  Auto-list  
						{{ Form::radio('category', 'custom' , false) }} Custom-list
						{{ Form::radio('category', 'na' , false) }} N/A

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

					  {!! Form::text('price', $product->price, ['class' => 'form-control price', '', 'placeholder' => __( 'Enter Price' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Subscription?', __( 'Subscription?' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">
					@if($product->subscription == 1 )
						{{ Form::radio('subscription', '1' ,true) }}  Yes
					 {{ Form::radio('subscription', '0' , false) }} No
					@else
					{{ Form::radio('subscription', '1' , false) }}  Yes
					 {{ Form::radio('subscription', '0' , true) }} No
					@endif
						
					 

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Display In?', __( 'Display In?' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">
					@if($product->display == 1 )
						 {{ Form::radio('display', '1' , true) }}  Backend Only
						 {{ Form::radio('display', '0' , false) }} Both Frontend & Backend
					@else
						{{ Form::radio('display', '1' , false) }}  Backend Only
						{{ Form::radio('display', '0' , true) }} Both Frontend & Backend
					@endif
					
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Payment Mode', __( 'Payment Mode' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::select('paymentmood', $payment,$product->paymentmood,['class' => 'form-control','' ]  ); !!}

					</div>
				</div>

          </div>
		
		<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Discount Label', __( 'Discount Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('discountlabel', $product->discountlabel, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Discount Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Discount Amount', __( 'Discount Amount' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('discountamount', $product->discountamount, ['class' => 'form-control disamt', '', 'placeholder' => __( 'Enter Discount Amount' ) ]); !!}

					</div>
				</div>

          </div>
			
			<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('VAT Label', __( 'VAT Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('vatlabel', $product->vatlabel, ['class' => 'form-control', '', 'placeholder' => __( 'Enter VAT Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('VAT %', __( 'VAT %' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('vatamount', $product->vatamount, ['class' => 'form-control vattax', '', 'placeholder' => __( 'Enter VAT %' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Label', __( 'Freight Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('freightlabel', $product->freightlabel, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Freight Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Charge', __( 'Freight Charge' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('freightamount', $product->freightamount, ['class' => 'form-control framt', '', 'placeholder' => __( 'Enter Freight Charge' ) ]); !!}

					</div>
				</div>

          </div>
		  
		   <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Tax Label', __( 'Freight Tax Label' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('freighttaxlabel', $product->freighttaxlabel, ['class' => 'form-control', '', 'placeholder' => __( 'Enter Freight Tax Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Tax %', __( 'Freight Tax %' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('freighttax', $product->freighttax, ['class' => 'form-control frtax', '', 'placeholder' => __( 'Enter Freight Tax %' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Total Amount', __( 'Total Amount' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('totalprice', $product->totalprice, ['class' => 'form-control grandtotal', '', 'placeholder' => __( '' ),'readonly' ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Description', __( 'Description' ), [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::textarea('description', $product->description, ['class' => 'form-control', '', 'placeholder' => __( 'Write Description...' ) ]); !!}

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

   