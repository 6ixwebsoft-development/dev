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

                      Subscription Type Management <small class="text-muted">Subscription Type Add</small>


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
		  

          {!! Form::open(array('route' => array('admin.subscriptiontype.update', $subsc->id))) !!}

		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Type', __( 'Type' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					 {!! Form::select('usertype', (['IND' => 'IND','LIB' => 'LIB','ORG' => 'ORG',]),$subsc->usertype, ['class' => 'form-control','' ]  ); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Duration in Months', __( 'Duration in Months' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::select('duration', array('1' =>'1','2'=>'2','3' =>'3','4'=>'4','6' =>'6','5'=>'5','7' =>'7','8'=>'8','9'=>'9','10' =>'10','11' =>'11','12'=>'12','13' =>'13','14'=>'14','15'=>'15','16' =>'16','17' =>'17','18'=>'18','19'=>'19','20' =>'20','21' =>'21','22'=>'22','23' => '23','24' => '24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31','32'=>'32','33'=>'33','34'=>'34','35'=>'35','36'=>'36'),$subsc->duration, ['class' => 'form-control','' ]  ); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Price*', __( 'Price*' ). ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('price', $subsc->price, ['class' => 'form-control myprice', 'onkeypress'=>'getsubscriptiontotal();', 'placeholder' => __( '' ) ]); !!}

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

					  {!! Form::label('Display In?', __( 'Display In?' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">
					  {!! Form::radio('display', '1', ($subsc->display ==  '1'), array('id'=>'activeip')) !!} Backend Only
									  
					 {!! Form::radio('display', '0', ($subsc->display ==  '0'), array('id'=>'activeip')) !!} Both Frontend & Backend

					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Misc', __( 'Misc*' ). ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('misc', $subsc->misc, ['class' => 'form-control mymisc', 'onkeypress'=>'getsubscriptiontotal();', 'placeholder' => __( '' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  
		
		<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('vat %', __( 'vat %' ). ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('vat', $subsc->vat, ['class' => 'form-control myvat','onkeypress'=>'getsubscriptiontotal();', 'placeholder' => __( 'Enter Discount Label' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Charge', __( 'Freight Charge' ). ':*', [ 'class' => 'col-form-label']) !!}
					  

					</div>

					<div class="col-lg-12">

					 
					  {!! Form::text('freightcharge', $subsc->frieghtcharge, ['class' => 'form-control myfrch', 'onkeypress'=>'getsubscriptiontotal();', 'placeholder' => __( '' ) ]); !!}

					</div>
				</div>

          </div>
			
			<div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Freight Tax %', __( 'Freight Tax %' ). ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('freighttax', $subsc->frieghttax, ['class' => 'form-control myfrtx','onkeypress'=>'getsubscriptiontotal();', 'placeholder' => __( 'Enter VAT Label' ) ]); !!}

					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Total Amount', __( 'Total Amount' ), [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('totalprice', $subsc->totalprice, ['class' => 'form-control grandtotal', '', 'placeholder' => __( '' ),'readonly' ]); !!}

					</div>
				</div>
				
				<hr>	
          </div>
		  
		  <ul class="nav nav-tabs card-header bg-default" id="myTab" role="tablist">
									  <li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Svenska</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">English</a>
									  </li>
								 </ul>
								<div class="col-md-12 ">
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="form-group row">
										<div class="col-lg-6">
											<div class="col-lg-4">
											  {!! Form::label('Name', __( 'Name' ). ':*', [ 'class' => 'col-form-label']) !!}
											</div>
											<div class="col-lg-12">
											  {!! Form::text('sv_name', $subsc->sven_name, ['class' => 'form-control','id'=>'','placeholder' => __( '' ) ]); !!}
											</div>
										</div>
										<div class="col-lg-6">
											<div class="col-lg-4">
											  {!! Form::label('Description', __( 'Description' ). ':', [ 'class' => 'col-form-label']) !!}
											</div>
											<div class="col-lg-12">
											 {!! Form::textarea('sv_desc', $subsc->sven_desc, ['class' => 'form-control','rows'=>'3','placeholder' => __( '' ) ]); !!}
											</div>
										</div>
									  </div>
								  </div>
								  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="form-group row">
										<div class="col-lg-6">
											<div class="col-lg-4">
											  {!! Form::label('Name', __( 'Name' ). ':*', [ 'class' => 'col-form-label']) !!}
											</div>
											<div class="col-lg-12">
											  {!! Form::text('eng_name', $subsc->eng_name, ['class' => 'form-control','id'=>'','placeholder' => __( '' ) ]); !!}
											</div>
										</div>
										<div class="col-lg-6">
											<div class="col-lg-4">
											  {!! Form::label('Description', __( 'Description' ). ':', [ 'class' => 'col-form-label']) !!}
											</div>
											<div class="col-lg-12">
											 {!! Form::textarea('eng_desc',$subsc->eng_desc, ['class' => 'form-control','rows'=>'3','placeholder' => __( '' ) ]); !!}
											</div>
										</div>
									  </div>
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

   