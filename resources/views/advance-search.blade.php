@extends('layouts.mainlayout')
@section('content')
<style> 
	div.scroll { 
		margin:4px, 4px; 
		padding:4px; 
		background-color: #fff; 
		height: 200px; 
		overflow-x: hidden; 
		overflow-x: auto; 
		text-align:justify; 
	} 
	
	.modal-wrapper.modal-transition {
    position: fixed !important;
    top: 5% !important;
    left: 35% !important;
    width: 60% !important;
}

.modal-content .container {
    width: 100%;
}

.modal-body {
    height: 70vh;
}

.modal-content {
    height: 70vh;
}



.modal-header {
    height: 50px;
}



.model__button_top {
    padding: 25px 0;
	text-align: right;
	border-bottom:2px solid;
}
.model__button_bottom {
    padding: 25px 0;
	text-align: right;
	border-top:2px solid;
}

.fund-details {
    overflow: auto;
    height: 100%;
}

.fund-details {
    background: #fff;
	overflow: auto;
    height: 100% !important;
	max-height: 100% !important;
}
.page {
    height: 40vh;
    overflow-y: scroll;
    background: #e2e2e2;
}

.page {
    padding: 50px 0;
}
div#loaderarea {
    text-align: center;
    position: absolute;
    background: #0000004f;
	width:100%;
	height: 100%;
}

.text-primary {
    color: #337ab7;
    font-weight: 600;
}



