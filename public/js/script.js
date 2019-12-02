$( document ).ready(function() {
    $("#countryBlock").on('change', function() {
    	getCountries();
    })
    $("#countries").on('change', function() {
    	getRegions();
    })
    $("#regions").on('change', function() {
    	getCities();
    })
});

//get countries 
function getCountries() {
	var countryBlockId = $("#countryBlock").val();
	var token = $("input[name=_token]").val();
	//console.log(token);
	$.ajax({
	    type: "POST",
	    url: "/admin/location/getCountries",
	    data: {"_token": token, "country_block_id" : countryBlockId},
	    success:function(data){
        	if(data) {
        		$("#countries").empty();
        		$("#countries").append('<option value="">Select</option>');
        		for(var i in data ) {
        			//console.log(data[i].country_code)
        			$("#countries").append('<option value="'+ data[i].id +'">'+ data[i].country_name +'</option>');
        		}
        	}
	    }
	});
}

//get regions
function getRegions() {
	var countryId = $("#countries").val();
	var token = $("input[name=_token]").val();
	//console.log(token);
	$.ajax({
	    type: "POST",
	    url: "/admin/location/getRegions",
	    data: {"_token": token, "country_id" : countryId},
	    success:function(data){
        	if(data) {
        		$("#regions").empty();
        		$("#regions").append('<option value="">Select</option>');
        		for(var i in data ) {
        			//console.log(data[i].country_code)
        			$("#regions").append('<option value="'+ data[i].id +'">'+ data[i].region_name +'</option>');
        		}
        	}
	    }
	});
}

//get cities
function getCities() {
	var regionId = $("#regions").val();
	var token = $("input[name=_token]").val();
	//console.log(token);
	$.ajax({
	    type: "POST",
	    url: "/admin/location/getCities",
	    data: {"_token": token, "region_id" : regionId},
	    success:function(data){
        	if(data) {
        		$("#cities").empty();
        		$("#cities").append('<option value="">Select</option>');
        		for(var i in data ) {
        			//console.log(data[i].country_code)
        			$("#cities").append('<option value="'+ data[i].id +'">'+ data[i].city_name +'</option>');
        		}
        	}
	    }
	});
}