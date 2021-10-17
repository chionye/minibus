<div class="page-footer">
	<div class="page-footer-inner">
		<script type="text/javascript">
			document.write(new Date().getFullYear());
		</script> &copy; All rights reserved
		<a href="../" target="_top" class="makerCss">Minibus Express</a>
	</div>
	<div class="scroll-to-top">
		<i class="material-icons">eject</i>
	</div>
</div>
<!-- end footer -->
</div>
<!-- start js include path -->
<audio controls id="aud" style="display: none">
<source src="../assets/sound/notification.mp3">
</audio>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="../assets/js/formHandler.js"></script>
<script src="../assets/js/easy-ajax.js"></script>
<script type="text/javascript">
	function locate() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var id = '<?=$drvrId?>'
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude,
					driver_id:id
				};
				$.ajax({
					url: "../assets/system/controller.php",
					method: "post",
					cache: false,
					dataType: "text",
					data: pos,
					success: function(response) {
						console.log(pos);
					}
				});
			}, function() {
				
			});
		} else {
			alert('please allow location services to be turned on');
		}
		setTimeout(locate, 10000);
	}
	locate();

	function getNewRideRequests(){
		$.ajax({
			url: "../assets/system/controller.php",
			method: "post",
			cache: false,
			dataType: "json",
			data: {
				getNewRideRequests: 1
			},
			success: function(response) {
				if (checkOnlineStat()) {
					console.log(response);
					if (response != '' || response != null) {
					response.forEach(function(argument) {
						if (sessionStorage.getItem("notifyChecker")){
							var notifiedItems = JSON.parse(sessionStorage.getItem("notifyChecker"));
							if (notifiedItems != null && notifiedItems.hasOwnProperty(argument.id)) {
							}else{
								notifiedItems[argument.id] = "seen";
								sessionStorage.setItem("notifyChecker",JSON.stringify(notifiedItems));
								$.ajax({
									url: "../assets/system/controller.php",
									method: "post",
									cache: false,
									dataType: "json",
									data: {
										passengerInfo: argument.customer_id
									},
									success:function(res) {
										 var enc = encodeURIComponent(window.btoa(argument.id));
										 var req = argument.pass_request == ''?'none':argument.pass_request;
										$.toast({
											heading: "Notification",
											position: 'top-right',
											text: [
										     "you've got a new ride request from: "+res[0].first_name+" "+res[0].lastname, 
										     'special requests: ', 
										     `check it out <a href="route.php?id=${enc}">here</a>.`
										     ],
											hideAfter: false,
											icon: 'info'
										});
										document.getElementById('aud').play();
										if (!('Notification' in window)) {
											alert("This browser does not support desktop notification");
										} else {
											var title = 'Notification';
											var options = {
												body: "you've got a new ride request from "+res[0].first_name+" "+res[0].lastname+"\nspecial requests: "+argument.pass_request,
												tag: 'preset',
												icon: 'http://radixtouch.in/templates/templatemonster/ecab/source/assets/img/favicon.ico'
											};
											Notification.requestPermission(function() {
												var notification = new Notification(title, options);
												notification.onclick = function(event) {
													window.location.href = "route.php?id=" + encodeURIComponent(window.btoa(argument.id));
												}
											});
										}
									}
								});
							}
						}else{
							var notify = {};
							notify[argument.id] = "seen";
							sessionStorage.setItem("notifyChecker", JSON.stringify(notify));
						}
					});
				}
			}
			}
		});
	}
	setInterval(getNewRideRequests, 10000);

	var checkOnlineStat = () => {
		if (sessionStorage.getItem("onlineStat") === "online") {
			return true;
		} else {
			return false;
		}
	}
