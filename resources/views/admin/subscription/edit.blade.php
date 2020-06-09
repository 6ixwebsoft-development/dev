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
        <i class="icon-graph"></i>  Dashboard</a>
        <a class="btn" href="#">
        <i class="icon-settings"></i>  Settings</a>
      </div>
    </li>
  </ol>
  <style>
  .dataTables_filter{
	  display:none;
  }
  </style>
@endsection
@section('content')  

  <div class="row">

    

    <div class="col-lg-12">

      <div class="card">

        <div class="card-body">

          <div class="row">

              <div class="col-sm-5">

                  <h4 class="card-title mb-0">
                      Subscription Management <small class="text-muted">Subscription Add</small>
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
			</div><hr>
			@endif
			{!! Form::open(array('route' => array('admin.subscription.update', $subscription->id))) !!}
				@csrf
			 <div class="row">
				
				<div class="col-sm-4">
					<div class="form-group row">
						<div class="col-lg-12">
						  {!! Form::text('search', null, ['class' => 'form-control','id'=>'customer_search','aria-controls'=>'user-table', 'placeholder' => __( 'Search a User' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Customer ID', __( 'Customer ID' ) . ':*') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('cid', $subscription->userid, ['class' => 'form-control','id'=>'cid', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
				
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('name', __( 'Name' ) . ':*') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('name', $subscription->name, ['class' => 'form-control','id'=>'name','placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
				
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Type', __( 'Type' ) . ':*') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('type', $subscription->user_type, ['class' => 'form-control','id'=>'type', 'placeholder' => __( '' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div class="form-group row">
						<div class="col-lg-4">
						  {!! Form::label('Subscription ID', __( 'Subscription ID' ) . ':') !!}
						</div>
						<div class="col-lg-8">
						  {!! Form::text('subscriptionid', $subscription->subscriptionid, ['class' => 'form-control', 'placeholder' => __( 'AUTO GENERATED' ) ]); !!}
						</div>
					</div>
					<div class="form-group row">
					  <div class="col-lg-4">
						{!! Form::label('start_date', __( 'Start Date' ) . ':') !!}
					  </div>
					  <div class="col-lg-8">
						{!! Form::text('start_date', $subscription->start_date, array('placeholder' => 'Start Date', 'class' => 'form-control mycustomdate')) !!}
						</div>
					</div>
					<div class="form-group row">
					  <div class="col-lg-4">
						{!! Form::label('end_date', __( 'End Date' ) . ':') !!}
					  </div>
					  <div class="col-lg-8">
						{!! Form::text('end_date', $subscription->end_date, array('placeholder' => 'End Date','class' => 'form-control mycustomdate')) !!}
					  </div>
					</div>
					<hr>
					<div class="form-group row">
						{!! Form::label('Payment Method', __( 'Payment Method' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 						 
						  {!! Form::select('paymenttype', (['0' => 'Select a payment']+$payment), $subscription->paymenttype, ['class' => 'form-control','' ]  ); !!}
						</div>
					</div>
					<div class="form-group row">
						{!! Form::label('Payment Status', __( 'Payment Status' ) . ':*', [ 'class' => 'col-sm-4 col-form-label']) !!}
						<div class="col-sm-8">								 						 
						  {!! Form::select('paymentstatus', (['0' => 'Select a payment status']+$subscriptionstatus),$subscription->paymentstatus, ['class' => 'form-control','' ]  ); !!}
						</div>
					</div>
				</div>
				
				<div class="col-sm-8" id="usersearch" >
					<div class="form-group row">
						<div class="col-lg-3">
						  {!! Form::label('Payment Reference', __( 'Payment Reference' ) . ':') !!}
						</div>
						<div class="col-lg-6">
						  {!! Form::text('reference_no', null, ['class' => 'form-control', 'placeholder' => __( 'Receipt No., Transaction No.,...' ) ]); !!}
						</div>
					</div>	
					<hr>
					<div style=""><h4>Search a Customer and Choose a Subscription Type</h4></div>
					<div class="row" id="substypedata"></div>
					<div class="row" id="getsubstype">
						@foreach($substypedata as $substypeData)
						<div class="col-md-7">
							<input type="radio" name="subscription_type"  id="{{$substypeData->id}}" value="{{$substypeData->id}}" onClick="putsubscriptiondata()" checked><span class="sunstitle">{{$substypeData->eng_name}}<span><br>
							<span class="sunstitle">{{$substypeData->eng_desc}}<span>
						</div>
						
						<div class="col-md-5">
							<div class="form-group row">
								<div class="col-md-2"><label >Price</label></div>
								<div class="col-md-4">
									<input class="form-control myprice{{$substypeData->id}}" type="text" name="price" id="price_{{$substypeData->id}}" onkeyup="calculatesubstaxs({{$substypeData->id}});" value="{{$substypeData->price}}">
								</div>
								<div class="col-md-2"><label >+Misc</label></div>
								<div class="col-md-4">
									<input class="form-control mymisc{{$substypeData->id}}" type="text" name="misc" id="misc_{{$substypeData->id}}" onkeyup="calculatesubstaxs();"  value="{{$substypeData->misc}}">
								</div>
							</div>
						
								<div class="form-group row">
									<div class="col-md-6"></div>
									<div class="col-md-2"><label >VAT</label></div>
									<div class="col-md-4">
										<input class="form-control myvat{{$substypeData->id}}" type="text" name="vat" id="vat_{{$substypeData->id}}" onkeyup="calculatesubstaxs();"  value="{{$substypeData->vat}}">
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-6"></div>
									<div class="col-md-2"><label >Freight %</label></div>
									<div class="col-md-4">
										<input class="form-control myfrch{{$substypeData->id}}" type="text" name="freight" id="freight_{{$substypeData->id}}" onkeyup="calculatesubstaxs();"  value="{{$substypeData->frieghtcharge}}">
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-4"></div>
									<div class="col-md-4"><label >Freight Tax %</label></div>
									<div class="col-md-4"><input class="form-control myfrtx{{$substypeData->id}}" type="text" name="freighttax" id="freighttax_{{$substypeData->id}}" onkeyup="calculatesubstaxs();" value="{{$substypeData->frieghttax}}"></div>
								</div>
						</div>
					
					@endforeach
					
					</div>
					<div class="form-group row">
						<div class="col-lg-8">
						 <div class="form-group">
							{!! Form::label('Subscription Note', __( 'Subscription Note' ) . ':') !!}
							{!! Form::textarea('subscriptionnote', $subscription->subsnote, ['class' => 'form-control', 'rows'=>'5','placeholder' => __('') ]); !!}
						  </div>
						</div>
						
						
						<div class="col-lg-4">
						<h5>Total</h5>
						  <div class="card">
							
							<div class="card-body">								
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Price + Misc:</div>
								</div>
								<div class="col-sm-4">
								
									<div class="span4 pull-right"  style="font-weight: bold;" id="total_price">{{$subscription->price + $subscription->misc}}</div>
								</div>									
							  </div>
							  
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">VAT:</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="total_vat">{{$subscription->vat}}</div>
								</div>									
							  </div>
							  @php
							  $taxt = $subscription->freight*$subscription->freighttax/100;
							  
							  @endphp
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Freight Cost + Tax:</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="total_freight_tax">{{ $taxt+$subscription->freight}}</div>
								</div>									
							  </div>
							  <hr>
							  <div class="row">
								<div class="col-sm-8">
									<div class="span8">Kr</div>
								</div>
								<div class="col-sm-4">
									<div class="span4"  style="font-weight: bold;" id="totals">{{$subscription->total}}</div>
								</div>									
							  </div>
							  
							</div> 
							
						  </div>
						  
						</div>
					</div>
					
					
				</div>
				
				<div class="col-sm-8" id="userlists" style="display:none;">
					<table class="table table-bordered userlists-table" id="myTableuser" >
						<thead>
							<tr>
								<td></td>
								<td>ID</td>	
								<td>Name</td>
								<td>Email</td>
								<td>Type</td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
				</div>
				
			 
			 </div>
			
          
          <div class="card-footer clearfix">

            <div class="row">

                <div class="col">

                    <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}">Cancel</a>

                </div>

                <div class="col text-right">

                    <button type="submit" class="btn btn-primary">Save</button>

                </div>

            </div>

        </div>

		<input type="hidden" name="newprice" id="newprice" value="{{$subscription->price}}">
		<input type="hidden" name="newmisc" id="newmisc" value="{{$subscription->misc}}">
		<input type="hidden" name="newvat" id="newvat" value="{{$subscription->vat}}">
		<input type="hidden" name="newfr" id="newfr" value="{{$subscription->freight}}">
		<input type="hidden" name="newfrt" id="newfrt" value="{{$subscription->freighttax}}">
		<input type="hidden" name="total" id="newtotal" value="{{$subscription->total}}">
		<input type="hidden" name="subscId" id="subscId" value="{{$subscription->subscriptiontype_id}}">

        {!! Form::close() !!}
            </div>

      </div>

    </div>



  </div>

@endsection