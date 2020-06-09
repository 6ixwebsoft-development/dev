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
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js
"></script>

	
    <script src="{{ asset('js/admin-view.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/pace.min.js') }}" ></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}" ></script>
    <script src="{{ asset('js/coreui.min.js') }}" ></script>
    <script src="{{ asset('js/Chart.min.js') }}" ></script>
    <script src="{{ asset('js/custom-tooltips.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
    <script src="{{ asset('js/script.js') }}" ></script>
	
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
    </script>

		<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js
"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js
"></script>


  </body>
</html>
