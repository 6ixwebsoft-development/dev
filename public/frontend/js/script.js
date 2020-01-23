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
        event.preventDefault();
        if($("input[name=fund_search]:checked").val() == 1) {
          //http://test.globalgrant.com/newcode/public/
          location.href = APP_URL+"/search-foundation";
        } else {
          //http://test.globalgrant.com/newcode/public/
          location.href = APP_URL+"/advance-search";
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
      event.preventDefault();
      var id   = $(this).data('id');
      saveSearchData(id);
      if(!$(this).hasClass('heart-pink')) {
        $(this).addClass('heart-pink');
        $(this).children(".fa").removeClass('fa-heart-o');
        $(this).children(".fa").addClass('fa-heart');
      } else {
        $(this).removeClass('heart-pink');
        $(this).children(".fa").addClass('fa-heart-o');
        $(this).children(".fa").removeClass('fa-heart');
      }
    });

    /*$("#selected-favorite").on('click', function(e) {
      e.preventDefault();
      favoriteFunds();
    });*/

    
    favoriteFoundations();
});



function getAdvanceFoundations() {

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

//alert(location);

  $.ajax({
    url: "getAdvanceFoundations",
    data: { _token : token, purpose_ids : purposeIds, cityName : location, gender_ids : genderIds, subject_ids : subjectIds},
    success: function (data) {
	
		//$('.searchFOUND-table').DataTable().fnDestroy()
		//data.draw = 1;
	
		//console.log(data);

	var table =	$('.searchFOUND-table').DataTable({
		destroy: true,
		data: data.data,
		"iDisplayLength": 25,
		rowId: 'id',
		columns: [
			 {data: 'DT_RowIndex', name: 'DT_RowIndex'}, 
			{data: 'id', name: 'id'},
			{data: 'sort', name: 'sort'},
			{data: 'name', name: 'name'},
			 {data: 'action', name: 'action', orderable: false, searchable: false}, 
			],
			createdRow: function( row, data, dataIndex ) {
				$(row).addClass('myallids');
				//table.column( 1 ).data().unique();
			}
			
		});
    }
  });

}


function getFoundationDetailajax(id,val) {
	//alert(val);
	$('#loaderarea').show();
	var showbtn = '';
	var nextid = '';
	var previd = '';
	if(val == 0)
	{
		$('.modal').toggleClass('is-visible');
	}
	
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
        data: { _token : token, foundationId : id,nextid : nextid,previd:previd},
		dataType:"html",
        success: function (data) {
           //console.log(data);
            if(data.length > 0) {
			  $('#loaderarea').hide();
              $('.fund-details').show();
              $('.fund-details').empty();
              $('.fund-details').append(data);           
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
          $.confirm(data.message); 
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
    url: "fund-search-mail",
    data: { _token : token, foundation_ids : foundationIds},
    success: function (data) {
        //console.log(data.email_details); 
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