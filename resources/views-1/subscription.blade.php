@extends('layouts.mainlayout')
@section('content')
<div class="container">
	<main class="main-content">
		<div class="breadcrumbs">
			<div class="container">
				<a href="/">Home</a>
				<span>Register</span>
			</div>
		</div>

		<div class="row">	
			<div class="col-md-10">
				<h2 class="section-title text-left">Subscription form</h2>

         {!! Form::open(array('url' => 'subscription/store')) !!}
         <div class="form-group row">
            
            <div class="col-lg-4">

              {!! Form::label('subscription', __( 'Select Subscription' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              <span class="subscription" onclick="library()">Library</span>
              <span class="subscription" onclick="monthly_subscription()">One Month Subscription</span>
              <span class="subscription" onclick="yearly_subscription()">One years Subscription</span>

            </div>

        </div>
        
        <div class="form-group row">
            
            <div class="col-lg-4">

              {!! Form::label('name', __( 'Name' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Name' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">
            
            <div class="col-lg-4">

              {!! Form::label('email', __( 'Email' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __( 'Email' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">
            
            <div class="col-lg-4">

              {!! Form::label('password', __( 'Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => __( 'Password' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">
            
            <div class="col-lg-4">

              {!! Form::label('confirm_password', __( 'Confirm Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('confirm_password', null, ['class' => 'form-control', 'placeholder' => __( 'Confirm Password' ) ]); !!}

            </div>

        </div>

        <input type="hidden" id="roles" name="roles">
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('start_date', __( 'Start Date' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => __( 'Start date' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('end_date', __( 'End Date' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => __( 'End Date' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('status', __( 'Status') . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => __( 'Status' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('price', __( 'Price') . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => __( 'price' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('no_of_days', __( 'No of Days' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('no_of_days', null, ['class' => 'form-control', 'placeholder' => __( 'No of Days' ) ]); !!}

            </div>

        </div>
        <div class="col text-right form-group">

            <button type="submit" class="btn btn-primary">Save</button>

        </div>
        {!! Form::close() !!}

			</div>
		</div>
	</main>
</div>
@endsection