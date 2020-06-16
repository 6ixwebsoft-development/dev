// function getLocationData(ele,Lname){
// 	if(Lname='region'){
// 		getRegion(ele.value);
// 	}
// }

$( document ).ready(function() {
    console.log( "ready!" );
    $( "#country_id" ).change(function() {
	  alert( "Handler for .change() called." );
	});
});



function getRegion(val) {
	console.log(val);
}