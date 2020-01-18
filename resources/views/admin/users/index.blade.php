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
		  
		  <form action="" method="post" name="searchuserdatas" id="searchuserdatas" >
		  @csrf
          <div class="row">            
              
              <div class="col-sm-6">
                <div class="col-sm-12">
                  <div class="form-group " style="display: flex;">
				  
                    <!-- <label for="exampleInputEmail1">Email address</label> -->
                    <input type="text" name="search" id="search" class="form-control searchtest" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search by name">
                    <button type="button" onClick="searchuserdata();" class="btn btn-primary">Search</button>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                </div>
                <div class="row col-row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="usertytype">All</label>
                      <select multiple class="form-control" id="usertytype" name="usertytype[]">
                        <option value="DON">DONORS</option>
						<option value="IND" selected>INDIVIDUAL</option>
						<option value="ORG" selected>ORGANIZATION</option>
						<option value="LIB" selected>LIBRARY</option>
						<option value="LIBGROUP">LIBRARY GROUP</option>
                      </select>
                    </div>
					
					<div class="input-group">
							<input id="createdFrom" type="text" class="form-control mycustomdate" name="createdFrom" placeholder="Date Created From"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
						
						<div class="input-group">
							<input id="modifiesFrom" type="text" class="form-control mycustomdate" name="modifiesFrom" placeholder="Date Modified From"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					
					<div style="margin-top:10px;" class="row">
						<!-- <div class="col-sm-6">
						  <div class="form-group">
						  <select  class="form-control" id="exampleFormControlSelect1">
							<option>1</option>
						  </select>
						  </div>
						</div> -->
						<div class="col-sm-12">
							  <div class="form-group"> 
								{!! Form::select('languageid', (['0' => 'Select a Language'] + $language),[], ['class' => 'form-control','id'=>'languageid']) !!}
							</div>
						</div>
					
					</div>
					
					
                  </div>
				 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">User Type</label>
                      <select multiple class="form-control" id="userRole" name="userRole[]">
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach	
                      </select>
                    </div>
					
					<div class="input-group">
							<input id="createdTo" type="text" class="form-control mycustomdate" name="createdTo" placeholder="Date Created To"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>						
						</div><br>
						<div class="input-group">
							<input id="modifiesTo" type="text" class="form-control mycustomdate" name="modifiesTo" placeholder="Date Modified To"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
						
						<div style="margin-top:10px;">
							<p>LEGEND:  <span class="badge badge-primary">INDIVIDUAL</span>  <span class="badge badge-warning">ORGANIZATION</span>  <span class="badge badge-danger">LIBRARY</span>  <span class="badge badge-success">DONORS</span></p>
						</div>
					
                  </div>
                </div>  
                
              </div>
			  
			
			 
			  
			  
			  
              <div class="col-sm-6">
					<div class="row">
					  <div class="col-sm-4">
					  
							<div class="checkbox">
							  <label><input type="checkbox" value="email" id="byemail"> Search only Email</label>
							</div>                                    
							<div class="checkbox">                    
							  <label><input type="checkbox" value="byDocumnet"> Have Photo/Documents</label>
							</div>                                    
							<div class="checkbox">                    
							  <label><input type="checkbox" value=""> Have Purchased List</label>
							</div>                                    
							<div class="checkbox">                    
							  <label><input type="checkbox" value=""> Filtered Date Created</label>
							</div>                                    
							<div class="checkbox">                    
							  <label><input type="checkbox" value=""> Filtered Date Last Edited</label>
							</div> 	
							
							<div class="radio">
							  <label><input type="radio" name="optuser" id="optuser" value="" checked>All</label>
							
							  <label><input type="radio" name="optuser" id="optuser" value="1">Active</label>
							
							  <label><input type="radio" name="optuser" id="optuser" value="0">inactive</label>
							</div>
							
					  </div>

					  <div class="col-sm-4">
							<p class="text-secondary">Total Users : {{$totaluser}}</p>
							<p class="text-primary">Total Active : {{$activeuser}}</p>
							<p class="text-danger">Total inactivated : {{$inactiveuser}}</p>
							<p class="text-success">Total hits : 1117</p>
							
					  </div>
					  <div class="col-sm-4">
						<a href="{!! url('/admin/individual/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Individual</a>
						<a href="{!! url('/admin/organization/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Orgnization</a>
						<a href="{!! url('/admin/library/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Library</a>
						<a href="{!! url('/admin/librarygroup/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Library Group</a>
						<a href="{!! url('/admin/foundation/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Foundation</a>
						<a href="{!! url('/admin/subscription/create'); !!}" type="button" class="btn btn-success col-sm-12">Add New Subcription</a>
						<a href="#" type="button" class="btn btn-info col-sm-12">One Month Subscriber List</a>
					  </div>         
					</div>         
              </div>
              
               </form>
          </div>
		  <div class="col-sm-9 offset-md-3">
		  <div class="row">
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-2"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-3"> 
				<p>Free - Registered Free user</p>
			</div>
			<div class="col-sm-3"> 
				<p>Free - Registered Free user</p>
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
          <table class="table table-bordered user-table" id="user-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Roles</th>
                    <th width="200px">Action</th>
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

  