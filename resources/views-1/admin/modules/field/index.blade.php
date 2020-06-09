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
                Module Fields Management <small class="text-muted">Module Fields</small>
            </h4>
          </div>
          <!--col-->
          <div class="col-sm-7">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Create"> <a href="{!! url('/admin/modules/field/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
            </div>
          </div>
          <!--col-->
        </div>
        <!--row-->
        <hr>
        <table class="table table-bordered module-field-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Module Name</th>
              <th>Field Name</th>
              <th>Field Type</th>
              <th>Status</th>
              <th width="100px">Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection