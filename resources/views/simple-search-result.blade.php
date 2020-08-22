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
						<div class="fund-details">
						</div>
					</div>
					<div class="container simple-fund-table">

						<div class="fund_email" style="position: relative;">
							<div class="mail-modal">
						        <div class="modal-overlay"></div>
						        <div class="modal-wrapper modal-transition">
						            <div class="modal-header">
						                <button class="modal-close mail-toggle">
						                    <i class="fa fa-times"></i>
						                </button>
						                <h2 class="modal-heading foundation-name"></h2>
						            </div>

						            <div class="modal-body">
						                <div class="modal-content">
						                	{!! Form::open(array('url' => 'fund-search-mail-send')) !!}

						                		{!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __( 'Email' ) ]); !!}
						                		<button type="submit" class="btn btn-primary">Send Email</button>
						                		<div class="mail-body"></div>
						                	{!! Form::close() !!}

						                </div>
						            </div>
						        </div>
						    </div >
						</div>
						{!! Form::open(array('url' => 'simple-search-result', 'method' => 'GET')) !!}
						<table border="1"  class="table table-bordered" style="width:100%" id="f_table">
							<thead>
								<tr>
									<th>{{__('word.'.strtolower('row'))}}</th>
									<th><input type="checkbox" name=""></th>
									@if (!Auth::guest())
									<th></th>
									@endif
									<th>{{__('word.'.strtolower('id'))}}</th>
									<th>{{__('word.'.strtolower('name'))}}</th>
									<th>{{__('word.'.strtolower('sort'))}}</th>
									<th>{{__('word.'.strtolower('view'))}}</th>
								</tr>
							</thead>
							<tbody id="fundsTable">
								@if(count($all_foundations) > 0)
									@php
										$i=0
									@endphp      
									@php
										$cou_C = false;
									@endphp
									@if((Auth::check() && auth()->user()->is('User10')) || !Auth::check())
										@php
											$cou_C = true;
										@endphp
									@endif										
									@foreach($all_foundations as $key => $foundation)
									<tr class="fund-row {{($i==0)?' selected':''}}"  data-id="{{$foundation->id}}">
										<td></td>
										<td><input type="checkbox" name="foundatoin_check" id="checked_foundation" value="{{$foundation->id}}" class="{{($i==0)?'grey':''}}"></td>
										@if (!Auth::guest())
										<td>
										@if(in_array($foundation->id, $save_count) )
											<a href="#" id="saveSearchFoundation" class="heart-pink" data-id="{{$foundation->id}}"><i class="fa fa-heart"></i></a>
											<input type="hidden" name="favourite_fund_ids[]" value="{{$foundation->id}}">
										@else
											<a href="#" id="saveSearchFoundation" data-id="{{$foundation->id}}"><i class="fa fa-heart-o"></i></a>
										@endif
										</td>
										@endif
										<td><a href="foundation-detail/{{$foundation->id}}" class="f_id" id="foundation_id" data-id="{{$foundation->id}}">{{$foundation->id}}</a></td>
										<td class="f-purpose">
											<a href="foundation-detail/{{$foundation->id}}" class="f_id" data-id="{{$foundation->id}}">
												@if($cou_C && $i >= 14)
													{{ '- '.__('word.click here to log in to see the fund\'s name and contact details') }}
												@else
													{{$foundation->name}} 
												@endif</a>
											<p>{{strlen($foundation->purpose) > 200 ? html_entity_decode(substr(strip_tags($foundation->purpose),0,200))."..." : html_entity_decode(strip_tags($foundation->purpose))}}</p>
										</td>
										<td>{{$foundation->sort}}</td>
										<td><a href="foundation-detail/{{$foundation->id}}" class="f_id" data-id="{{$foundation->id}}"><i class="fa fa-search"></i></a>
										</td>
									</tr>
									@php
										$i++;
									@endphp
									@endforeach
									@php
										$fundation_id = $foundation->id;
									@endphp
								@else
									<tr>
										<td colspan="6" class="text-center">No record found</td>
									</tr>
								@endif
								
							</tbody>
						</table>
						<div class="f-extra-info">
							<div class="row">
								<div class="col-md-12">
									<section class="popup-container">
									    <div class="popup-box">
									        <h3>About Subscriptions</h3>
									        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
									        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
									        <p>Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt labore dolore magna aliqua.</p>
									     </div>
									</section>
								</div>
								<div class="col-md-10">
									<div class="bulk-action">
										<ul>
											<li>{{__('word.'.strtolower('bulk actions'))}}: <a href="#" id="search_email">{{__('word.'.strtolower('e-mail selected'))}}</a></li>
											<li>|</li>
											@if (!Auth::guest())
											<li>
												<button type="submit" id="selected-favorite"></button><!-- <a href="#" id="selected-favorite"></a> -->
											</li>
											@endif
											<!-- /newcode/public/ -->
											<li><a href="/search-foundation" class="s-again">{{__('word.'.strtolower('search again'))}}</a></li>
											<!-- <li><a href="#" id="saveSearchFoundation">Save Foundations</a></li> -->
											
										</ul>
									</div>
									@if (Auth::guest())
									<div class="f-total-info text-center">
										@if($fund_count > 0)
										<h3>{{__('word.'.strtolower('the list contains'))}} {{$fund_count}} {{__('word.'.strtolower('more funds. do you want to see more funds'))}}?</h3>
										@endif
									</div>
									<div class="row">
									@if(empty(Session::get('remote_name')))
										<div class="col-md-6 subs-btn text-center">
											<a href="{{ url('en/remote') }}" class="acc-btn" >
											{{__('word.'.strtolower('login with your library card'))}}
											</a>
										</div>
										
										<div class="col-md-6 subs-btn text-center">
											<a href="#" class="acc-btn" >{{__('word.'.strtolower('buy a subscription for only'))}}</a>
										</div>
										@endif
									</div>
									
									@else
										@if($fund_count > 10)
										<!-- <div class="row">
											<div class="col-md-3"></div>
											<div class="col-md-6 text-center">
												<div class="moreFund">
													<button id="btn-more" data-id="{{-- {{$fundation_id}} --}}" class="acc-btn btn-block" > Load More Funds </button>
												</div>
											</div>
											<div class="col-md-3"></div>
										</div> -->
										@endif
										<div class="f-total-info text-center">
											<h3>{{__('word.'.strtolower('the list contains'))}} {{$fund_count}} {{__('word.'.strtolower('more funds. do you want to see more funds'))}}?</h3>
										</div>
										<div class="row">
											<div class="col-md-6 subs-btn text-center">
												<a href="/remote" class="acc-btn" >{{__('word.'.strtolower('login with your library card'))}}</a>
											</div>
											<div class="col-md-6 subs-btn text-center">
												<a href="#" class="acc-btn" >{{__('word.'.strtolower('buy a subscription for only'))}}</a>
											</div>
										</div>
									@endif

								</div>
								{!! Form::close() !!}

								<div class="col-md-2">
									<div class="row">
										<div class="col-md-12">
											<img class="help_subscription" src="frontend/images/help.png" alt="help">
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div> <!-- .page -->
			</main>
			@endsection
