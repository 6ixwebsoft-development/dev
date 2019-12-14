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
	
	if(discount > 0)
	{
		var priced = price+discount;
	}
	if(vattax > 0)
	{
		var vattax = priced*vattax/100;
	}
	
	if(Freighttax > 0)
	{
		var Freighttax = Freightc*Freighttax/100;
	}
	
	var total = price+discount+vattax+Freighttax+Freightc;
	$('.grandtotal').val(total);
      
})

 




