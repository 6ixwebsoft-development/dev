$(document).ready(function() {
    
    $('a.ad-search').confirm({
          title: 'Advance Search',
          content: "Advanced search is only for experienced users of database searching, not for beginners.",
        });
    $('a.ad-search').confirm({
        buttons: {
            hey: function(){
                location.href = this.$target.attr('href');
            }
        }
    });

    $(".foundationSearch").click(function(event) {
		 var lan = $('#lan').val();
		 if($('#lan').val() == 'en')
		 {
			  var lan = "/"+lan;
		 }else{
			 var lan = '';
		 }
        event.preventDefault();
        if($("input[name=fund_search]:checked").val() == 1) {
          //http://test.globalgrant.com/newcode/public/
          location.href = APP_URL+""+lan+"/search-foundation";
        } else {
          //http://test.globalgrant.com/newcode/public/
          location.href = APP_URL+""+lan+"/advance-search";
        }
    });

    $('.modal-toggle').on('click', function(e) {
      e.preventDefault();
      $('.modal').toggleClass('is-visible');
    });

    $('.mail-toggle').on('click', function(e) {
      e.preventDefault();
      $('.mail-modal').toggleClass('is-visible');
    });

    $('.help-toggle').on('click', function(e) {
      e.preventDefault();
      $('.help-modal').toggleClass('is-visible');
    });

    $(function() {
          var self = $('.help_subscription');
          self.mouseover(function () {
              $('.popup-box').fadeIn(350);
          });
          self.mouseout(function () {
              $('.popup-box').fadeOut(350);
          });  
    });

    $(".advance_submit").click(function(event) {
      event.preventDefault();
      getAdvanceFoundations();
    });

    $("#search_email").click(function(event) {
      event.preventDefault();
      seveSearchEmail();
    });
	
	$(".advance_submit_ids").click(function(event) {
      event.preventDefault();
      getAdvanceFoundations();
    });
    

    //$("#saveSearchFoundation").hide();
    $('.fund-details').hide();

    //"order": [[ 1, 'desc' ]],
        //dom: "<'row nxt-prv'<'col-sm-6'p><'col-sm-3'l><'col-sm-3 t-favorite'f>>" ,
    var t = $('#f_table').DataTable( {
        "searching": false,
        "bLengthChange": false,
        "bInfo": false,
        "pagingType": "simple_numbers",
        "sDom": 't<"row nxt-prv paging-row"<"col-sm-12"<p>>>'
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

/* $('#ad_table').DataTable( {
        "searching": false,
        "bLengthChange": false,
        "bInfo": false,
        "pagingType": "simple_numbers",
        "sDom": 'tt<"row nxt-prv paging-row"<"col-sm-12"<p>>>'
    } ); */
 
	
 
    /* tt.on( 'order.dt search.dt', function () {
        tt.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw(); */

    /**/

    /*if($('.fund-row').hasClass('selected')) {
      var id   = $('.selected').data('id');
      getFoundationDetail(id);
    }

    $('#fundsTable').on('click', '.f_id', function(event) {
      event.preventDefault();
      var id   = $(this).data('id');
      $('.fund-row').removeClass('grey');
      $(this).parent().parent().addClass('grey');
      getFoundationDetail(id);
    });*/


    $('#fundsTable').on('click', '#saveSearchFoundation', function(event) {
      show_loader(1);
      event.preventDefault();
      var id   = $(this).data('id');
      saveSearchData(id);
      if(!$(this).hasClass('heart-pink')){
        $(this).addClass('heart-pink');
        $(this).children(".fa").removeClass('fa-heart-o');
        $(this).children(".fa").addClass('fa-heart');
      } else {
        $(this).removeClass('heart-pink');
        $(this).children(".fa").addClass('fa-heart-o');
        $(this).children(".fa").removeClass('fa-heart');
      }
      favoriteFoundations();      
    });

    /*$("#selected-favorite").on('click', function(e) {
      e.preventDefault();
      favoriteFunds();
    });*/

    
    favoriteFoundations();
});



function getAdvanceFoundations() {
	$('#loaderareafront').show();
	var data = $('#advaceSearch').serialize();
  var token      = $("input[name=_token]").val();
  var purposeIds = [];
  $.each($("input[name='purpose_ids']:checked"), function(){            
      purposeIds.push($(this).val());
  });

  var genderIds = [];
  $.each($("input[name='gender_ids']:checked"), function(){            
      genderIds.push($(this).val());
  });

  var subjectIds = [];
  $.each($("input[name='subject_ids']:checked"), function(){            
      subjectIds.push($(this).val());
  });
  var location = $("#location").val();

  var hide_records = $("#hide_records").val();

  var foundids = $("#foundids").val();
	
	//alert(foundids); return false;

  $.ajax({
	type:'post',
    url: "getAdvanceFoundations",
    data: { _token : token,data:data,purpose_ids : purposeIds, cityName : location, gender_ids : genderIds, subject_ids : subjectIds,hide_records:hide_records,foundids:foundids},
    success: function (data) {
		//$('.searchFOUND-table').DataTable().fnDestroy()
		//data.draw = 1;
		$('#loaderareafront').hide();
		$('#foundids').val('');
		
		//console.log(data);

	table =	$('.searchFOUND-table').DataTable({
		destroy: true,
		dom: 'Bfrtip',
				buttons: [
					/* 'copyHtml5',
					'excelHtml5',
					'csvHtml5', */
					'pdf'
				],
				
				  buttons: [
					{
						extend: 'pdf',
					 text: 'Export Foundtaion',
					 title: 'Export Foundtaion Data',
						exportOptions: {
							columns: ':visible'
						}
					},
					//'colvis'
				],
				columnDefs: [ {
					//targets: -2,
					visible: false
				} ],
			//select: true,
			
		data: data.data,
		"iDisplayLength": 25,
		//rowId: 'id',
		
		
		
		columns: [
			 {data: 'checkbox',onclick:"newselect()" ,name: 'checkbox',class:'select-checkbox',orderable: false, searchable: false},
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'id', name: 'id'},
			{data: 'Total Saved', name: 'Total Saved'},	
			{data: 'name', name: 'name'},
			{data: 'Savedbyuser', name: 'Savedbyuser'},
			{data: 'Savedbystaff', name: 'Savedbystaff'},
			/* {data: 'action', name: 'action', orderable: false, searchable: false},  */
			],
			/* createdRow: function( row, data, dataIndex ) {
				$(row).addClass('myallids');
				//table.column( 1 ).data().unique();
			} */
			
		});
    }
  });

}

/*  $('.searchFOUND-table tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } ); */
	
	
$('.searchFOUND-table tbody').on( 'click', 'tr', function () {
	//global table;
	//table.row(":eq(1)", { page: 'current' }).select();
	//table.row(":eq(2)", { page: 'current' }).select();
	//table.row(":eq(3)", { page: 'current' }).select();
	
	
	var t = ":eq("+$(this).index()+")";
	
	if($(this).hasClass( "selected" )){
	
	table.row(t, { page: 'current' }).deselect();
	}else{
	table.row(t, { page: 'current' }).select();
	}
	console.log("sasassa",":eq("+$(this).index()+")");
});

/* $(document).ready(function() {
    $('.searchFOUND-table').DataTable( {
        dom: 'Bfrtip',
				buttons: [
					'pdf'
				],
				buttons: [
				   { 
					 extend: 'pdf',
					 text: 'Export Foundtaion',
					 title: 'Export Foundtaion Data'
					  
				   }
				],
				select: true
      
    } );
} );  */
function getFoundationDetailajax(id,val,hide_name=false) {
	//alert(val);
	$('#loaderarea').show();
	var showbtn = '';
	var nextid = '';
	var previd = '';
	if(val == 0)
	{
		$('.modal').toggleClass('is-visible');
	}
	
  $('tr').removeClass('popup');
  $('.td__'+id).addClass('popup');
	//$('.fund-details').empty();
	
	var idArray = [];
	$('.myallids').each(function () {
		idArray.push(this.id);
	});
	//console.log(idArray);
	//alert(idArray);
	//alert(id);return false;
	var index = idArray.indexOf(''+id+'');
	
	var arrayval = idArray.length -1;
	 //alert(index); 
    var foundationIds = [];
    $.each($("input[name='foundatoin_check']:checked"), function(){            
        foundationIds.push($(this).val());
    });
	
    var fund_id = $.grep(foundationIds, function(v) {
        return v== id;
    });
	
	if(val != 0)
	{
		id = idArray[index];
		/* alert(id); */
	}
	
	if(index == 0)
	{
		//showbtn = 1;	
		var nextid = idArray[index+1];
		var previd = '';
	}
	else
	{
		if(arrayval == index)
		{
			var nextid = '';
			var previd = idArray[index-1];
			
		}
		else
		{
			var nextid = idArray[index+1];
			var previd = idArray[index-1];
		}
	}
	
    //$('.modal').toggleClass('is-visible');
    var token = $("input[name=_token]").val();
    $.ajax({
        url: "getFoundationDetailAjax",
        data: { _token : token, foundationId : id,nextid : nextid,previd:previd, hide_name:hide_name},
		dataType:"html",
        success: function (data) {
           //console.log(data);
            if(data.length > 0) {
			  $('#loaderarea').hide();
              $('.fund-details').show();
              $('.fund-details').empty();
              $('.fund-details').append(data);      
              btn_check();     
            } else {
              $('.fund-details').hide();
              $('.fund-details').empty();
            }
        }
    });
	//$('#loaderarea').hide();
    
}


//function getFoundationDetails(purpose, detail, who_can_app, phone, email, mobile, website)
function getFoundationDetail(id) {
    var foundationIds = [];
    $.each($("input[name='foundatoin_check']:checked"), function(){            
        foundationIds.push($(this).val());
    });
    var fund_id = $.grep(foundationIds, function(v) {
        return v== id;
    });
    //$('.modal').toggleClass('is-visible');
    var token = $("input[name=_token]").val();

    $.ajax({
        url: "getFoundationDetail",
        data: { _token : token, foundationId : id},
		dataType:"html",
        success: function (data) {
           //console.log(data);
            if(data.length > 0) {
              $('.fund-details').show();
              $('.fund-details').empty();
             /*  for(var i in data) { */
                $('.fund-details').append(data);
            /*   } */
              
            } else {
              $('.fund-details').hide();
              $('.fund-details').empty();
            }
        }
    });
    $('.modal').toggleClass('is-visible');
}

function favoriteFunds() {
  var foundationIds = [];
  $.each($(".heart-pink"), function(){            
      foundationIds.push($(this).data('id'));
  });

  var token = $("input[name=_token]").val();
  $.ajax({
      url: "getFoundationDetails",
      data: { _token : token, foundation_ids : foundationIds},
      success: function (data) {
        //console.log(data);
        if(data.length > 0) {
          $('.fund-details').show();
          $('.fund-details').empty();
          for(var i in data) {
            $('.fund-details').append(data[i]);
          }
          
        } else {
          $('.fund-details').hide();
          $('.fund-details').empty();
        }
        
      }
  });
}

function saveSearchData(id) {
  
  var token   = $("input[name=_token]").val();

  var foundationIds = [];
  /*$.each($("input[name='foundatoin_check']:checked"), function(){            
      foundationIds.push($(this).val());
  });*/
  foundationIds.push(id);
  //console.log(foundationIds);

  $.ajax({
    url: "saveSearch",
    data: { _token : token, foundation_ids : foundationIds},
    success: function (data) {
        //alert(data.message);
        if(data.status == 0) {
          //http://test.globalgrant.com/newcode/public/          
          location.href = APP_URL+"/login";
        } else {
          //$.confirm(data.message); 
		        //location.reload();
            show_loader(0);
        }
    }
  });
}

 function loadMore(id, index) {
  var token   = $("input[name=_token]").val();
  $.ajax({
    url: "loadMore",
    data: { _token : token, foundation_id : id},
    success: function (data) {
        //console.log(data.length);
        if(data.length > 0) {

          for(var i in data) {          
            $("#fundsTable").append('<tr><td>'+index+'</td><td><input type="checkbox" name="foundatoin_check" id="checked_foundation"  value="'+ data[i].id +'"></td><td><a href="#" id="saveSearchFoundation" data-id="'+data[i].id+'"><i class="fa fa-heart-o"></i></a></td><td><a href="#" class="f_id" id="foundation_id" data-id="'+ data[i].id +'">'+ data[i].id +'</a></td><td>'+ data[i].name +'</td><td>'+ data[i].sort +'</td><td><a href="#" class="f_id" data-id="'+data[i].id+'"><i class="fa fa-search"></i></a></td></tr>');
            index++;
          }
          $(".moreFund").empty();
          $(".moreFund").append('<button id="btn-more" data-id="'+data[i].id+'" class="acc-btn btn-block" > Load More Funds </button>');
        }
          
    }
  });
} 

function favoriteFoundations() {
    var favoriteFunds = [];
    $.each($(".heart-pink"), function(){            
        favoriteFunds.push($(this).data('id'));
    });
    $("#selected-favorite").empty();
    if(favoriteFunds.length > 0) {
      $("#selected-favorite").append('My favourites as a list('+favoriteFunds.length+')');
    } else {
      $("#selected-favorite").append('My favourites as a list(0)');
    }
}

function seveSearchEmail() {
  var token   = $("input[name=_token]").val();
  var foundationIds = [];
  $.each($("input[name='foundatoin_check']:checked"), function(){            
      foundationIds.push($(this).val());
  });
  //console.log(foundationIds);
  $.ajax({
    url: "/fund-search-mail",
    data: { _token : token, foundation_ids : foundationIds},
    success: function (data) {
        console.log(data.email_details); 
        if(data.details.length > 0) {
          $('.mail-body').empty();
          for(var i in data.details) {
            $('.mail-body').append(data.details[i]);
          }  
          //location.href = "http://127.0.0.1:8000/fund-search-mail";
          $('.mail-body').append('<textarea name="message" style="display:none;">'+ JSON.stringify(data.email_details) +'</textarea>');
          $('.mail-modal').toggleClass('is-visible');
        }
    }
  });
}

$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});

