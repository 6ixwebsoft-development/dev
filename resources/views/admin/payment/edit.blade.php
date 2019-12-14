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

                      Payment Management <small class="text-muted">Payment Add</small>


                  </h4>

              </div><!--col-->
          </div><!--row-->

          <hr>
		  
	{!! Form::open(array('route' => array('admin.paymentmood.update', $Payment->id))) !!}

          <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Payment Method', __( 'Payment Method' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('paymentmethod', $Payment->paymentmethod, ['class' => 'form-control', '', 'placeholder' => __( 'Payment Method' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Days NET', __( 'Days NET' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('daysnet', $Payment->daysnet, ['class' => 'form-control', '', 'placeholder' => __( 'Days NET' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Test Account', __( 'Test Account' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('testaccount', $Payment->testaccount, ['class' => 'form-control', '', 'placeholder' => __( 'Test Account' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Live Account', __( 'Live Account' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('liveaccount', $Payment->liveaccount, ['class' => 'form-control', '', 'placeholder' => __( 'Live Account' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Test Username', __( 'Test Username' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('testusername', $Payment->testusername, ['class' => 'form-control', '', 'placeholder' => __( 'Test Username' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Live Username', __( 'Live Username' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('liveusername', $Payment->liveusername, ['class' => 'form-control', '', 'placeholder' => __( 'Live Username' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Test Password', __( 'Test Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('testpassword', $Payment->testpassword, ['class' => 'form-control', '', 'placeholder' => __( 'Test Password' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Live Password', __( 'Live Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('livepassword', $Payment->livepassword, ['class' => 'form-control', '', 'placeholder' => __( 'Live Password' ) ]); !!}

					</div>
				</div>

          </div>
		  
		  <div class="form-group row">

				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Test Signature', __( 'Test Signature' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('testsignature', $Payment->testsignature, ['class' => 'form-control', '', 'placeholder' => __( 'Test Signature' ) ]); !!}

					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-4">

					  {!! Form::label('Live Signature', __( 'Live Signature' ) . ':*', [ 'class' => 'col-form-label']) !!}

					</div>

					<div class="col-lg-12">

					  {!! Form::text('livesignature', $Payment->livesignature, ['class' => 'form-control', '', 'placeholder' => __( 'Live Signature' ) ]); !!}

					</div>
				</div>

          </div>

        
		<div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('Test Mood', __( 'Test Mood' ),  [ 'class' => 'col-form-label'] ) !!}

            </div>

            <div class="col-lg-10">

              <label class="col-form-label">
				  @if($Payment->testmood == 1)
                    {!! Form::checkbox('testmood', '1', true); !!}
				@else
                    {!! Form::checkbox('testmood', false) !!}
				@endif

              </label>

            </div>

          </div>




          <div class="form-group row">

            <div class="col-lg-2">

              {!! Form::label('status', __( 'Status' ),  [ 'class' => 'col-form-label'] ) !!}

            </div>

            <div class="col-lg-10">

              <label class="col-form-label">
				@if($Payment->status == 1)
                    {!! Form::checkbox('status', '1', true); !!}
				@else
                    {!! Form::checkbox('status', false) !!}
				@endif

              </label>

            </div>

          </div>



          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/paymentmood'); !!}">Cancel</a>

                </div>

                <div class="col text-right">

                    <button type="submit"  class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>



        {!! Form::close() !!}

        </div>

      </div>

    </div>



  </div>

@endsection

   