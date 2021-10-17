		<script src="main/js/jquery.min.js"></script>
		<script src="main/js/SmoothScroll.min.js"></script>
		<script src="main/js/move-top.js"></script>
		<script src="main/js/easing.js"></script>
		<script src="main/js/responsiveslides.min.js"></script>
		<script src="main/js/owl.carousel.js"></script>
		<script src="main/js/jquery-migrate-3.0.1.min.js"></script>
		<script src="main/js/popper.min.js"></script>
		<script src="main/js/jquery.waypoints.min.js"></script>
		<script src="main/js/jquery.stellar.min.js"></script>
		<script src="main/js/main.js"></script>
		<script src="main/js/main1.js"></script>
		<script type="text/javascript" src="main/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="main/js/bootstrap.js"></script>	
		<script src="assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
		<script src="assets/js/formHandler.js"></script>
		<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
		<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
		<script src="assets/js/easy-ajax.js"></script>
		<script src="assets/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
		<script src="assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
		<script src="assets/plugins/material-datetimepicker/datetimepicker.js"></script>
		<!-- carousel -->
		<script src="main/js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {
				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					touchDrag:true,
					responsiveClass: true,
					responsive: {
						0: {
							items: 1,
							nav: true
						},
						600: {
							items: 1,
							nav: false
						},
						900: {
							items: 2,
							nav: false
						},
						1000: {
							items: 3,
							nav: true,
							loop: false,
							margin: 20
						}
					}
				})
			})
		</script>
		<!-- //carousel -->
		<!--slider-->
		<script>
			$(function() {
				// Slideshow 1
				$("#slider1").responsiveSlides({
					auto: true,
					pager: true,
					nav: true,
					speed: 500,
					namespace: "centered-btns"
				});
			});
		</script>
		<!--//slider-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$().UItoTop({
					easingType: 'easeOutQuart'
				});

			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#nav-icon2').click(function(){
					$(this).toggleClass('open');
				});
			});
		</script>
	</body>

	</html>