$( document ).ready(function() {
     getAdvanceFoundations();
});

$('#selectAll').click(function(e){
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});



		
$(document).ready(function() {
   tablepg = $('#mypaggination').DataTable({
		destroy: true,
		dom: 'Bfrtip',
				buttons: [
					/* 'copyHtml5',
					'excelHtml5',
					'csvHtml5', */
					'pdf'
				],
				
				  buttons: [
					{
						extend: 'pdf',
					  text: 'Export Foundtaion',
					  title: 'Export Foundtaion Data',
						exportOptions: {
							columns: ':visible'
						}
					},
					//'colvis'
				],
				columnDefs: [ {
					//targets: -2,
					visible: false
				} ],
			//select: true,
			
		//data: data.data,
		"iDisplayLength": 50,
		//rowId: 'id',
		
			});
} );  

function myselectdata(v){
//$('#mypaggination tbody .my__select').change( function () {
	//this = v;
	var t = ":eq("+v+")";
	console.log(t);
	
	if($("#userslistIds_"+v).parent().parent().hasClass( "selected" )){	
		tablepg.row(t, { page: 'current' }).deselect();
	}else{
		tablepg.row(t, { page: 'current' }).select();
	}
	
	//console.log("sasassa",":eq("+$(this).index()+")");
	
//});
}

$('#selectAllsheck').click(function(e){
   // var table= $(e.target).closest('table');
   var check = this.checked;
   console.log(this.checked);
		$( ".my__select" ).each(function( index ) {
			  console.log( index + ": " + $( this ).text() );
			  if(this.checked != check){
				$(this).click();
		   }
			});
});
//}

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

function btn_check(){
  next1 = $(".popup").closest('tr').next('tr').find('.sf__id').val();
    if(next1 == undefined){
      $('.model__button_top .next').hide();
    }else{
      $('.model__button_top .next').show();
    }
    prev1 = $(".popup").closest('tr').prev('tr').find('.sf__id').val();
    if(prev1 == undefined){
      $('.model__button_top .prev').hide();
    }else{
      $('.model__button_top .prev').show();
    }
}

function show_loader(v = 2) {
    if(v == 1){
        $(".ajax__loader_main").show();
    }else if(v == 0){
        $(".ajax__loader_main").hide();
    }else{
        $(".ajax__loader_main").toggel();
    }
    
}