</script>
<script src="../assets/plugins/popper/popper.min.js"></script>
<script src="../assets/plugins/croppie/croppie.js"></script>
<script>
	var el = document.getElementById('resizer-demo');
	var resize = new Croppie(el, {
		viewport: {
			width: 100,
			height: 100,
			type: 'circle'
		},
		boundary: {
			width: 300,
			height: 300
		},
		showZoomer: false,
		enableResize: true,
		enableOrientation: true,
		mouseWheelZoom: 'ctrl'
	});
	resize.bind({
		url: '<?php if (!empty($res->photo)) {echo $res->photo;} else {echo "../images/profile.png";} ?>',
	});
	jQuery(document).on('click', '#submitPic', function(event) {
		resize.result({
			type: 'canvas',
			size: {
				width: 370,
				height: 370
			},
			format: 'png',
			quality: 1,
			circle: true
		}).then(function(blob) {
			$.ajax({
				url: '../assets/system/controller.php',
				method: "post",
				cache: false,
				dataType: "text",
				data: {
					picture: blob
				},
				success: function(response) {
					$.toast({
						heading: "Notification",
						position: 'top-right',
						text: 'image changed successfully',
						hideAfter: false,
						icon: 'info'
					});
					setTimeout(function() {
						window.location.reload()
					}, 2000);
				}
			});
		});
	});

	function showPreview(objFileInput) {
		if (objFileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(e) {
				resize.bind({
					url: e.target.result,
				});
			}
			fileReader.readAsDataURL(objFileInput.files[0]);
		}
	}

	// function locate() {
		// if (navigator.geolocation) {
		// 	navigator.geolocation.getCurrentPosition(function(position) {
		// 		var currentLatitude = position.coords.latitude;
		// 		var currentLongitude = position.coords.longitude;
		// 		var id = '';
		// 		var currentLocation = { lat: currentLatitude, lng: currentLongitude, driver_id:id};
		// 		console.log(currentLocation);
				// $.ajax({
				// 	url: "../assets/system/controller.php",
				// 	method: "post",
				// 	cache: false,
				// 	dataType: "text",
				// 	data: currentLocation,
				// 	success: function(response) {
				// 		console.log(response);
				// 	}
				// });
		// 	});
		// }else{
		// 	alert('geolocation is not supported');
		// }
		// console.log('done')
		// setInterval(locate, 10000);
	// }
	
	
</script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- counterup -->
<script src="../assets/plugins/counterup/jquery.waypoints.min.js"></script>
<script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
<!-- vector map -->
<script src="../assets/plugins/jqvmap/jquery.vmap.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.russia.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.europe.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.germany.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../assets/plugins/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="../assets/js/pages/map/vector-data.js"></script>
<!-- data tables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
<script src="../cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="../cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="../assets/js/pages/table/table_data.js"></script>
<!-- material -->
<script src="../assets/plugins/material/material.min.js"></script>
<!-- animation -->
<script src="../assets/js/pages/ui/animations.js"></script>
<script src="../assets/plugins/jQuery-Knob/dist/jquery.knob.min.js"></script>
<script src="../assets/js/pages/chart/knob/knob_chart_data.js"></script>
<!-- sparkline -->
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- echart -->
<script src="../assets/plugins/echarts/echarts.js"></script>
<script src="../assets/js/pages/chart/chartjs/home-data2.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- dropzone -->
<script src="../assets/plugins/dropzone/dropzone.js"></script>
<script src="../assets/plugins/dropzone/dropzone-call.js"></script>
<!-- morris chart -->
<script src="../assets/plugins/morris/morris.min.js"></script>
<script src="../assets/plugins/morris/raphael-min.js"></script>
<script src="../assets/js/pages/chart/morris/morris_home_data.js"></script>
<script src="../assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="../assets/js/misc.js"></script>
<script type="text/javascript">
var current = document.URL.split('/');
var len = current.length;
if (current[len - 1] == "dashboard.php") {
    var sesh = sessionStorage.getItem('onlineStat') == ''?'online': sessionStorage.getItem('onlineStat');
    var sesh = sesh == 'online'?'offline':'online';
    $('#onlineBtn').html(`Go ${sesh}`);
}
</script>
</body>

</html>