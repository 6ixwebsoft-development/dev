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
<!--
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif -->
@section('content')  

@if (count($errors) > 0)
<ul id="login-validation-errors" class="validation-errors">
    @foreach ($errors->all() as $error)
    <li class="validation-error-item">{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="{{url('admin/user/update/'.$user->id)}}" method="post">
  <div class="row">

    

    <div class="col-lg-12">

      <div class="card">

        <div class="card-body">

            <div class="row">

                <div class="col-sm-6">

                    <h4 class="card-title mb-0">
                      Individual Users Management <small class="text-muted">User Add</small>
                    </h4>

                </div>
                <!--col-->					
					@include('admin.common.section.save_action',['user' => $user]);
				<!--col-->
				
            </div><!--row-->

        <hr>

			<div class="row">
			  <div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Information</a>
				  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Purpose</a>
				  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Foundations</a>
				  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Transaction</a>
				</div>
			  </div>
			  
			  @csrf
			  <div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
				  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				    <div class="row">
				  <div class="col-xl-6 col-md-12 col-sm-12">
				
					<h3>Basic Info</h3>	
						
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Last Name* </label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="lastname" placeholder="" name="user[lastname]" value="{{$info->lname}}" required>
								</div>
							  </div>
							  
							 <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">First Name* </label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" value="{{$info->fname}}" id="name" placeholder="" name="login[name]" required>
								</div>
							  </div>
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Middle Name </label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="middlename" placeholder="" name="user[middlename]" value="{{$info->mname}}">
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Age </label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="age" placeholder="" name="user[age]" value="{{$info->age}}">
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Date Of Birth </label>
								<div class="col-sm-8">
								  <input type="date" class="form-control" id="birthdate" placeholder="" name="user[birthdate]" value="{{$info->dateofbirth}}">
								</div>
							  </div>
							  
							   <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Language </label>
								<div class="col-sm-8">								 
								  <select class="form-control" name="user[language]" id="language" >
									<option value="svenska">Svenska</option>
									<option value="english">English</option>
								  </select>
								</div>
							  </div>
							 
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Availability</label>
								<div class="col-sm-8">
								  <select  class="form-control" name="user[availability]"  >
									<option value="12">avail</option>
								  </select>
								</div>
							  </div>
						  <hr>
						   <input type="hidden" name="login[status]" value="0">
						  <h3>Contact Info</h3>	
							 <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Street Address</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="streetaddress" placeholder="" name="user[streetaddress]" value="{{$info->streetaddress}}">
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Zip Code</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="zipcode" placeholder="" name="user[zipcode]" value="{{$info->zipcode}}">
								</div>
							  </div>
							  
							   <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Country </label>
								<div class="col-sm-8">								 
								  <select class="form-control" name="user[country]" id="country" >
									<option value="one">India</option>
								  </select>
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Personal #</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="personal" placeholder="" name="user[personal]" value="{{$info->personal}}">
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Mobile</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="mobile" placeholder="" name="user[mobile]" value="{{$info->mobile}}">
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Phone</label>
								<div class="col-sm-8">
								  <input type="text" class="form-control" id="phone" placeholder="" name="user[phone]" value="{{$info->phone}}">
								</div>
							  </div>
						
					</div>
				  
				  <div class="col-xl-6 col-md-12 col-sm-12">
				
					<h3>Login Info</h3>	
						<div class="card bg-default text-black">
							<div class="card-body">
							
							<div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Role*</label>
								<div class="col-sm-8">								 
								  <select class="form-control" name="user[roles]" id="role" required>
								  @foreach($userroles as $role)
									<option value="{{$role->name}}">{{$role->name}}</option>
								@endforeach
								  </select>
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">E-mail*</label>
								<div class="col-sm-8">								 
								   <input type="email" class="unique_email form-control" id="email" placeholder="" name="login[email]" required value="{{$user->email}}">
								</div>
								
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Reset Password</label>
								<div class="col-sm-8">								 
								 <button type="button" class="form-control btn btn-secondary float-right"><i class="fa fa-repeat" aria-hidden="true"></i> Reset Password</button>
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="input" class="col-sm-4 col-form-label">Reset Password</label>
								<div class="col-sm-4">								 
								   <input type="text" class="form-control" id="password" placeholder="" name="login[password]">
								</div>
								<div class="col-sm-4 float-right">								 
								  <button type="button" class="btn btn-secondary"><i class="fa fa-repeat" aria-hidden="true"></i> Genrate</button> 
								 </div>
								 
							  </div>
							  
							  <div class="form-group row">
								
								<div class="col-sm-12 ">								 
								    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save & Active</button>
									<br>
									
								</div>
								<p class="col-sm-12 offset-md-4">Save & Activate: Change passwords immediately.<br>Do not send any E-mail</p>
							</div>
							
							<div class="form-group row">
								
								<div class="col-sm-12 ">								 
								    <button type="button" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save Active & Mail </button>
									<br>
									
								</div>
								<p class="col-sm-12 offset-md-4">Save Activate & Mail: Change passwords <br>immediately and send the email to User with <br>new password</p>
							</div>
					</div>
					 
				</div>
				<div class="col-sm-12">
					<div class="form-group row">
						<label for="input" class="col-sm-4 col-form-label">Library(City or University only)</label>
						<div class="col-sm-8">								 
						  <select class="form-control" name="user[librarycity]" id="librarycity" >
							<option value="one">Delhi</option>
						  </select>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="input" class="col-sm-4 col-form-label">Library Card Number</label>
						<div class="col-sm-5">								 
						  <input type="text" class="form-control" id="librarycard" placeholder="" name="user[librarycard]" value="{{$info->librarycard}}">
						</div>
						<div class="col-sm-3">								 
						  <button type="button" class="btn btn-secondary float-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> Verify</button>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="input" class="col-sm-4 col-form-label">Comment</label>
						<div class="col-sm-8">								 
						  <textarea name="user[comment]" class="form-control" id="comment" cols="4">{{$info->comment}}</textarea>
						</div>
					</div>
				
				   </div>
				</div> 
				</div>
			</div>
				  
				  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.
				  <h3>Purpose List</h3>	
					
				  <div class="row">
					<div class="col-sm-12">		
						<div class="form-group row">				 
						  <select class="form-control" name="user[purpose]" id="purpose" >
							<option value="one">Purpose</option>
						  </select>
						</div>
					</div>
				
				  <hr>
				  <div class="col-sm-12">	
					<h3>Study</h3>	
				  </div>
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">Major/field</label>
								<div class="col-sm-8">								 
									<textarea name="user[studymajor]" class="form-control" id="studymajor" cols="4">{{$info->studymajor}}</textarea>
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">Degree</label>
								<div class="col-sm-8">								 
									<textarea name="user[degree]" class="form-control" id="degree" cols="4">{{$info->degree}}</textarea>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">School</label>
								<div class="col-sm-8">								 
									<textarea name="user[school]" class="form-control" id="school" cols="4">{{$info->school}}</textarea>
								</div>
							</div>
						</div>
							
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">Location</label>
								<div class="col-sm-8">								 
									<textarea name="user[location]" class="form-control" id="location" cols="4">{{$info->location}}</textarea>
								</div>
							</div>
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">Start Date</label>
								<div class="col-sm-8">								 
									<input type="date" name="user[startdate]" id="startdate" value="{{$info->startdate}}"></input>
								</div>
							</div>
						</div>
						
						
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">Gov't Support</label>
							  <label style="mergin-right:10x;"><input type="radio" name="user[govtsupport]" value="yes" {{ ($info->govtsupport == 'yes')? "checked" : "" }} > Yes</label>
							  <label><input type="radio" name="user[govtsupport]" value="no"  {{ ($info->govtsupport == 'no')? "checked" : "" }}  > No</label>
							</div>
							
						</div>
						
						<div class="col-sm-6">								 
							<div class="form-group">
								<label for="input" class="col-sm-4 col-form-label">End Date</label>
								<div class="col-sm-8">								 
									<input type="date" name="user[enddate]" id="enddate" value="{{$info->enddate}}"></input>
								</div>
							</div>
						</div>
							
						</div>
					</div>
					
					
					 <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				  <h3>My List</h3>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">First</th>
								  <th scope="col">Last</th>
								  <th scope="col">Handle</th>
								</tr>
							  </thead>
							  <tbody>
								
							  </tbody>
						  
							</table>
						</div>
					</div>				
				  </div>
				  
				  
				  
				  
				  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
				  
				  
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homess" role="tab" aria-controls="pills-home" aria-selected="true">Orders</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Subcriptions</a>
					  </li>
					 
					</ul>
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-homess" role="tabpanel" aria-labelledby="pills-home-tab">
					  
					  
					  <table class="table table-bordered">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">First</th>
							  <th scope="col">Last</th>
							  <th scope="col">Handle</th>
							</tr>
						  </thead>
						  <tbody>
							
						  </tbody>
					</table>
					 </div>

					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  
					   <table class="table table-bordered">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">First</th>
							  <th scope="col">Last</th>
							  <th scope="col">Handle</th>
							</tr>
						  </thead>
						  <tbody>
							
						  </tbody>
					  
						</table>
					  </div>
					  
					</div>
				  
				  
				  
				  </div>
					
					
				  </div>
				  
				  </form>
				  
				  
				  </div>
				  
				 
				</div>
			  </div>
			  </form>
			</div>
        
       </div>

      </div>

    </div>



  </div>





@endsection