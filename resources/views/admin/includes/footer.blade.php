 </div>
    <footer class="app-footer">
      <div>
        <a href="http://tecnotch.com/">Tecnotch </a>
        <span>&copy; 2019 . </span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="http://tecnotch.com/">Tecnotch</a>
        <a href="tecnotch.com">Tecnotch</a>
        <span>&copy; 2019</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="tecnotch.com">Tecnotch</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    
<!-- Button trigger modal -->
<button type="button" id="inactivity_model" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="display:none;">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">InActivity Detected</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Inactivity Detected, Stay Login?
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary"  onclick="promptU(true)">Stay Login</button>
      </div>
    </div>
  </div>
</div>



    <!-- <script src="{{ asset('js/jquery.min.js') }}" defer></script> -->
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	
    <script src="{{ asset('js/admin-view.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/pace.min.js') }}" ></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}" ></script>
    <script src="{{ asset('js/coreui.min.js') }}" ></script>
    <script src="{{ asset('js/Chart.min.js') }}" ></script>
    <script src="{{ asset('js/custom-tooltips.min.js') }}" ></script>    
    <script src="{{ asset('js/script.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
	
    <script>
      
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove(); 
            });
        }, 8000);
    </script> 
    <script src="{{ asset('js/font/all.js') }}" defer></script>

    <script src="{{ asset('js/font/all.js') }}" defer></script>
   
    <script>
        CKEDITOR.replace( 'remarks');
        CKEDITOR.replace( 'purpose_detail' );  
    </script>
    
    <script>
         function add_block(id) {
        
           
            var page_text_id = $(".input_text_"+id).find('textarea').last().attr('id');
            var button_id = $(".input_text_"+id).find('a.add-more-btn').last().attr('id');
            
                text_id = page_text_id;
                console.log(button_id);
                $('#'+button_id).remove();
                
            $('<textarea col="20" row="20" style="margin-top:28px" name="'+id+'[text][]" id="'+text_id+id+'"></textarea><a class="btn btn-primary add-more-btn" style="margin:10px" id="add_'+text_id+id+'" onclick="add_block('+id+')">Add</a><a class="btn btn-primary remove-btn" style="margin:10px" id="remove_'+text_id+id+'" onclick="remove_block(cke_'+text_id+id+', remove_'+text_id+id+', '+text_id+id+')">remove</a>').appendTo($('.input_text_'+id));
        
            CKEDITOR.replace(text_id+id);
           
        }
        function remove_block(id, remove_id, textarea_id){
            
            $(id).remove();
            $(textarea_id).remove();
            $(remove_id).remove();
            $('#'+id).remove();
            $('#'+textarea_id).remove();
            $('#'+remove_id).remove();
        }

        $(document).ready(function() {
            $(document).on('click', '.toggle-button', function() {

                var token         = $("input[name=_token]").val();
                var setting_name  = $(this).attr("system_name");
                var setting_value = $(this).attr("system_value");
                
                $.ajax({
                    url: APP_URL+"/admin/settings/getSettings",
                    data: { "_token" : token, "settingName" : setting_name, "settingValue" : setting_value},
                    success: function (data) {
                    }
                });                
                $(this).toggleClass('toggle-button-selected');            
            });
        });
        $(document).ready(function() {            
            $('ul.nav-dropdown-items').not(':has(li)').parent().remove();    
            $('ul.nav').show();
            
            //var t = $.now();
            sessionStorage.setItem("lastActivity",$.now());
            sessionStorage.setItem("lastActivity_clicked",0);
            setInterval(function() {                
                checkInActivity();
            }, 5000);
        });
        function checkInActivity(t){
            
            t = sessionStorage.getItem("lastActivity");
            clicked = sessionStorage.getItem("lastActivity_clicked");
            console.log("ran",t - $.now(),t);

            if(t > 0 && $.now() - t > 7200000){

                if(sessionStorage.getItem("lastActivity_clicked") == 0){

                    sessionStorage.setItem("lastActivity_clicked",1);
                    $("#inactivity_model").click();

                }
                
                if(t > 0 && $.now() - t > 7200000+120000){

                    $("#inactivity_model").click();
                    document.getElementById('logout-form').submit();

                }
                //alert("InActivity Detected");
                // var r = confirm("InActivity Detected, Stay Login?");
                // if(r){
                //     //alert("re_sync");
                //     sessionStorage.setItem("lastActivity",$.now());
                //     console.log('re-connect',sessionStorage.getItem("lastActivity"));
                // }else{
                //     //alert("logout");
                //     //if($.now() - t > 25000){
                //     sessionStorage.setItem("lastActivity",0);                        
                //     document.getElementById('logout-form').submit();
                //     //}
            }
        }
        function promptU(ele){

            if(!ele){

                alert("re_sync");
                sessionStorage.setItem("lastActivity",0);                
                document.getElementById('logout-form').submit();

            }else{
                $("#inactivity_model").click();
                sessionStorage.setItem("lastActivity_clicked",0);
                sessionStorage.setItem("lastActivity",$.now());

            }
            // var r = confirm("InActivity Detected, Stay Login?");
            // //var r = confirm("Press a button!");
            // if (r == true) {
            //   txt = "You pressed OK!";
            // } else {
            //   txt = "You pressed Cancel!";
            // }
        }
            // $.ajax({
            //     url:"<?//= site_url(); ?>/admin/ajax",
            //     method:"GET",
            //     dataType:"json",
            //     success:function(r){
            //         console.log(r);
            //     }
            // })

        //}
    </script>

		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous"></script>
@yield('load_ex_js')

<div class="ajax__loader_main" style="display:none;"><div class="ajax__loader_body">
<div></div>
</div></div>
<style type="text/css">
@keyframes  ajax__loader_body {
  0% { transform: rotate(0deg) }
  50% { transform: rotate(180deg) }
  100% { transform: rotate(360deg) }
}
.ajax__loader_body div {
  position: absolute;
  animation: ajax__loader_body 1s linear infinite;
  width: 160px;
  height: 160px;
  top: 20px;
  left: 20px;
  border-radius: 50%;
  box-shadow: 0 4px 0 0 #20a8d8;
  transform-origin: 80px 82px;
}
.ajax__loader_main {
  width: 100vw;
  height: 100vh;
  display: inline-block;
  overflow: hidden;
  background: #00000096;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
.ajax__loader_body {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
  justify-content: center;
  align-items: center;
  top: 20%;
  left: 45%;
}
.ajax__loader_body div { box-sizing: content-box; }

</style>

  </body>
</html>
