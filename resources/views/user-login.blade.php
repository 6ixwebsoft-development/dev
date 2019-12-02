@extends('layouts.mainlayout')
@section('content')
<div class="container">
<main class="main-content">
<div class="breadcrumbs">
<div class="container">
<a href="/">Home</a>
<span>Login</span>
</div>
</div>

<div class="row">	
<div class="col-md-10">
<h2 class="section-title text-left">Login</h2>

{!! Form::open(array('url' => '/login')) !!}

<div class="form-group row">

<div class="col-lg-4">

{!! Form::label('email', __( 'Email' ) . ':*', [ 'class' => 'col-form-label']) !!}

</div>

<div class="col-lg-8">

{!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Email' ) ]); !!}

</div>

</div>
<div class="form-group row">

<div class="col-lg-4">

{!! Form::label('password', __( 'Password' ) . ':*', [ 'class' => 'col-form-label']) !!}

</div>

<div class="col-lg-8">

{!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'password' ) ]); !!}

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