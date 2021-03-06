 @extends('layouts.mainlayout')
@section('content')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>
</head>
<body>
<br><br><br>
<div class="container">
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'found')" id="defaultOpen"> YOUR SAVED FUND RECORDS</button>
	  <button class="tablinks" onclick="openCity(event, 'London')" id="">YOUR NAME</button>
	  <button class="tablinks" onclick="openCity(event, 'Paris')">YOUR CONTACT DETAILS</button>
	  <button class="tablinks" onclick="openCity(event, 'Tokyo')">YOUR LOGIN DETAILS</button>
	  <button class="tablinks" onclick="openCity(event, 'library')">- REGISTER YOUR LIBRARY CARD</button>
	</div>
		@php
		$data =	getfrontuserdata(Auth::user()->id ,Auth::user()->user_type);
		//print_r($data);
		@endphp
		
	<div id="found" class="tabcontent">
	  <h3 class="text-primary">YOUR SAVED FUND RECORDS</h3><hr>
		<p class="text-primary">If you don't see the names of the funds you saved,<br>
			register your library card number<br>
			under tab REGISTER YOUR LIBRARY CARD</p>
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th></th>
					<th>#ID</th>
					<th>Contact Person</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				  
				  <tr>
					<td></td>
					<td>July</td>
					<td>Dooley</td>
					<td>july@example.com</td>
				  </tr>
				</tbody>
			  </table>
	 
	</div>
	<div id="London" class="tabcontent">
	  <h3 class="text-primary">YOUR NAME</h3><br>
	  <p><b>Name</b> :  {{ Auth::user()->name }}</p>
	  <p><b>Status</b> : @if( Auth::user()->status == 1) Active @else Inactive @endif</p>
	  <p><b>Email</b> : {{Auth::user()->email}}</p>
	  <p><b>User Type</b> :  @if( Auth::user()->user_type == 'IND') Individual @elseif(Auth::user()->user_type == 'ORG') Orgnization @elseif(Auth::user()->user_type == 'LIB') Library @else User @endif</p>
	 
	 
	</div>

	<div id="Paris" class="tabcontent">
	  <h3 class="text-primary">YOUR CONTACT DETAILS</h3>
<br>	  @if(!empty($data->streetadress))
		  
		<p><b>Street Address</b> :  {{ $data->streetadress }}</p>
		<p><b>Zipcode</b> :  {{ $data->zipcode }}</p>
		<p><b>Mobile</b> :  {{ $data->mobile }}</p>
		<p><b>Phone</b> :  {{ $data->phone }}</p>
	 
	@endif
	  
	</div>

	<div id="Tokyo" class="tabcontent">
		
		<h3 class="text-primary">Your Login Details</h3><br>
	  <p><b>Email</b>  : {{ Auth::user()->email }}</p>
	   <p><b>Password</b>  : *****************</p>
	</div>
	
	<div id="library" class="tabcontent">
		
		<h3 class="text-primary">REGISTER YOUR LIBRARY CARD</h3><br>
	  <p class="text-primary">You can log on remote to our server if your university or library is subscribed to the Global Grant Services.<br> If your school or city is not in the list, you can search for the school / library on the Internet. Some libraries have their own pages for remote access login. For example Google "globalgrant göteborg".</p>
	  
	  
	</div>
</div>

<br><br>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

@endsection

