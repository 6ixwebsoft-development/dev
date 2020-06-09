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
				<h2 class="section-title text-left">Registration form</h2>

         {!! Form::open(array('url' => 'user-register/store')) !!}
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('name', __( 'Name' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('name', null, ['class' => 'form-control', '', 'placeholder' => __( 'Name' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('email', __( 'Email' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::text('email', null, ['class' => 'form-control', '', 'placeholder' => __( 'Email' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('password', __( 'Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::password('password', ['class' => 'form-control', '', 'placeholder' => __( 'Password' ) ]); !!}

            </div>

        </div>
        <div class="form-group row">

            <div class="col-lg-4">

              {!! Form::label('confirm-password', __( 'Confirm Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

            </div>

            <div class="col-lg-8">

              {!! Form::password('confirm-password', ['class' => 'form-control', '', 'placeholder' => __( 'Confirm Password' ) ]); !!}

            </div>

        </div>
        <input type="hidden" name="roles" value="user10">
        <div class="col text-right form-group">

            <button type="submit" class="btn btn-primary">Save</button>

        </div>
        {!! Form::close() !!}

			</div>
		</div>
	</main>
</div>
@endsection