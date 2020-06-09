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
			@php
			$cond = "";
			@endphp
			
			@if($filter)
				@if($filter == 'role')
					@php $cond = 'filter='.$filter.'&role='.$role;  @endphp
				@else
					@php $cond = 'filter='.$filter;  @endphp
				@endif
				
			@else
				@php $cond = ""; @endphp
			@endif
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				Username starts with:
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=a'); !!}">A</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=b'); !!}">B</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=c'); !!}">C</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=d'); !!}">D</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=e'); !!}">E</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=f'); !!}">F</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=g'); !!}">G</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=h'); !!}">H</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=i'); !!}">I</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=j'); !!}">J</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=k'); !!}">K</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=l'); !!}">L</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=m'); !!}">M</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=n'); !!}">N</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=o'); !!}">O</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=p'); !!}">P</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=q'); !!}">Q</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=r'); !!}">R</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=s'); !!}">S</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=t'); !!}">T</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=u'); !!}">U</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=v'); !!}">V</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=w'); !!}">W</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=x'); !!}">X</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=y'); !!}">Y</a>
				<a href="{!! url('/admin/listalluser?'.$cond.'&firstletter=z'); !!}">Z</a>
				
			</div>
		</div>
	</div>

   
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
              <div class="col-sm-5">
                  <h4 class="card-title mb-0">
                      Users Management <small class="text-muted">Users All List</small>
                  </h4>
              </div><!--col-->

              <div class="col-sm-7">
                  <div class="btn-toolbar float-right" role="toolbar" aria-label="Create">
                    <a href="{!! url('/admin/users/create'); !!}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create"><i class="fas fa-plus-circle"></i></a>
                  </div>
              </div><!--col-->
          </div><!--row-->
          <hr>
			<li class="nav-item btn btn-info">
				<a class="nav-link text-white" href="{!! url('/admin/listalluser'); !!}">All Users</a>
			</li>
			<li class="nav-item btn btn-info">
				<a class="nav-link text-white" href="{!! url('/admin/listalluser').'?filter=inactive'; !!}">Inactive</a>
			</li>
			<li class="nav-item btn btn-info">
				<a class="nav-link text-white" href="{!! url('/admin/listalluser').'?filter=banned'; !!}">Banned</a>
			</li>
			<li class="nav-item btn btn-info">
				<a class="nav-link text-white" href="{!! url('/admin/listalluser').'?filter=deleted'; !!}">Deleted</a>
			</li>
			
			 <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">By Role</button>
			 
			<div class="dropdown-menu">
			@foreach($roles as $role)
			  <a class="dropdown-item" href="{!! url('/admin/listalluser').'?filter=role&role='.$role->id!!}">{{$role->name}}</a>
			@endforeach
			</div>
			
		  <hr>
          <table class="table table-bordered userlist-table" id="userlist-table">
            <thead>
                <tr>
					<th><input type="checkbox" id="selectAll"></th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>       
                    <th>Roles</th>
					<th>Last Login</th>
					<th>Status</th>
					
                  <!--  <th width="150px">Action</th> -->
                </tr>
				
				
            </thead>
            <tbody>
            </tbody>
			  
          </table>
		   <button class="btn btn-success" onClick="getalllistcheckboxval(1);">Activate</button>
		   <button class="btn btn-danger" onClick="getalllistcheckboxval(0);">Inactive</button>
		  <button class="btn btn-warning" onClick="getalllistcheckboxval(2);">Ban</button>
		  <button class="btn btn-danger" onClick="deletealllistcheckboxval(3);">Delete</button>
		  
        </div>
      </div>
    </div>

  </div>
@endsection

  