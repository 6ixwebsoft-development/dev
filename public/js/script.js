/* Foundation Eddit/add location section */
$( document ).ready(function() {
    $("#A_countryBlock").on('change', function() {
        my_getCountries();
    })
    $("#A_countries").on('change', function() {
        my_getRegions();
    })
    $("#A_regionid").on('change', function() {
        my_getCities();
    })
});

//get countries 
function my_getCountries() {
    var countryBlockId = $("#A_countryBlock").val();
    var token = $("input[name=_token]").val();
    //console.log(token);
    $.ajax({
        type: "POST",
        url: "/admin/location/getCountries",
        data: {"_token": token, "country_block_id" : countryBlockId},
        success:function(data){
            if(data) {
                $("#A_countries").empty();
                $("#A_countries").append('<option value="">Select</option>');
                for(var i in data ) {
                    //console.log(data[i].country_code)
                    $("#A_countries").append('<option value="'+ data[i].id +'">'+ data[i].country_name +'</option>');
                }
            }
        }
    });
}

//get regions
function my_getRegions() {
    var countryId = $("#A_countries").val();
    var token = $("input[name=_token]").val();
    //console.log(token);
    $.ajax({
        type: "POST",
        url: "/admin/location/getRegions",
        data: {"_token": token, "country_id" : countryId},
        success:function(data){
            if(data) {
                $("#A_regionid").empty();
                $("#A_regionid").append('<option value="">Select</option>');
                for(var i in data ) {
                    //console.log(data[i].country_code)
                    $("#A_regionid").append('<option value="'+ data[i].id +'">'+ data[i].region_name +'</option>');
                }
            }
        }
    });
}

//get cities
function my_getCities() {
    var regionId = $("#A_regionid").val();
    var token = $("input[name=_token]").val();
    //console.log(token);
    $.ajax({
        type: "POST",
        url: "/admin/location/getCities",
        data: {"_token": token, "region_id" : regionId},
        success:function(data){
            if(data) {
                $("#A_cities").empty();
                $("#A_cities").append('<option value="">Select</option>');
                for(var i in data ) {
                    //console.log(data[i].country_code)
                    $("#A_cities").append('<option value="'+ data[i].id +'">'+ data[i].city_name +'</option>');
                }
            }
        }
    });
}


function Added(){

    countryBL =  $("#A_countryBlock option:selected");
    country = $("#A_countries option:selected"); 
    region = $("#A_regionid option:selected");
    city = $("#A_cities option:selected");
    parish = $("#A_parish");

    countryBL_v = countryBL.val();
    country_v = country.val();
    region_v = region.val();
    city_v = city.val();
    parish_v = parish.val();

    countryBL_t = countryBL.text();
    country_t = country.text();
    region_t = region.text();
    city_t = city.text();
    parish_t = parish.text();

    if(countryBL.text() == '' || countryBL.text() == 'Select' || countryBL.text() == 'select'){
        countryBL_t = "";
    }
    if(country.text() == '' || country.text() == 'Select' || country.text() == 'select'){
        country_t ="";
    }
    if(region.text() == '' || region.text() == 'Select' || region.text() == 'select'){
        region_t = "";
    }
    if(city.text() == '' || city.text() == 'Select' || city.text() == 'select'){
        city_t = "";
    }
    if(parish.text() == '' || parish.text() == 'Select' || parish.text() == 'select'){
        parish_t = "";
    }

    if(countryBL.val() == undefined){
        countryBL_v = 0;
    }
    if(country.val() == undefined){
        country_v = 0;
    }
    if(region.val() == undefined){
        region_v = 0;
    }
    if(city.val() == undefined){
        city_v = 0;
    }
    if(parish.val() == undefined){
        parish_v = "";
    }
    //if(countryBL.val() > 0 && country.val() > 0 && region.val() > 0 && city.val() > 0 && parish.val() != ''){
        t = '<div class="row col-md-12" id="temp__'+ii+'"><div class="col-md-2"> <label for="country-block">country block</label> <input class="form-control" type="text" value="'+countryBL_t+'" readonly="true"/> <input class="form-control" name="locationArray['+ii+'][country_block]" type="hidden" value="'+countryBL_v+'" readonly="true"/> </div><div class="col-md-2"> <label for="country">country</label> <input class="form-control" type="text" value="'+country_t+'" readonly="true"/> <input class="form-control" name="locationArray['+ii+'][country]" type="hidden" value="'+country_v+'" readonly="true"/> </div><div class="col-md-2"> <label for="region">region</label> <input class="form-control" type="text" value="'+region_t+'" readonly="true"/> <input class="form-control" name="locationArray['+ii+'][region]" type="hidden" value="'+region_v+'" readonly="true"/> </div><div class="col-md-2"> <label for="city">city</label> <input class="form-control" type="text" value="'+city_t+'" readonly="true"/> <input class="form-control" name="locationArray['+ii+'][city]" type="hidden" value="'+city_v+'" readonly="true"/> </div><div class="col-md-2"> <label for="parish">parish</label> <input name="locationArray['+ii+'][parish]" class="form-control" type="text" value="'+parish_v+'" readonly="true"/> </div><div class="col-md-2" style="margin-top: 2%;"><a class="btn btn-danger add_buttonlocation form-control" value="remove" onclick="rowDelete(\'temp__'+ii+'\')">X</a></div></div>';
        $("#loc_add").append(t);
        deselectRow();
        ii++;
    // }else{
    //     alert("all fields are mendetory");
    // }
}
function deselectRow(){
    $("#A_countryBlock").val([]);
    $("#A_countries").val([]);
    $("#A_regionid").val([]);
    $("#A_cities").val([]);
    $("#A_parish").val([]);
}
$(document).ready(function() {

    console.log( "check data" );
    ii = $('.current_add').length+1;
});

/* Foundation Eddit/add location section */

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

function rowDelete(row) {
    $("#"+row).remove();
}

$(document).ready(function() {

    console.log( "check data" );


});