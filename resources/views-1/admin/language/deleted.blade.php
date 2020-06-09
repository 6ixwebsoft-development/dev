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
	                    Language Management <small class="text-muted">Language List</small>
	               
	                </h4>
	            </div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered language-deleted-record">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Language</th>
                    <th>Locale</th>
                    <th>Status</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
           <div class="card-footer clearfix">
              <div class="row">
                <div class="col">
                    <a class="btn btn-danger btn-sm" href="{!! url('/admin/language'); !!}">Back</a>
                </div>
                  
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
   