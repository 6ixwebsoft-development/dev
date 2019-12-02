		<!-- <script src="frontend/js/jquery-1.11.1.min.js"></script> -->
		{!! Html::script('frontend/js/jquery-1.11.1.min.js') !!}

		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        
		<!-- <script src="frontend/js/plugins.js"></script> -->
		{!! Html::script('frontend/js/plugins.js') !!}
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

		<!-- <script src="frontend/js/script.js"></script> -->
		{!! Html::script('frontend/js/script.js') !!}

		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
		<script>
			(function($, document, window){
                // git testing git
				$(document).ready(function(){
					// Cloning main navigation for mobile menu
					$(".mobile-navigation").append($(".main-navigation .menu").clone());
					// Mobile menu toggle 
					$(".menu-toggle").click(function(){
						$(".mobile-navigation").slideToggle();
					});
					$(".offer img, .news img").panr({
						sensitivity: 15,
						scale: false,
						scaleOnHover: true,
						scaleTo: 1.2,
						scaleDuration: 0.25,
						panY: true,
						panX: true,
						panDuration: 1.25,
						resetPanOnMouseLeave: false
					});

					$(".testimonial-slider, .hero-slider").flexslider({
						directionNav: false,
						controlNav: true
					});

					if( $(".map").length ) {
						$('.map').gmap3({
							map: {
								options: {
									maxZoom: 14,
									scrollwheel: false
								}  
							},
							marker:{
								address: "40 Sibley St, Detroit",
								// options: {
								// 	icon: new google.maps.MarkerImage(
								// 		"images/map-marker.png",
								// 		new google.maps.Size(43, 53, "px", "px")
								// 	)
								// }
							}
						},
						"autofit" );
				    	
				    }
				});

				$(window).load(function(){

				});

			})(jQuery, document, window);
			window.onload = function() {
				function multipleSelect() {
					document.getElementById("multiSelect").multiple = true;
				}
			}
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
			  coll[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var content = this.nextElementSibling;
			    if (content.style.maxHeight){
			      content.style.maxHeight = null;
			    } else {
			      content.style.maxHeight = content.scrollHeight + "px";
			      if(content.style.maxHeight > '160px') {
			      	content.style.maxHeight = '160px';
			      }
			    } 
			  });
			}
			var coll_t_c = document.getElementsByClassName("collapsible_t_c");
			var i;

			for (i = 0; i < coll_t_c.length; i++) {
			  coll_t_c[i].addEventListener("click", function() {
			    this.classList.toggle("active_t_c");
			    var content_t_c = this.nextElementSibling;
			    if (content_t_c.style.maxHeight){
			      content_t_c.style.maxHeight = null;
			    } else {
			      content_t_c.style.maxHeight = content_t_c.scrollHeight + "px";
			    } 
			  });
			}
			var coll_p_y = document.getElementsByClassName("collapsible_p_y");
			var i;

			for (i = 0; i < coll_p_y.length; i++) {
			  coll_p_y[i].addEventListener("click", function() {
			    this.classList.toggle("active_p_y");
			    var content_p_y = this.nextElementSibling;
			    if (content_p_y.style.maxHeight){
			      content_p_y.style.maxHeight = null;
			    } else {
			      content_p_y.style.maxHeight = content_p_y.scrollHeight + "px";
			    } 
			  });
			}
			
		</script>
		<!-- <script src="frontend/js/app.js"></script> -->
		{!! Html::script('frontend/js/app.js') !!}
		
		<script type="text/javascript">
		$.noConflict(true);
		
		</script>
		<script src="https://unpkg.com/js-datepicker"></script>
		<script>
			const picker_start = datepicker('#datepicker_start')
			const picker_end = datepicker('#datepicker_end')
			const picker_b = datepicker('.datepicker_b')
			/*const picker_s = datepicker('#datepicker_s')
			const picker_e = datepicker('#datepicker_e')*/


			function library() {
				document.getElementById('roles').value = 'library';
			}
			function monthly_subscription() {
				document.getElementById('roles').value = 'monthly_subscription';
			}
			function yearly_subscription() {
				document.getElementById('roles').value = 'yearly_subscription';
			}
		</script>

		<script type="text/javascript">
		    var path = "{{URL::to('autocomplete')}}";

		    $('input.typeahead').typeahead({
		        source:  function (query, process) {
		        return $.get(path, { query: query }, function (data) {
		                return process(data);
		            });
		        }
		    });
		</script>
		
	</body>
</html>