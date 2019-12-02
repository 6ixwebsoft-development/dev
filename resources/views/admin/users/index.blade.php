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
                      Search Users
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">                  
              </div><!--col-->
          </div><!--row-->
          <hr>
          <div class="row">            
              
              <div class="col-sm-4">
                <div class="col-sm-12">
                  <div class="form-group " style="display: flex;">
                    <!-- <label for="exampleInputEmail1">Email address</label> -->
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="row col-row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">All</label>
                      <select multiple class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">User Type</label>
                      <select multiple class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>                        
                      </select>
                    </div>
                  </div>
                </div>  
                
              </div>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-sm-4">
                    asas      
                  </div>
                  <div class="col-sm-4">
                    asas
                  </div>
                  <div class="col-sm-4">
                    asas
                  </div>         
                </div>         
              </div>
              
            
          </div>
        </div>
      </div>
    </div>    
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
              <div class="col-sm-5">
                  <h4 class="card-title mb-0">
                      Users Management <small class="text-muted">Users List</small>
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">
                  <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                    <a href="{!! url('/admin/users/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                  </div>
              </div><!--col-->
          </div><!--row-->
          <hr>
          <table class="table table-bordered user-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Roles</th>
                    <th width="150px">Action</th>
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
      