@extends('admin.includes.adminlayout') @section('breadcrumb')
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"> <a href="#">Admin</a>
  </li>
  <li class="breadcrumb-item active">Dashboard</li>
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
      <a class="btn" href="#"> <i class="icon-speech"></i>
      </a>
      <a class="btn" href="./"> <i class="icon-graph"></i>  Dashboard</a>
      <a class="btn" href="#"> <i class="icon-settings"></i>  Settings</a>
    </div>
  </li>
</ol>

@endsection @section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-5">
            <h4 class="card-title mb-0">
                Individual Management <small class="text-muted">Individual</small>
            </h4>
          </div>
          <!--col-->
          <div class="col-sm-7">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Create"> <a href="{!! url('/admin/individual/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            </div>
          </div>
          <!--col-->
        </div>
        <!--row-->
        <hr>
        <table class="table table-bordered individual-table">
          <thead>
             <tr>
					<th><input type="checkbox" id="selectAll"></th>
                    <th>No</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Roles</th>
                    <th width="150px">Action</th>
                </tr>
          </thead>
          <tbody></tbody>
        </table>
		<button class="btn btn-success" onClick="getalllistcheckboxval(1);">Activate</button>
		   <button class="btn btn-warning" onClick="getalllistcheckboxval(0);">Inactive</button>
		<!--  <button class="btn btn-warning" onClick="getalllistcheckboxval(2);">Ban</button> -->
		  <button class="btn btn-danger" onClick="deletealllistcheckboxval(3);">Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection