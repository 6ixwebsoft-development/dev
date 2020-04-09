@extends('layouts.mainlayout')
@section('content')
<main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">{{__('word.'.strtolower('home'))}}</a>
						<span>{{__('word.'.strtolower('foundation'))}} {{__('word.'.strtolower('search'))}}</span>
					</div>
				</div>

				<div class="page">
					<div class="container">

						<!-- <form action="" class="regform" method="get"> -->
						{!! Form::open(array('url' => 'simple-search-result', 'class' => 'regform', 'method' => 'GET')) !!}
						    <div class="row">
						    	<div class="col-md-12 text-center ">
						    		<h3 class="title">{{__('word.'.strtolower('to find out which funds are right for you, we will now ask some questions'))}}  </h3>
						    		<strong>{{__('word.'.strtolower('select municipality you live'))}}</strong>
						    	</div>
						    </div>
						    <div class="row">
						    	<div class="col-md-4">
						    	</div>
							    <div class="col-md-4">
							    	<div class="city_select">
							       
								        <div class="city_checkbox">
											{!! Form::select('city_ids[]',$city,[], ['class' => 'form-control','multiple','id'=>'cityDataFound']) !!}
								    	
								    	</div>
								   
							        </div>
							        <input class="submit_btn" type="submit" value="{{__('word.'.strtolower('search'))}}" style="width: 100%;">
							    </div>
							    <div class="col-md-4">
							    </div>
						    </div>
						        
						    
						{!! Form::close() !!}
					</div>

				</div> <!-- .page -->
			</main>
			@endsection
			
		
   