// data table for language
$(function () {
    
    var table = $('.language-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/language",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'language', name: 'language'},
            {data: 'locale', name: 'locale'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

//Pages
$(function () {
    
    var table = $('.pages-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/pages",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

$(function () {
    
    var table = $('.language-deleted-record').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/language/deleted",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'language', name: 'language'},
            {data: 'locale', name: 'locale'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});
// data table for label Translation
$(function () {
    var count = $("#count").val();
    var i;
    var column = [];
    var index =  {data: 'DT_RowIndex', name: 'DT_RowIndex'}
    column.push(index);
    var keyword = {data: 'keyword', name: 'keyword'}
    column.push(keyword);

    for(i= 0; i < count; i++) {
        var column_data = {data: $("#column_"+i).val(), name: $("#column_"+i).val()}
        column.push(column_data);
    }
    
    var action = {data: 'action', name: 'action', orderable: false, searchable: false}
    column.push(action);

   var count = $("#count").val();
   var i;
   var column = [];
   var index =  {data: 'DT_RowIndex', name: 'DT_RowIndex'}
   column.push(index);
   var keyword = {data: 'keyword', name: 'keyword'}
    column.push(keyword);
   for(i= 0; i < count; i++) {
     var column_data = {data: $("#column_"+i).val(), name: $("#column_"+i).val()}
     column.push(column_data);
   }
   var action = {data: 'action', name: 'action', orderable: false, searchable: false}
   column.push(action);
    var table = $('.label-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/"+ $("#group_id").val() +"/label",
        columns: column
    });
    
});

 // data table for group Translation
$(function () {
    
    var table = $('.translation-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/translation",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'group', name: 'group', render:function(data, type, row){
                return "<a href='/admin/"+ row.id +"/label/'>" + row.group + "</a>"
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

// data table for group Translation
$(function () {
    
    var table = $('.permission-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/permission",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/*modules module table name display*/
$(function () {
    
    var moduleTable = $('.modules-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/modules/module",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/*foundation table*/
$(function () {
    
    var moduleTable = $('.foundation-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/foundation",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'sort', name: 'sort'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/*modules fields table */
$(function () {
    
    var moduleField = $('.module-field-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/modules/field",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'module_name', name: 'module_name'},
            {data: 'field_name', name: 'field_name'},
            {data: 'field_type', name: 'field_type'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/*modules fieldvalue table */
$(function () {
    
    var moduleFieldValue = $('.module-fieldvalue-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/modules/fieldvalue",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'field_name', name: 'field_name'},
            {data: 'language', name: 'language'},
            {data: 'value', name: 'value'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/*Country Block table */
$(function () {
    
    var moduleFieldValue = $('.country-block-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/countryblock",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* Location Country table */
$(function () {
    
    var moduleFieldValue = $('.location-country-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/country",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'country_code', name: 'country_code'},
            {data: 'country_name', name: 'country_name'},
            {data: 'calling_code', name: 'calling_code'},
            {data: 'block_name', name: 'block_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* Location region table */
$(function () {
    
    var moduleFieldValue = $('.location-region-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/region",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'country_name', name: 'country_name'},
            {data: 'region_name', name: 'region_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* Location city table */
$(function () {
    
    var moduleFieldValue = $('.location-city-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/city",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'country_name', name: 'country_name'},
            {data: 'region_name', name: 'region_name'},
            {data: 'city_name', name: 'city_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

});

/* User table */
 $(function () {
    
    var table = $('.user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/users",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'tstatus', name: 'status'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
}); 

/* User Search table */
function searchuserdata() {
	var emailcheck = '';
    var searchtext = $('#search').val();
	var userRole = $('#userRole').val();
	var statususer = $("input[name='optuser']:checked").val();
	
	var createdFrom = $('#createdFrom').val();
	var createdTo = $('#createdTo').val();
	var modifiesFrom = $('#modifiesFrom').val();
	var modifiesTo = $('#modifiesTo').val();
	
	if ($('#byemail').is(":checked"))
	{
	  emailcheck = $('#byemail').val();
	}
	
/* 		var table = $('.user-table').DataTable({
        processing: true,
        serverSide: true,
		data:{filter:search,value:searchtext},
        ajax: APP_URL+"/admin/searchvikashuser",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'tstatus', name: 'status'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    }); */
	
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'POST',
           url: APP_URL+"/admin/searchvikashuser",
           data:{searchtext:searchtext,userRole:userRole,statususer:statususer,createdFrom:createdFrom,createdTo:createdTo,modifiesFrom:modifiesFrom,modifiesTo:modifiesTo,emailcheck:emailcheck},
           success:function(data){
			//alert(data);
			$('.user-table').dataTable().fnDestroy()

				data.draw = 1;
				console.log(data);	
				
				$('.user-table').DataTable({
				data: data.data,
			columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'tstatus', name: 'status'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
					]
				} );
           }

			});
    
};



/*roles */
$(function () {
    
    var table = $('.role-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/roles",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    

});
/*subscription */
$(function () {
    
    var table = $('.subscription-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subscription",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'start_date', name: 'start date'},
            {data: 'end_date', name: 'end date'},
            {data: 'status', name: 'status'},
            {data: 'price', name: 'price'},
            {data: 'no_of_days', name: 'no of days'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* data table for Paymentmood */
$(function () {
    
    var table = $('.payment-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/paymentmood",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'paymentmethod', name: 'paymentmethod'},
            {data: 'testaccount', name: 'testaccount'},
			 {data: 'liveaccount', name: 'liveaccount'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* data table for Office */
$(function () {
    
    var table = $('.office-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/Office",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'office', name: 'office'},
            {data: 'address1', name: 'address1'},
			{data: 'city', name: 'city'},
			{data: 'country', name: 'country'},
			{data: 'phonenumber', name: 'phonenumber'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* For Validation */

function alphaOnly(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 function IsNumeric(e) {
	var keyCode = e.which ? e.which : e.keyCode
	var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
	/* document.getElementById("error").style.display = ret ? "none" : "inline";
	return ret; */
	return false;
}


/* data table for Products */
$(function () {
    
    var table = $('.product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/products",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'productname', name: 'productname'},
            {data: 'description', name: 'description'},
			{data: 'typeid', name: 'typeid'},
			{data: 'price', name: 'price'},
			{data: 'totalprice', name: 'totalprice'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});


/* Total Sum */
$('input.price,input.disamt,input.vattax,input.framt,input.frtax').on('change keyup',function(){
	
	var price =  parseFloat($('.price').val());
	var discount = parseFloat($('.disamt').val());
	var vattax = parseFloat($('.vattax').val());
	var Freightc = parseFloat($('.framt').val());
	var Freighttax = parseFloat($('.frtax').val()); 
	
	var total = price;
	
	if(discount > 0)
	{
		//var priced = price+discount;
		total = total+discount;
	}
	if(vattax > 0)
	{
		var vattax = total*vattax/100;
		total = total+vattax;
	}
	if(Freightc > 0)
	{
		//var Freighttax = Freightc*Freighttax/100;
		total = total+Freightc;
	}
	
	if(Freighttax > 0)
	{
		var Freighttax = Freightc*Freighttax/100;
		total = total+Freighttax;
	}
	
	/* var total = price+discount+vattax+Freighttax+Freightc; */
	$('.grandtotal').val(total);
      
})


$('input.myprice,input.mymisc,input.myvat,input.myfrch,input.myfrtx').on('change keyup',function(){
	
	var price =  parseFloat($('.myprice').val());
	var misc = parseFloat($('.mymisc').val());
	var vattax = parseFloat($('.myvat').val());
	var Freightc = parseFloat($('.myfrch').val());
	var Freighttax = parseFloat($('.myfrtx').val()); 
	
	var total = price;
	
	if(misc > 0)
	{
		//var priced = price+discount;
		total = total+misc;
	}
	if(vattax > 0)
	{
		var vattax = total*vattax/100;
		total = total+vattax;
	}
	if(Freightc > 0)
	{
		//var Freighttax = Freightc*Freighttax/100;
		total = total+Freightc;
	}
	
	if(Freighttax > 0)
	{
		var Freighttax = Freightc*Freighttax/100;
		total = total+Freighttax;
	}
	
	/* var total = price+discount+vattax+Freighttax+Freightc; */
	$('.grandtotal').val(total);
      
})

/* data table for Hitlist */
$(function () {
    
    var table = $('.hitlist-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/hitlist",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'keyword', name: 'keyword'},
			{data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* data table for Purpose */
$(function () {
    var table = $('.purpose-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/purpose",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'purpose', name: 'purpose'},
            {data: 'description1', name: 'description1'},
			{data: 'memberdescription1', name: 'memberdescription1'},
			{data: 'formid', name: 'formid'},
			{data: 'hitlist', name: 'hitlist'}, 
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* datepicker for individual */
$(document).ready(function () {
	var age = "";
	$('#dob').datepicker({
		onSelect: function (value, ui) {
			var today = new Date();
			age = today.getFullYear() - ui.selectedYear;
			$('#age').val(age);
		},
		
		changeMonth: true,
		changeYear: true
	})
})


function myDatepicker()
{
$(document).ready(function () {
	$('.mycustomdate').datepicker({
		changeMonth: true,
		changeYear: true
	})
})
}

$(document).ready(function () {
	$('.mycustomdate').datepicker({
		changeMonth: true,
		changeYear: true
	})
})



/* Function to Get region by country */

function getRegion()
{
	var cid = $("#countryid").val();
	//alert(cid);return false;
	
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $.ajax({
		type:'POST',
		url: APP_URL+"/admin/individual/getregion",
		data:{cid:cid},
		success:function(data){
			$(".regiondata").empty();
			$(".regiondata").append(data);
		}
	});
}

function getCity()
{
	var cid = $("#regionid").val();
	//alert(cid);return false;
	
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $.ajax({
		type:'POST',
		url: APP_URL+"/admin/individual/getcity",
		data:{cid:cid},
		success:function(data){
			$(".citydata").empty();
			$(".citydata").append(data);
		}
	});
}


/* Add Fields For Video Link */
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonvideo'); //Add button selector
    var wrapper = $('.field_wrappervideo'); //Input field wrapper
    var fieldHTML = '<div class="form-inline"><div class="col-xl-3 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-4 col-form-label">type</label><div class="col-sm-8"><select name="videotype[]" class="form-control"><option value="1">Facebook</option><option value="2">LinkedIn</option><option value="3">Youtube</option></select></div></div></div><div class="col-xl-6 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-4 col-form-label">Url</label><div class="col-sm-8"><input type="text" class="form-control" name="video_url[]" value="http://"></div></div></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
     
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
}); 

/* Add Dynamic fields for Childern */


$(document).ready(function(){
    var maxField = 15; //Input fields increment limitation
    var addButton = $('.add_buttonchild'); //Add button selector
    var wrapper = $('.field_wrapperchild'); //Input field wrapper
    var fieldHTML = '<div class="form-inline"><div class="col-xl-3 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-12 col-form-label bddaydate">Birthdate</label><div class="col-sm-12"><input type="text" class="form-control mycustomdate" name="cdob[]" id="C_dob" ></div></div></div><div class="col-xl-2 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-12 col-form-label">Gender</label><div class="col-sm-12"><select name="cgender[]" class="form-control"><option value="1">Male</option><option value="2">Female</option></select></div></div></div><div class="col-xl-3 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-12 col-form-label">School</label><div class="col-sm-12"><input type="text" class="form-control" name="cschool[]"></div></div></div><div class="col-xl-3 col-md-12 col-sm-12"><div class="form-group row"><label for="type" class="col-sm-12 col-form-label">Location</label><div class="col-sm-12"><select name="clocation[]" class="form-control"><option value="1">Delhi</option><option value="2">Mp</option></select></div></div></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
     
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
			myDatepicker();
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
}); 




$(function () {
    var table = $('.individual-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/individual",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
			
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

/* Add Dynamic fields for Library IPs */
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonip'); //Add button selector
    var wrapper = $('.field_wrapperip'); //Input field wrapper
    var fieldHTML = '<div class="form-group row"><label for="type" class="col-sm-1 col-form-label">From</label><div class="col-sm-1"><input type="text" name="from1[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" name="from2[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" name="from3[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" name="from4[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><label for="type" class="col-sm-1 col-form-label">To</label><div class="col-sm-1"><input type="text" name="to1[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" name="to2[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" onkeypress = "return alphaOnly(event);"  name="to3[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><div class="col-sm-1"><input type="text" name="to4[]" class="form-control" onkeypress = "return alphaOnly(event);"  maxlength="3"></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
     
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
}); 


/* Add Dynamic fields for Library Remote */
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonremote'); //Add button selector
    var wrapper = $('.field_wrapperremote'); //Input field wrapper
    var fieldHTML = '<div class="form-group row"><label for="type" class="col-sm-3 col-form-label">Digits in Remote ID</label><div class="col-sm-1"><select name="remotedigit[]" id="remoteip" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13<option value="14">14</option></option><option value="15">15</option></select></div><label for="type" class="col-sm-3 col-form-label">Remote ID</label><div class="col-sm-3"><input type=""   name="remoteid[]" maxlength="" onkeypress = "return alphaOnly(event);" class="form-control"></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
   
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

function maxLengthFunction()
{

   var ddl = document.getElementById("remotedigit");
  
   var strOption = ddl.options[ddl.selectedIndex].text
		document.getElementById("remoteid").removeAttribute('readonly');
       document.getElementById("remoteid").maxLength=strOption;
}

												
$(function () {
    var table = $('.librarygroup-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/librarygroup",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'library', name: 'library'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

$(function () {
    var table = $('.library-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/library",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'library', name: 'library'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});


$(function () {
    var table = $('.org-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/organization",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'library', name: 'library'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});


/* data table for Subscription Type */
$(function () {
    
    var table = $('.subs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subscriptiontype",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'eng_name', name: 'eng_name'},
            {data: 'usertype', name: 'usertype'},
			{data: 'duration', name: 'duration'},
			{data: 'price', name: 'price'},
			{data: 'totalprice', name: 'totalprice'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
});

$(document).ready(function () {
	 $('#customer_search').click(function(){
		$("#usersearch").hide();
		$("#userlists").show();
		
	})
})


/* User list table */
$(function () {
    
    var table = $('.userlists-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subscription/userlist",
        columns: [
			{data: 'action', name: 'action'},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type', orderable: false, searchable: false},  
        ]
    });
	
	$('#customer_search').keyup(function(){
		//alert('ddd');
		table.search($(this).val()).draw() ;
	})
    
}); 


$(document).ready(function(){

    // code to read selected table row cell data (values).
    $("#myTableuser").on('click','.btnSelect',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(3)").text(); // get current row 3rd TD
		 var col4=currentRow.find("td:eq(4)").text(); // get current row 3rd TD
         //var data=col1+"\n"+col2+"\n"+col3+"\n"+col4;
         //alert(data);
		 
		 $('#cid').val(col1);
		 $('#name').val(col2);
		 $('#type').val(col4);
		 $("#userlists").hide();
		 $.ajaxSetup({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	
        $.ajax({
				type:'POST',
			   url: APP_URL+"/admin/subscription/getsubscriptiontype",
			   data:{col4:col4},
			   success:function(data){
				//alert(data);
				$('#substypedata').empty();
				$('#substypedata').append(data);
				$('#usersearch').show();
				putsubscriptiondata()
			   }

			});
    });
});

function putsubscriptiondata(){
	$('input[type=radio][name=subscription_type]').change(function() {
		//alert('ass');
		var id = $(this).val();
		var price =  parseFloat($('#price_'+id).val());
		var misc = parseFloat($('#misc_'+id).val());
		var vat =  parseFloat($('#vat_'+id).val());
		var freight =  parseFloat($('#freight_'+id).val());
		var freighttax =  parseFloat($('#freighttax_'+id).val());
		
		var myprice = price+misc;
		var myvat = myprice*vat/100;
		var myfrtax = freight*freighttax/100;
		var myfreight = myfrtax + freight;
		var totals = myprice+myvat+myfrtax+freight;
		
		$('#newmisc').val(misc);
		$('#newprice').val(price);
		$('#newvat').val(vat);
		$('#newfr').val(freight);
		$('#newfrt').val(freighttax);
		$('#newtotal').val(totals);
		
		$('#total_price').text(myprice);
		$('#total_vat').text(myvat);
		$('#total_freight_tax').text(myfreight);
		$('#totals').text(totals);
		
		
	});
}

/*subject */
$(function () {
    
    var table = $('.subject-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subject",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    

});

/* Add Dynamic fields for Library Remote */
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonage'); //Add button selector
    var wrapper = $('.field_wrapperage'); //Input field wrapper
    var fieldHTML = '<div class="form-group row"><div class="col-lg-2"><label for="type" > From</label></div><div class="col-md-3"><input type="text" class="form-control" placeholder="Age From" name="age_from[]" maxlength="2" ></div><div class="col-lg-2"><label for="type" > To</label></div><div class="col-md-3"><input type="text" class="form-control" placeholder="Age From" name="age_to[]" maxlength="2" ></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
   
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

/* Add Dynamic fields for Location */
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_buttonlocation'); //Add button selector
    var wrapper = $('.field_wrapperlocation'); //Input field wrapper
    var fieldHTML = '<div class="row"><div class="col-md-2"><label for="type" >country-block</label><select class="form-control mycountryblock" name="country_block[]" id="countryBlock"><option></option></select></div><div class="col-md-2"><label for="type" >country</label><select class="form-control mycountries" name="country[]" id="countries" onchange="getRegion();"><option></option></select></div><div class="col-md-2"><label for="type" >Region</label><select class="form-control regiondata" name="region[]" id="regionid" onchange="getCity();"><option></option></select></div><div class="col-md-2"><label for="type" >City</label><select class="form-control citydata" name="city[]" id="cityid"><option></option></select></div><div class="col-md-2"><label for="type" >Parish</label><input type="text" name="parish" class="form-control" placeholder="parish"></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'; //New input field html 
    var x = 1; //Initial field counter is 1
   
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});





