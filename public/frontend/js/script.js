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
          location.href = "http://127.0.0.1:8000/search-foundation";
        } else {
          //http://test.globalgrant.com/newcode/public/
          location.href = "http://127.0.0.1:8000/advance-search";
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

  $.ajax({
    url: "getAdvanceFoundations",
    data: { _token : token, purpose_ids : purposeIds, cityName : location, gender_ids : genderIds, subject_ids : subjectIds},
    success: function (data) {
        $("#advanceFoundations").empty();
        for(var i in data.foundations) {
          
          for(var j in data.foundations_contacts[i]) {
            foundationContacts.push(data.foundations_contacts[i][j]);
          }

          $("#advanceFoundations").append('<tr><td>'+ data.foundations[i].id +'</td><td>'+ data.foundations[i].name +'</td><td>'+ data.foundations[i].sort +'</td><td><button onclick="getFoundationDetails('+ data.foundations[i].id +')">Details</button></td></tr>')
        }
        $("#advanceFoundations").append('<tr id="addMore"><td colspan="4"><button id="btn-more" data-id="'+data.foundations[i].id+'" data-type="advance" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button></td></tr>');
    }
  });

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

        success: function (data) {
           // console.log(data);
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
    //$('.modal').toggleClass('is-visible');
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
          location.href = "http://127.0.0.1:8000/login";
        } else {
          $.confirm(data.message); 
        }
    }
  });
}

/*function loadMore(id, index) {
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
}*/

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