@keyframes ldio-rbmo6o78s1m-r {
  0%, 100% { animation-timing-function: cubic-bezier(0.2 0 0.8 0.8) }
  50% { animation-timing-function: cubic-bezier(0.2 0.2 0.8 1) }
  0% { transform: rotate(0deg) }
  50% { transform: rotate(180deg) }
  100% { transform: rotate(360deg) }
}
@keyframes ldio-rbmo6o78s1m-s {
  0%, 100% { animation-timing-function: cubic-bezier(0.2 0 0.8 0.8) }
  50% { animation-timing-function: cubic-bezier(0.2 0.2 0.8 1) }
  0% { transform: translate(-34px,-34px) scale(0) }
  50% { transform: translate(-34px,-34px) scale(1) }
  100% { transform: translate(-34px,-34px) scale(0) }
}
.ldio-rbmo6o78s1m > div { transform: translate(0px,-17px) }
.ldio-rbmo6o78s1m > div > div {
  animation: ldio-rbmo6o78s1m-r 1s linear infinite;
  transform-origin: 100px 100px;
}
.ldio-rbmo6o78s1m > div > div > div {
  position: absolute;
  transform: translate(100px, 79.6px);
}
.ldio-rbmo6o78s1m > div > div > div > div {
  width: 68px;
  height: 68px;
  border-radius: 50%;
  background: #87e2f3;
  animation: ldio-rbmo6o78s1m-s 1s linear infinite;
}
.ldio-rbmo6o78s1m > div > div:last-child {
  animation-delay: -0.5s;
}
.ldio-rbmo6o78s1m > div > div:last-child > div > div {
  animation-delay: -0.5s;
  background: #689cc5;
}
.loadingio-spinner-interwind-eojkjrig0rg {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-rbmo6o78s1m {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-rbmo6o78s1m div { box-sizing: content-box; }
/* generated by https://loading.io/ */

.paging_simple_numbers {
    display: none;
}
.dataTables_info{
    display: none;
}
.main-content select,.main-content .q_box{
	height: 300px;
}
.city_checkbox.q_city select{
	height: 400px;
}
</style>
 <main class="main-content">
				<div class="breadcrumbs">
					<div class="container">
						<a href="/">{{__('word.'.strtolower('home'))}}</a>
						<span>{{__('word.'.strtolower('foundation'))}} {{__('word.'.strtolower('search'))}}</span>
					</div>
				</div><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		@php 
			if(!empty($all_data['postdata']))
			{
				$postdata = $all_data['postdata'];
			}
		@endphp
		
		@if(!empty($postdata['tab_name']))
			@php
			$tab1class = "";
			$tab2class = "active";
			@endphp
		@else
			@php
			$tab1class = "active";
			$tab2class = "";
			@endphp
		@endif
			<div class="card">
			  <div class="card-body " border="1" style="background:#4a4c4e1f;">
				<div class="container">
				  <ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#Search">{{__('word.'.strtolower('search'))}}</a></li>
					<li><a data-toggle="tab" href="#seabyfdid">{{__('word.'.strtolower('search by foundation ids'))}}</a></li>
				  </ul>

				  <div class="tab-content">
				  
					<div id="Search" class="col-md-12 tab-pane fade in {{$tab1class}}" style="background: #e9e9e9;">
					@if(Session::get('language') == 'en')
						@php
							$lan_url = Session::get('language').'/';
						@endphp
					@else
						@php
							$lan_url = '';
						@endphp
					@endif
					  {!! Form::open(array('method' => 'get','url' => $lan_url.'advanceSearchdata')) !!}
						<div class="row">
							<div class="col-md-6 col-sm-12 ">
						        <h3 class="title">{{__('word.'.strtolower('purpose'))}}</h3>
						        <div class="checkbox-container q_box"> 
							        @foreach($purpose as $key => $value) 
							         <!-- {!! Form::checkbox('purpose_ids[]', $key, ['class' => 'form-control', 'id' => 'purpose_ids', 'checked' => '' ]); !!} -->
							        <div class="checkboxes">
							        	<input type="checkbox" id="purpose_ids" name="purpose_ids[]" value="{{$key}}" <?php if(!empty($postdata['purpose_ids'])){ if(in_array($key, $postdata['purpose_ids'])){echo "checked";} }?>>
							        	<label>{{$value}}</label>
							    	</div>
							        @endforeach
						    	</div>
						    </div>
							<div class="col-md-6 col-sm-12 ">
						        <h3 class="title">{{__('word.'.strtolower('subject'))}} [{{__('word.'.strtolower('ex: anthropology, education'))}}]</h3>
								
									@if(!empty($postdata['subject_ids']))
										@php
										$subids =$postdata['subject_ids'];
										@endphp
									@else
										@php
										$subids ='';
										@endphp
									@endif
								
						        <div class="city_select">
									<div class="city_checkbox">
									{!! Form::select('subject_ids[]',$subject,$subids, ['class' => 'form-control','multiple','id'=>'subject_ids']) !!}
									</div>
								</div>
						    </div>
							
						</div>
						<div class="row">	
							

							{{-- <hr> --}}
							@if(!empty($postdata['location']))
								@php
								$locationid =$postdata['location'];
								@endphp
							@else
								@php
								$locationid ='';
								@endphp
							@endif
							<div class="col-md-6 col-sm-12 ">
						        <h3 class="title">{{__('word.'.strtolower('location'))}}  [{{__('word.'.strtolower('ex: stockholm, linköping'))}}]</h3>
						        <div class="city_select">
									<div class="city_checkbox q_city">
									{!! Form::select('location[]',$city,$locationid, ['class' => 'form-control','multiple','id'=>'location']) !!}
									</div>
								</div>
						    </div>
						    <div class="col-md-6 col-sm-12 ">
						    	@if(!empty($postdata['keywords']))
								@php
								$keywordt =$postdata['keywords'];
								@endphp
								@else
									@php
									$keywordt ='';
									@endphp
								@endif
								<div class="col-md-12">
							        <h3 class="title">{{__('word.'.strtolower('keyword'))}}  
									[{{__('word.'.strtolower('ex: chalmers, kanada'))}}] [{{__('word.'.strtolower('only * show all foundation id'))}}]</h3>
							        <div class="city_select">
										<div class="city_checkbox">
										{!! Form::text('keywords', $keywordt, ['class' => 'form-control', '','id'=>'keywords' ]); !!}
										</div>
									</div>
							    </div>
						        <h3 class="title">{{__('word.'.strtolower('gender'))}}</h3>
						        <div class="checkbox-container q_box"> 
							        @foreach($gender as $key => $value)	
							        <div class="checkboxes">
							        	<input type="checkbox" id="gender_ids" name="gender_ids[]" value="{{$key}}" <?php if(!empty($postdata['gender_ids'])){ if(in_array($key, $postdata['gender_ids'])){echo "checked";} }?>>
							        	<label>{{$value}}</label>
							    	</div>
							        @endforeach
						    	</div>
						    </div>
						</div>
							<div class="col-md-12">
								<div class="checkbox">
									<label>

									@php
										$only_lang ='';
									@endphp

									@if(!empty($postdata['only_lang']))
										@php
											$only_lang ='checked';
										@endphp
									@endif

									<input type="checkbox" id="only_active" name="only_active" {{$only_lang}} value="1"> 
									
									{{__('word.'.strtolower('hide funds in non-english language'))}}  &nbsp;&nbsp;</label>
								</div>  
							</div>
							<div class="col-md-12">
								<div class="checkbox">
									<label>
									@if(!empty($postdata['only_active']))
										@if($postdata['only_active'] == 1)
											@php
											$oactive ='checked';
											@endphp
										@endif
									@else
										@php
										$oactive ='';
										@endphp
									@endif
									<input type="checkbox" id="only_lang" name="only_lang" {{$oactive}} value="1"> 
									
									{{__('word.'.strtolower('show only active funds'))}}  &nbsp;&nbsp;</label>
								</div>  
							</div>
							
						<input  type="submit" value="{{__('word.'.strtolower('search'))}}">
						<br><br>
					{!! Form::close() !!}

					</div>
					
					<div id="seabyfdid" class="tab-pane fade in {{$tab2class}}">
					
					 {!! Form::open(array('method' => 'get','url' => $lan_url.'advanceSearchdata')) !!}
						<div class="col-md-12">
							<h3 class="title">{{__('word.'.strtolower('search by foundation ids'))}}</h3>
							@if(!empty($postdata['foundids']))
								@php
								$found =$postdata['foundids'];
								@endphp
							@else
								@php
								$found ='';
								@endphp
							@endif
							<div class="city_select">
								<div class="city_checkbox">
									{!! Form::text('foundids',$found, ['class' => 'form-control', 'id'=>'foundids', ]); !!}
								</div>
							</div>
							<input type="hidden" name="tab_name" value="seabyfdid">
						</div>
						<br>
					<div class="col-md-12">
						<br><input type="submit" value="{{__('word.'.strtolower('search'))}}">
						<br><br>
					</div>
					
					</form>
					</div>
					
					
				  </div>
				</div>
				
					
				
			  </div>
			</div>

		</div>
		<div class="col-md-12">
			<div class="" style="margin-top: 00px;">

						<h1>{{__('word.'.strtolower('foundations'))}}</h1>
						
						<div class="foundation-detail" style="position: relative;">
							<div class="modal">
						        <div class="modal-overlay modal-toggle"></div>
						        <div class="modal-wrapper modal-transition">
						            <div class="modal-header">
										<p class="model-title">
										{{__('word.'.strtolower('foundations details'))}}
										</p>
						                <button class="modal-close modal-toggle">
						                    <i class="fa fa-times"></i>
						                </button>
						                <h2 class="modal-heading foundation-name"></h2>
						            </div>

						            <div class="modal-body" style="position: relative;">
									
										 <div class="modal-body">
										<div  class="fund-detail" id="loaderarea" style="display:none">
											<div class="loadingio-spinner-interwind-eojkjrig0rg"><div class="ldio-rbmo6o78s1m">
										<div><div><div><div></div></div></div><div><div><div></div></div></div></div>
										</div></div>
										</div>
									  <div class="modal-content">
						                  <div class="purpose"></div>
						                    <p class="details"></p>
						                    <p class="misc"></p>
						                    <p class="who-can-apply"></p>
						                    <p class="remarks"></p>
						                    <div class="contact"></div>
											<p class="phone"></p>
											<p class="mobile"></p>
											<p class="email"></p>
											<p class="website"></p>
						                    <div class="readMore"></div> 
											<div class="fund-details" style="max-height: 425px;">
											
											
											
											</div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						<div class="table-responsive">							
						<table class="table table-bordered  display" border="1" width="" id="mypaggination">
							<thead>
								<tr>
									
									<th><input type="checkbox" id="selectAllsheck" ></th>
									<th>{{__('word.'.strtolower('id'))}}</th>
									
									{{-- <th>Total Saved</th> --}}{{-- //changes according to jira 215 --}}

									@if( Ican() || (Session::get('checkip') || is_lib_user() ))
									<th>{{__('word.'.strtolower('name'))}}</th>
									@endif
									<!--{{__('word.'.strtolower('sort'))}}</th>
									
									<th>{{__('word.'.strtolower('name'))}}</th>-->
									 <th>Views</th>
									{{-- <th>Saved by Staff</th> --}}{{-- //changes according to jira 215 --}}
									
								</tr>
							</thead>
							<tbody id="advanceFoundations">
							@if(!empty($all_data['data']))
								@php
									$i = 0;
								@endphp
								@foreach($all_data['data'] as $mydata)
								@php
									$h = 0;
									if(!Ican()){	
										if(Session::get('checkip')){
											if($i >= 15){
												$mydata['name'] = __('word.click here to log in to see the fund\'s name and contact details');
												$h = 1;	
											}
										};
									}
								@endphp
								<tr class="td__{{ $mydata['id'] }}">
									<td><input type="checkbox" class='select-checkbox my__select' name="checkbox"  id="userslistIds_{{$i}}" data-id="{{$i}}" onchange="myselectdata({{$i}});"><input type="hidden" value="{{ $mydata['id'] }}" class="sf__id" ></td>	
									<td>
									@if(!Session::get('checkip') || !is_lib_user() )
										<a id="popup__{{$mydata['id']}}" onclick="getFoundationDetailajax('{{$mydata['id']}}',0,{{ $h }})">
											{{$mydata['id']}}
										</a>
									@else
									<a id="popup__{{$mydata['id']}}" >{{$mydata['id']}}</a>
									@endif
									</td>
									{{-- <td>{{$mydata['totalsaved']}}</td> --}}
									
									@if(Ican() || (Session::get('checkip') || is_lib_user() ))
									<td>
										{{-- @if() --}}
										<a onclick="getFoundationDetailajax('{{$mydata['id']}}',0,{{ $h }})" style="text-transform:capitalize;">{{$mydata['name']}}</a>
										<br>
										@if(strlen($mydata['remarks']) > 125)

											{!!substr($mydata['remarks'],0,125)!!}

											@if(!empty($mydata['remarks']))
											...
											@endif
										@else
											{!! $mydata['remarks'] !!}
										@endif											
										{{-- @endif --}}

									</td>
									@endif								
									
									{{-- <td>{{$mydata['savedbyuser']}}</td>
									<td>{{$mydata['savedbystaff']}}</td> --}} {{-- //changes according to jira 215 --}}

									<td>{{ $mydata['views'] }}</td>

								</tr>
								@php
									$i++;
								@endphp
								@endforeach
							@endif
							</tbody>
						</table>
						@if(!empty($all_data['links']))
							<P>Total Rows : {{$all_data['countdata']}}</p>
							{{$all_data['links']}}
						@endif
					</div>
					</div>
		</div>
	</div>
</div>
</div>
@endsection


@section('lara_footer')
<script type="text/javascript">
	

	    function prev_pop(){	    	
	    	prev = $(".popup").closest('tr').prev('tr').find('.sf__id').val();
	    	$("#popup__"+prev).click();
	    	$("#popup__"+prev).click();
	    	
	    }

	    function next_pop(){
	    	next = $(".popup").closest('tr').next('tr').find('.sf__id').val();
	    	$("#popup__"+next).click();
	    	$("#popup__"+next).click();

	    	
	    }


</script>
@endsection