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
	                    Hitlist Management <small class="text-muted">Hitlist List</small>
	                </h4>
	            </div><!--col-->

	            <div class="col-sm-7">
	                <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
	                  <a href="{!! url('/admin/hitlist/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
	                </div>
            	</div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered hitlist-table">
            <thead>
                <tr>
					<th><input type="checkbox" id="selectAll"></th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Keyword</th>
                    <th>Description</th>
					<th>Status</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
		   <div class="row container">
			  <div id="pending">
				<button class="btn btn-danger" onClick="gethitlistStatus(3,'sts');">Delete</button>
			  </div>
		</div>
        </div>
      </div>
    </div>

  </div>
@endsection
   