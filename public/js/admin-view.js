// data table for language
$(function () {
    
    var table = $('.language-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/language",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'language', name: 'language'},
            {data: 'locale', name: 'locale'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

//Pages
$(function () {
    
    var table = $('.pages-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/pages",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

$(function () {
    
    var table = $('.language-deleted-record').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/language/deleted",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'language', name: 'language'},
            {data: 'locale', name: 'locale'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/translation",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'group', name: 'group', render:function(data, type, row){
                return "<a href='/admin/"+ row.id +"/label/'>" + row.group + "</a>"
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

// data table for group Translation
$(function () {
    
    var table = $('.permission-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/permission",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/*modules module table name display*/
$(function () {
    
    var moduleTable = $('.modules-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/modules/module",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/*foundation table*/
$(function () {
    
    var moduleTable = $('.foundation-table').DataTable({
		"bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 25,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/foundation",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            // {data: 'id', name: 'id'},
			{data: 'sort', name: 'sort'},
            {data: 'name', name: 'name'},
            {data: 'tstatus', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/*modules fields table */
$(function () {
    
    var moduleField = $('.module-field-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/*modules fieldvalue table */
$(function () {
    
    var moduleFieldValue = $('.module-fieldvalue-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/*Country Block table */
$(function () {
    
    var moduleFieldValue = $('.country-block-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/countryblock",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* Location Country table */
$(function () {
    
    var moduleFieldValue = $('.location-country-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* Location region table */
$(function () {
    
    var moduleFieldValue = $('.location-region-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/region",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'country_name', name: 'country_name'},
            {data: 'region_name', name: 'region_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* Location city table */
$(function () {
    
    var moduleFieldValue = $('.location-city-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 100,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/location/city",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'country_name', name: 'country_name'},
            {data: 'region_name', name: 'region_name'},
            {data: 'city_name', name: 'city_name'},
            {data: 'tstatus', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });

});

/* User table */
 $(function () {
    //alert('ddd');
    var table = $('.user-table-export').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'excel'
			],
			buttons: [
				{
					extend: 'excel',
					text: 'Export ',
					title: 'Export',
					exportOptions: {
						columns: ':visible'
					}
				},
			'colvis'
			],
		
		"bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 100,
        processing: true,
        serverSide: true,
		
        ajax: APP_URL+"/admin/users",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'tstatus', name: 'status'},
			{data: 'roles', name: 'roles'},
            {data: 'user_type', name: 'user_type'},
			{data: 'mobile', name: 'mobile'},
			{data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
}); 

/* User Search table */
function searchuserdata() {
	$('#loaderareafront').show();
	var emailcheck = '';
    var searchtext = $('#search').val();
	var userRole = $('#userRole').val();
	var statususer = $("input[name='optuser']:checked").val();
	var usertytype = $('#usertytype').val();
	// alert(userRole); 
	var createdFrom = $('#createdFrom').val();
	var createdTo = $('#createdTo').val();
	var modifiesFrom = $('#modifiesFrom').val();
	var modifiesTo = $('#modifiesTo').val();
	var languageid = $('#languageid').val();
	
	if ($('#byemail').is(":checked"))
	{
	  emailcheck = $('#byemail').val();
	}

	
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'POST',
           url: APP_URL+"/admin/getuserdata",
           data:{searchtext:searchtext,userRole:userRole,statususer:statususer,createdFrom:createdFrom,createdTo:createdTo,modifiesFrom:modifiesFrom,modifiesTo:modifiesTo,emailcheck:emailcheck,usertytype:usertytype,languageid:languageid},
           success:function(data){
			//alert(data);
			$('#loaderareafront').hide();
			$('.user-table-export').dataTable().fnDestroy()
				
				data.draw = 1;
			//console.log(data);	
				
				$('.user-table-export').DataTable({
					dom: 'Bfrtip',
					buttons: [
						'excel'
					],
					buttons: [
						{
							extend: 'excel',
							text: 'Export ',
							title: 'Export',
							exportOptions: {
								columns: ':visible'
							}
						},
					'colvis'
					],
					data: data.data,
				
					"bJQueryUI":true,
					"bSort":false,
					"bPaginate":true,
					"sPaginationType":"full_numbers",
					"iDisplayLength": 100,
					"bFilter": true,
					processing: true,
					
					columns: [
						{data: 'DT_RowIndex', name: 'DT_RowIndex'},
						{data: 'name', name: 'name'},
						{data: 'email', name: 'email'},
						{data: 'tstatus', name: 'status'},
						{data: 'roles', name: 'roles'},
						{data: 'user_type', name: 'user_type'},
						{data: 'mobile', name: 'mobile'},
						{data: 'created_at', name: 'created_at'},
						{data: 'updated_at', name: 'updated_at'},
						{data: 'action', name: 'action', orderable: false, searchable: false},
					]
				});
           }

		});
    
};



/*roles */
$(function () {
    
    var table = $('.role-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/roles",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    

});
/*subscription */
$(function () {
    
    var table = $('.subscription-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subscription",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'start_date', name: 'start date'},
            {data: 'end_date', name: 'end date'},
            {data: 'status', name: 'status'},
            {data: 'price', name: 'price'},
            {data: 'no_of_days', name: 'no of days'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* data table for Paymentmood */
$(function () {
    
    var table = $('.payment-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* data table for Office */
$(function () {
    
    var table = $('.office-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/products",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'productname', name: 'productname'},
            {data: 'description', name: 'description'},
			{data: 'typeid', name: 'typeid'},
			{data: 'price', name: 'price'},
			{data: 'totalprice', name: 'totalprice'},
			{data: 'tstatus', name: 'tstatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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

function calculatesubstaxs(id)
{
	//alert(id);
	$("#"+id).prop("checked", true);
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
		$('#subscId').val(id);
		
		$('#total_price').text(myprice);
		$('#total_vat').text(myvat);
		$('#total_freight_tax').text(myfreight);
		$('#totals').text(totals);

}
/* data table for Hitlist */
$(function () {
    
    var table = $('.hitlist-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/hitlist",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'keyword', name: 'keyword'},
			{data: 'description', name: 'description'},
			{data: 'tstatus', name: 'tstatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

/* data table for Purpose */
$(function () {
    var table = $('.purpose-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
	$.ajax({
			type:'GET',
			url: APP_URL+"/customer/edit/getregion",
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
	$.ajax({
			type:'GET',
			url: APP_URL+"/customer/edit/getcity",
			data:{cid:cid},
			success:function(data){
				$(".citydata").empty();
				$(".citydata").append(data);
			}

		});
}

function getCity_resi()
{
	var cid = $("#regionid_resi").val();
	//alert(cid);return false;
	$.ajax({
			type:'GET',
			url: APP_URL+"/customer/edit/getcity",
			data:{cid:cid},
			success:function(data){
				$(".citydata_resi").empty();
				$(".citydata_resi").append(data);
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
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/individual",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},            
            {data: 'id', name: 'User ID'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
	var x = 1; //Initial field counter is 1
    var fieldHTML = ''; //New input field html 
    
   
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div class="form-group row"><label for="type" class="col-sm-3 col-form-label">Digits in Remote ID</label><div class="col-sm-1"><select name="remotedigit[]" id="remotedigit_'+x+'" onChange="maxLengthFunction('+x+');" class="form-control"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13<option value="14">14</option></option><option value="15">15</option></select></div><label for="type" class="col-sm-3 col-form-label">Remote ID</label><div class="col-sm-3"><input type="text" class="form-control formBox" id="remoteid_'+x+'" placeholder="******" name="remoteid[]"  readonly value="" maxlength=""></div><a href="javascript:void(0);" class="remove_button btn btn-danger">Remove</a></div><br>'); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

function maxLengthFunction(val)
{
	
	var count = $('#remotedigit_'+val+'').val();
	$('#remoteid_'+val+'').attr('maxlength', count);
	$('#remoteid_'+val+'').removeAttr('readonly');
	var i;
	var mydata = '';
	for (i = 1; i <= count; i++) {
	  mydata += '*';
	}
	//alert(mydata);
	$('#remoteid_'+val+'').val(mydata);
}

												
$(function () {
    var table = $('.librarygroup-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/librarygroup",
        columns: [
          {data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'Lib Grp. Id'},
            {data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});

$(function () {
    var table = $('.library-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/library",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},            
            {data: 'id', name: 'Lib Id'},
            {data: 'name', name: 'name'},
			{data: 'remotename', name: 'remotename'},
			{data: 'email', name: 'email'},
			{data: 'tstatus', name: 'tstatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});


$(function () {
    var table = $('.org-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/organization",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'Lib. Id'},
            {data: 'name', name: 'name'},
			{data: 'remotename', name: 'remotename'},
			{data: 'email', name: 'email'},
			{data: 'tstatus', name: 'tstatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});


/* data table for Subscription Type */
$(function () {
    
    var table = $('.subs-table').DataTable({
       "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subscriptiontype",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'eng_name', name: 'eng_name'},
            {data: 'usertype', name: 'usertype'},
			{data: 'duration', name: 'duration'},
			{data: 'price', name: 'price'},
			{data: 'totalprice', name: 'totalprice'},
			{data: 'tstatus', name: 'tstatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
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
		  $('#usertype').val(col4);
		 
		  $('#email').val(col3);
		 $("#userlists").hide();
		 $.ajaxSetup({
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	//alert(col4);
        $.ajax({
				type:'POST',
			   url: APP_URL+"/admin/subscription/getsubscriptiontype",
			   data:{col4:col4},
			   success:function(data){
				//alert(data);
				
				$('#getsubstype').empty();
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
		$('#subscId').val(id);
		
		$('#total_price').text(myprice);
		$('#total_vat').text(myvat);
		$('#total_freight_tax').text(myfreight);
		$('#totals').text(totals);
		
		
	});
}

/*subject */
$(function () {
    
    var table = $('.subject-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/subject",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
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
    var fieldHTML = ''; //New input field html 
    var x = 1; //Initial field counter is 1
   
    //Once add button is clicked
    $(addButton).click(function(){
		$.ajax({
			type:'GET',
			url: APP_URL+"/customer/edit/get_found_location",
			data:{x:x},
			success:function(data){
				if(x < maxField){ 
					x++; //Increment field counter
					$(wrapper).append(data); //Add field html
				}
			}

		});
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

function deleteDataImg(id,txt)
{
	
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	//alert(id);return false;
	if (confirm("Are you sure want to delete record?"))
	{
	 $.ajax({
		   type:'POST',
		  url: APP_URL+"/admin/organization/document",
		   data:{id:id,txt:txt},
		 
		   success:function(data) {
			//alert(data);return false;
			if(data == 1){
				alert("File deleted successfully...!");
			}else{
				alert("There is some problem...!");
			}
			
			location.reload();
               }
            });
	}
}

//user list data

$(function () {
	var data = {};
    var pageURL = $(location).attr("href");
	 data = getUrlParameter(pageURL);
	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'GET',
           url: APP_URL+"/admin/listalluser",
           data:data,
           success:function(data){
			//alert(data);
			$('.userlist-table').dataTable().fnDestroy()

				data.draw = 1;
				console.log(data);	
				
			$('.userlist-table').DataTable({
			data: data.data,
			"iDisplayLength": 100,
			columns: [
			{data: 'checkbox', name: 'checkbox'},
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'}, 
            {data: 'roles', name: 'roles'},
			{data: 'last_login_at', name: 'last_login_at'},
			
			{data: 'status', name: 'status'},
            /* {data: 'action', name: 'action', orderable: false, searchable: false}, */
					]
				} );
           }

			});
    
}); 

function getUrlParameter(url) {
	//alert(url);
    var toReturn = {};
    var questionSplit = url.split('?');
    questionSplit.shift();
    var onlyParameters = questionSplit.join('?');
	//alert(onlyParameters);
    var splittedParameters = onlyParameters.split('&');
	//alert(splittedParameters);
    for (var c = 0; c < splittedParameters.length; c++) {
        var parts = splittedParameters[c].split('=');
		//alert($.trim(parts[1]));
         if ($.trim(parts[0]) != '') {
            toReturn[parts[0]] = parts[1];
        } 
    } 
	//alert(toReturn);
    return toReturn;
}


/* User Search table */
function get_exportlist() {
		
	var only_my_list = $('#only_my_list').val();
	var date_from = $('#date_from').val();
	var date_to = $('#date_to').val();
	var min_stat_data = $('#min_stat_data').val();
	var language_id = $('#language_id').val();
	
	var only_active = $('#only_active').val();
	var search_field = $('#search_field').val();
	var purpose_ids = $('#purpose_ids').val();
	var gender_ids = $('#gender_ids').val();
	var countryid = $('#countryid').val();
	var regionid = $('#regionid').val();
	var cityid = $('#cityid').val();
	var subject_ids = $('#subject_ids').val();
	var age_start = $('#age_start').val();
	var age_end = $('#age_end').val();
	var apply_start_month = $('#apply_start_month').val();
	var apply_start_day = $('#apply_start_day').val();
	var apply_end_month = $('#apply_end_month').val();
	var apply_end_day = $('#apply_end_day').val();
	
	/*  alert(purpose_ids); */
	
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'POST',
           url: APP_URL+"/admin/foundation/searchexportfoundation",
           data:{only_my_list:only_my_list,date_from:date_from,date_to:date_to,min_stat_data:min_stat_data,language_id:language_id,search_field:search_field,purpose_ids:purpose_ids,gender_ids:gender_ids,countryid:countryid,regionid:regionid,cityid:cityid,subject_ids:subject_ids,age_start:age_start,age_end:age_end,apply_start_month:apply_start_month,apply_start_day:apply_start_day,apply_end_month:apply_end_month,apply_end_day:apply_end_day,only_active:only_active},
           success:function(data){
			//alert(data);
			$('.exportdata-table').dataTable().fnDestroy()

				data.draw = 1;
				//console.log(data);	
				
			exporttable =  $('.exportdata-table').DataTable({
				dom: 'Bfrtip',
				buttons: [
					/* 'copyHtml5',
					'excelHtml5',
					'csvHtml5', */
					'excel'
				],
				
				  buttons: [
					{
						extend: 'excel',
					 text: 'Export Foundtaion',
					 title: 'Export Foundtaion Data',
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
				],
				columnDefs: [ {
					//targets: -2,
					visible: false
				},
				{
				// This works fine, but I want col1 to be the 'empty' col ...
				"targets": 0,
				 "data": null,
				 "defaultContent": '',
				},
				 
				
				],
				data: data,
				"iDisplayLength": 25,
				columns: [
				{data: '', name: '',class:'select-checkbox'},
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'param_id', name: 'param_id'}
			  /*   {data: 'tstatus', name: 'status'},
				{data: 'roles', name: 'roles'},
				{data: 'action', name: 'action', orderable: false, searchable: false},  */
						]
				
				});
           }

			});
    
}

$('.exportdata-table tbody').on( 'click', 'tr', function () {
	var t = ":eq("+$(this).index()+")";
	
	if($(this).hasClass( "selected" )){
	exporttable.row(t, { page: 'current' }).deselect();
	}else{
	exporttable.row(t, { page: 'current' }).select();
	}
	console.log("sasassa",":eq("+$(this).index()+")");
});

function searchtransdata()
{
	 var data = $("#transData").serialize();
	  $.ajax({
           type:'POST',
           url: APP_URL+"/admin/transaction/searchtransactiondata",
           data:data,
           success:function(data){
			//alert(data);
			$('.tranaction-table').dataTable().fnDestroy()
				data.draw = 1;
				console.log(data);	
				
			$('.tranaction-table').DataTable({
				dom: 'Bfrtip',
				buttons: [
					/* 'copyHtml5',
					'excelHtml5',
					'csvHtml5', */
					'excel'
				],
				buttons: [
				   { 
					 extend: 'excel',
					 text: 'Export Result To xls',
					 title: 'Export Data'
					  
				   }
				],
				data: data.data,
				columns: [
				{data: 'id', name: 'id'},
				{data: 'sname', name: 'sname'},
				{data: 'name', name: 'name'},
				{data: 'email', name: 'email'},
			    {data: 'total', name: 'total'},
				{data: 'start_date', name: 'start_date'},
				{data: 'end_date', name: 'end_date'},
				{data: 'created_at', name: 'created_at'},
				{data: 'updated_at', name: 'updated_at'},
			    {data: 'value', name: 'value'},
				{data: 'action', name: 'action', orderable: false, searchable: false}
						]
				
				});
           }

			});
}	

function getProduct()
{
	var id = $('#productids').val();
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $.ajax({
		type:'POST',
		url: APP_URL+"/admin/order/getproduct",
		data:{id:id},
		success:function(data){
			  var price = data[0].price;
			  
			  $('#productId').val(id);
			  $('#price').val(price);
			  $('#quantity').val(0);
			  $('#misc').val(0);
			  $('#freight').val(0);
		}
	});
}


function calculateorderprice(){
	
		var quantity =  parseFloat($('#quantity').val());
		var price =  parseFloat($('#price').val());
		var misc = parseFloat($('#misc').val());
		var vat =  parseFloat($('#vat').val());
		var freight =  parseFloat($('#freight').val());
		var freighttax =  parseFloat($('#freighttax').val());

		var myprice = price+misc;
		var myvat = myprice*vat/100;
		var myfrtax = freight*freighttax/100;
		var myfreight = myfrtax + freight;
		var totals = myprice+myvat+myfrtax+freight;
		
		var gtotal = totals*quantity;
		
		$('#newquantity').val(quantity);
		$('#newmisc').val(misc*quantity);
		$('#newprice').val(price*quantity);
		$('#newvat').val(vat*quantity);
		$('#newfr').val(freight*quantity);
		$('#newfrt').val(freighttax*quantity);
		$('#newtotal').val(gtotal*quantity);
		
		$('#total_quantity').text(quantity*quantity);
		$('#total_price').text(myprice*quantity);
		$('#total_vat').text(myvat*quantity);
		$('#total_freight_tax').text(myfreight*quantity);
		$('#totals').text(gtotal);

}

/*foundation table*/
$(function () {
    
    var moduleTable = $('.order-table').DataTable({
        "bJQueryUI":true,
		"bSort":false,
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		"iDisplayLength": 10,
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/order",
        columns: [
			{data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'userid', name: 'userid'},
            {data: 'id', name: 'id'},
			{data: 'orderdate', name: 'orderdate'},
            {data: 'name', name: 'name'},
			{data: 'productname', name: 'productname'},
            {data: 'paiddate', name: 'paiddate'},
            {data: 'totalprice', name: 'totalprice'},
            {data: 'status', name: 'status'},
			 {data: 'ordernotes', name: 'ordernotes'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
    });
    
});


/* Get Order List By status */

function getorderbystatus()
{
	var cid = $("#orderstatus").val();
	
	$("#pending").hide();
	$("#paid_not_delivered").hide();
	$("#paid_and_delivered").hide();
	$("#Delivered").hide();
	$("#canclled").hide();
	
	if(cid == 10)
	{
		$("#pending").show();
	}
	if(cid == 11)
	{
		$("#paid_not_delivered").show();
	}
	if(cid == 12)
	{
		$("#paid_and_delivered").show();
	}
	if(cid == 121)
	{
		$("#Delivered").show();
	}
/* 	if(cid == 13)
	{
		$("#paid_ind").show();
	} */
	if(cid == 14)
	{
		$("#canclled").show();
	}
	
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'POST',
           url: APP_URL+"/admin/order/getorderbystatus",
           data:{cid:cid},
           success:function(data){
			//alert(data);
			$('.order-table').dataTable().fnDestroy()

				data.draw = 1;
				console.log(data);	
				
				$('.order-table').DataTable({
				data: data.data,
			  columns: [
			 {data: 'checkbox', name: 'checkbox'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'userid', name: 'userid'},
            {data: 'id', name: 'id'},
			{data: 'orderdate', name: 'orderdate'},
            {data: 'name', name: 'name'},
			{data: 'productname', name: 'productname'},
            {data: 'paiddate', name: 'paiddate'},
            {data: 'totalprice', name: 'totalprice'},
            {data: 'status', name: 'status'},
			 {data: 'ordernotes', name: 'ordernotes'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "initComplete": function(settings, json) {
            newWin();
        }
				} );
           }

			});
}

function getsubsbystatus()
{
	var cid = $("#orderstatus").val();
	$("#pendig_lib").hide();
	$("#paid_lib").hide();
	$("#expire_lib").hide();
	$("#pendig_ind").hide();
	$("#paid_ind").hide();
	$("#expire_ind").hide();
	
	if(cid == 15)
	{
		$("#pendig_lib").show();
	}
	if(cid == 16)
	{
		$("#paid_lib").show();
	}
	if(cid == 17)
	{
		$("#expire_lib").show();
	}
	if(cid == 123)
	{
		$("#pendig_ind").show();
	}
	if(cid == 124)
	{
		$("#paid_ind").show();
	}
	if(cid == 128)
	{
		$("#expire_ind").show();
	}

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $.ajax({
           type:'POST',
           url: APP_URL+"/admin/subscription/getsubsbystatus",
           data:{cid:cid},
           success:function(data){
			//alert(data);
			$('.subscription-table').dataTable().fnDestroy()

				data.draw = 1;
				console.log(data);	
				
				$('.subscription-table').DataTable({
				data: data.data,
			  columns: [
				{data: 'checkbox', name: 'checkbox'},
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'name', name: 'name'},
				{data: 'start_date', name: 'start date'},
				{data: 'end_date', name: 'end date'},
				{data: 'status', name: 'status'},
				{data: 'price', name: 'price'},
				{data: 'no_of_days', name: 'no of days'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
				]
				} );
           }

			});
}

/*subject */
$(function () {
    
    var table = $('.cashflow-table').DataTable({
		"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var tueTotal = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var wedTotal = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var vatTotal = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var ftaxTotal = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
		 var taxTotal = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
		var invoiceTotal = api
                .column( 12 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
	    $( api.column( 0 ).footer() ).html('Total');
		//console.log(monTotal);
            $( api.column( 6 ).footer() ).html(monTotal);
            $( api.column( 7 ).footer() ).html(tueTotal);
            $( api.column( 8 ).footer() ).html(wedTotal);
            $( api.column( 9 ).footer() ).html(vatTotal);
            $( api.column( 10 ).footer() ).html(ftaxTotal);
			$( api.column( 11 ).footer() ).html(taxTotal);
			$( api.column( 12 ).footer() ).html(invoiceTotal);
        },
        processing: true,
        serverSide: true,
        ajax: APP_URL+"/admin/report/cash_flow",
        columns: [
            {data: 'orderdate', name: 'orderdate'},
			{data: 'customerid', name: 'customerid'},
            {data: 'orderid', name: 'orderid'},
			{data: 'customername', name: 'customername'},
            {data: 'address', name: 'address'},
			{data: 'selesperson', name: 'selesperson'},
            {data: 'total', name: 'total'},
            {data: 'misc', name: 'misc'},
			 {data: 'freight', name: 'freight'},
            {data: 'vat', name: 'vat'},
			 {data: 'freighttax', name: 'freighttax'},
			 {data: 'totaltax', name: 'totaltax'},
			 {data: 'totalinvoice', name: 'totalinvoice'},
        ]
    });
    

});


function searchcashflowdata()
{
 var data = $("#transData").serialize();
/*   alert(data);  */
  $.ajax({
	   type:'POST',
	   url: APP_URL+"/admin/report/searchdatabyfilter",
	   data:data,
	   success:function(data){
		//alert(data);
		$('.cashflow-table').dataTable().fnDestroy()
			data.draw = 1;
			console.log(data);	
			
		$('.cashflow-table').DataTable({
			"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var tueTotal = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var wedTotal = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var vatTotal = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var ftaxTotal = api
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
		 var taxTotal = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
		var invoiceTotal = api
                .column( 12 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
	    $( api.column( 0 ).footer() ).html('Total');
		//console.log(monTotal);
            $( api.column( 6 ).footer() ).html(monTotal);
            $( api.column( 7 ).footer() ).html(tueTotal);
            $( api.column( 8 ).footer() ).html(wedTotal);
            $( api.column( 9 ).footer() ).html(vatTotal);
            $( api.column( 10 ).footer() ).html(ftaxTotal);
			$( api.column( 11 ).footer() ).html(taxTotal);
			$( api.column( 12 ).footer() ).html(invoiceTotal);
        },
			
			dom: 'Bfrtip',
			buttons: [
				'excel'
			],
			buttons: [
			   { 
				 extend: 'excel',
				 text: 'Export Result To xls',
				 title: 'Export Data'
				  
			   }
			],
			
			data: data.data,
			columns: [
			{data: 'orderdate', name: 'orderdate'},
			{data: 'customerid', name: 'customerid'},
			{data: 'orderid', name: 'orderid'},
			{data: 'customername', name: 'customername'},
			{data: 'address', name: 'address'},
			{data: 'selesperson', name: 'selesperson'},
			{data: 'total', name: 'total'},
			{data: 'misc', name: 'misc'},
			 {data: 'freight', name: 'freight'},
			{data: 'vat', name: 'vat'},
			 {data: 'freighttax', name: 'freighttax'},
			 {data: 'totaltax', name: 'totaltax'},
			 {data: 'totalinvoice', name: 'totalinvoice'},
			]
			
			});
	   }

		});
}

function geturlbox()
{
	var val = $('#page').val();
	if(val == 0)
	{
		$('#customfeild').show();
		$('#textname').val('');
	}else{
		$('#customfeild').hide();
		$('#textname').val($( "#page option:selected" ).text());

	}
}

function getalllistcheckboxval(val,id=''){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});
	if(id == '')
	{
		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	}
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/updateaction",
			data:{val:val,favorite:favorite,id:id},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}
			}
		});
}

function getfoundlistcheckboxval(val,id=''){
	
	var favorite = [];
	$.each($("input[name='usersfoundlistIds']:checked"), function(){
	favorite.push($(this).val());
	});
	if(id == '')
	{
		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	}
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/individual/updateaction",
			data:{val:val,favorite:favorite,id:id},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}
			}
		});
}

function mydeletefoundation(val){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});
	
		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/foundation/multidelete",
			data:{val:val,favorite:favorite},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

function getLibGrpStatus(val,id=''){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});
	if(id == '')
	{
		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/librarygroup/changestatus",
			data:{val:val,favorite:favorite,id:id},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

function getorderStatus(val,txt){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});

		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/order/changestatus",
			data:{val:val,favorite:favorite,txt:txt},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					getorderbystatus(val,txt);
					//location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

function getsubstypeStatus(val,txt){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});

		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/subscriptiontype/changestatus",
			data:{val:val,favorite:favorite,txt:txt},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

function mygetproductStatus(val,txt){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});

		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/product/changestatus",
			data:{val:val,favorite:favorite,txt:txt},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

function mygethitlistStatus(val,txt){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});

		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/hitlist/changestatus",
			data:{val:val,favorite:favorite,txt:txt},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}



function getsubsStatus(val,txt){
	
	var favorite = [];
	$.each($("input[name='userslistIds']:checked"), function(){
	favorite.push($(this).val());
	});

		if(favorite == '')
		{
			alert("please select one or more records");
			return false;
		}
	
	//alert(favorite);
	$.ajax({
			type:'POST',
			url: APP_URL+"/admin/subscription/changestatus",
			data:{val:val,favorite:favorite,txt:txt},
			success:function(data){
			//alert(data);
				if(data == 'yes')
				{
					getsubsbystatus();
					//location.reload();
				}else{
					alert('There is some problem');
				}

			}

		});
	

}

/* Password Genrate  */

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
	var pass = randomPassword(10);
	$('#password').val(pass);
   
}

function saveactivepassword(id)
{
	var password = $("#password").val();
	//alert(password);return false;
	if(password == '')
	{
		alert("Please genrate password");
		return false;
	}
 	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $.ajax({
		type:'POST',
		url: APP_URL+"/admin/user/passwordactive",
		data:{id:id,password:password},
		success:function(data){
			//alert(data);return false;
			if(data == 1)
			{
				alert('Password has been activated successfully');
			}
			else{
				alert('There is some problem,Try again.');
				
			}
		}
	});
	$('#password').val('');
}

$('#selectAll').click(function(e){
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});

function varify_librarycard()
{
    var library_city = $('#librarycity').val();
	var library_card = $('#librarycard').val();
	$.ajax({
			type:'GET',
			url: APP_URL+"/customer/edit/varify_card",
			data:{library_city:library_city,library_card:library_card},
			success:function(data){
			//alert(data);
				if(data == '1')
				{
					alert('Library card is valid');
				}else{
					alert('Library card is not valid');
				}

			}

		});
	
}
function deletealllistcheckboxval(val,id=''){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){		favorite.push($(this).val());	});	if(id == '')	{		if(favorite == '')		{			alert("please select one or more records");			return false;		}	}		if (confirm("Are you sure want to delete record?")) {				getalllistcheckboxval(val,id='');	}	}

function deletefoundation(val){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});		if(favorite == '')		{			alert("please select one or more records");			return false;		}	if (confirm("Are you sure want to delete record?")) {				mydeletefoundation(val);	}}function deletealllistcheckboxval(val,id=''){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){		favorite.push($(this).val());	});	if(id == '')	{		if(favorite == '')		{			alert("please select one or more records");			return false;		}	}		if (confirm("Are you sure want to delete record?")) {				getalllistcheckboxval(val,id='');	}	}
function deletealllistcheckboxval(val,id=''){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){		favorite.push($(this).val());	});	if(id == '')	{		if(favorite == '')		{			alert("please select one or more records");			return false;		}	}		if (confirm("Are you sure want to delete record?")) {				getalllistcheckboxval(val,id='');	}	}function deleteLibGrpStatus(val,id=''){		var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});	if(id == '')	{		if(favorite == '')		{			alert("please select one or more records");			return false;		}	}	if (confirm("Are you sure want to delete record?")) {				getLibGrpStatus(val,id='');	}}function deletesubsStatus(val,txt){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});		if(favorite == '')		{			alert("please select one or more records");			return false;		}		if (confirm("Are you sure want to delete record?")) {			getsubsStatus(val,txt);	}}function deleteorderStatus(val,txt){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});		if(favorite == '')		{			alert("please select one or more records");			return false;		}		if (confirm("Are you sure want to delete record?")) {				getorderStatus(val,txt);	}	}function getproductStatus(val,txt){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});		if(favorite == '')		{			alert("please select one or more records");			return false;		}	if (confirm("Are you sure want to delete record?")) {				mygetproductStatus(val,txt);	}}function gethitlistStatus(val,txt){	var favorite = [];	$.each($("input[name='userslistIds']:checked"), function(){	favorite.push($(this).val());	});		if(favorite == '')		{			alert("please select one or more records");			return false;		}	if (confirm("Are you sure want to delete record?")) {				mygethitlistStatus(val,txt);	}}

$(document).ready(function() {
    $('.report_table').DataTable({
		dom: 'Bfrtip',
		buttons: [
			'pdf'
		],
		buttons: [
		   { 
			 extend: 'pdf',
			 text: 'Export ',
			 title: 'Export Data'
			  
		   }
		],
	});
});




function get_reportdata(id)
{
	 var data = id;
	 var year = $("#select_year").val();
	 //$("#transData").serialize();
	  $.ajax({
           type:'POST',
           url: APP_URL+"/admin/library/get_reportdata",
           data:{data:data,year:year},
           success:function(data){
			//alert(data);
			//console.log(data.data);
			$('.report_table').dataTable().fnDestroy()
				data.draw = 1;
				console.log(data);	
				
			$('.report_table').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'pdf'
				],
				buttons: [
				   { 
					 extend: 'pdf',
					 text: 'Export ',
					 title: 'Export Data'
					  
				   }
				],
				data: data.data,
				columns: [
				{data: 'type', name: 'type'},
				{data: 'month_1', name: 'month_1'},
				{data: 'month_2', name: 'month_2'},
				{data: 'month_3', name: 'month_3'},
			    {data: 'month_4', name: 'month_4'},
				{data: 'month_5', name: 'month_5'},
				{data: 'month_6', name: 'month_6'},
				{data: 'month_7', name: 'month_7'},
				{data: 'month_8', name: 'month_8'},
			    {data: 'month_9', name: 'month_9'},
				{data: 'month_10', name: 'month_10'},
				{data: 'month_11', name: 'month_11'},
			    {data: 'month_12', name: 'month_12'},
				{data: 'total', name: 'total'},
						
				]
				
				});
           }

			});
}

$(function () {
    $('.ex_regiondata').on('change',function(){
        val = $(this).val();
        ele = $(this);
        console.log("asasaaasas");
        console.log(val);
        $.ajax({
                type:'GET',
                url: APP_URL+"/customer/edit/getcity",
                data:{cid:val},
                success:function(data){
                    ele.closest('.card-body').find(".citydata").empty();
                    ele.closest('.card-body').find(".citydata").append(data);
                }

            });
    });
        $('a').each(function(){
           $(this).prop('target', '_blank');
    });
});
function newWin(){    
    $('a').each(function(){
           $(this).prop('target', '_blank');
    });
}