@extends('layouts.mainlayout')
@section('content')
<main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">Home</a>
						<span>Foundation Search</span>
					</div>
				</div>

				<div class="page">
					<div class="container">

						<!-- <form action="" class="regform" method="get"> -->
						{!! Form::open(array('url' => 'simple-search-result', 'class' => 'regform', 'method' => 'GET')) !!}
						    <div class="row">
						    	<div class="col-md-12 text-center ">
						    		<h3 class="title">To find out which funds are right for you, we will now ask some questions </h3>
						    		<strong>Select Municipality you live</strong>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-md-4">
						    	</div>
							    <div class="col-md-4">
							    	<div class="city_select">
							        @php
							        	$i=0;
							        @endphp
							        @foreach($city as $key => $value)
								        <div class="city_checkbox">
								        	{!! Form::checkbox('city_ids[]', $key, ($i==0) ? true : false) !!}
									    	{!! Form::label('name', $value) !!}
								    	@php
								        	$i++;
								        @endphp
								    	</div>
								    @endforeach
							        </div>
							        <input class="submit_btn" type="submit" value="Search" style="width: 100%;">
							    </div>
							    <div class="col-md-4">
							    </div>
						    </div>
						        
						    
						{!! Form::close() !!}

					</div>

				</div> <!-- .page -->
			</main>
			@endsection
