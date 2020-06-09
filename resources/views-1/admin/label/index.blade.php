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
	                    {{$group}} Translation Management <small class="text-muted">{{$group}} Translation List</small>
	               
	                </h4>
	            </div><!--col-->

	            <div class="col-sm-7">
	                <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
	                  <a href="{!! url('/admin/label/create'); !!}?id={{$id}}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
	                </div>
            	</div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered label-table">
            <thead>
               <input type='hidden' id="group_id" name='id' value='{{$id}}'>
                <tr>
                 
                  <th>No</th>
                  <th>Keyword</th>
                  @php
                    $i = 0;
                  @endphp
                  @foreach($language_table_col as $column_name)
                    <input type="hidden" id="column_{{$i}}" name="column_{{$i}}" value="{{$column_name}}">
                    <th>{{$column_name}}</th>
                     @php
                    $i++;
                  @endphp
                  @endforeach
                  <input type="hidden" id="count" name="count" value="{{$i}}"> 
                  <th>Action</th> 
                
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
@endsection
   