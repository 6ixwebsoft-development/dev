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
	                    {{$group}} Management <small class="text-muted">Label Update</small>
	               
	                </h4>
	            </div><!--col-->

	           
          </div><!--row-->
          <hr>
        {!! Form::open(array('route' => array('admin.label.update', $label['id']))) !!}
          {{ method_field('PATCH') }}
           @foreach($label as $key =>$value)

           @if($key != 'id')
           <div class="form-group row">
            
              @if($key == 'label')
              <div class="col-lg-2">
              {!! Form::label('keyword', __( 'Keyword' ) . '*') !!}
             
              </div>
              <div class="col-lg-10">
            
                {!! Form::text('label', $value, ['class' => 'form-control', '', 'placeholder' => __( 'Value' ) ]); !!}
              </div>
               @else
                  @php
                     $language_data = explode("_", $key, 2);
                  @endphp
                  <div class="col-lg-2">
                  {!! Form::label($language_data[1], __( $language_data[1] )) !!}
                   </div>
                  <input type="hidden" name="language_id[]" value="{{$language_data[0]}}">
                  <div class="col-lg-10">
                  
                    {!! Form::textarea('locale[]', $value, ['class' => 'form-control', '', 'placeholder' => __( 'Value' ) ]); !!}
                  </div>
                @endif
          </div>
          @endif
          @endforeach
          <input type="hidden" name="id" value="{{$label['id']}}">
          <input type="hidden" name="group_id" value="{{$group_id}}">
          <div class="card-footer clearfix">
            <div class="row">
              <div class="col">
                @php
                  $url = '/admin/'.$group_id.'/label';
                @endphp
                  <a class="btn btn-danger btn-sm" href="{!! url($url); !!}">Cancel</a>
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
   