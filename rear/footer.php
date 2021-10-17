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
<?php $page_img = isset($sql->photo)?$sql->photo:'';?>
<!-- start js include path -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/popper/popper.min.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- notifications -->
<script src="../assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="../assets/js/easy-ajax.js"></script>
<script src="../assets/js/formHandler.js"></script>
<script src="../assets/js/page-control.js"></script>
<script type="text/javascript">
	setInterval(function(){getOnlineDrivers('onlineDriver')},10000);
</script>
<!-- counterup -->
<script src="../assets/plugins/counterup/jquery.waypoints.min.js"></script>
<script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- Common js-->
<script src="../assets/js/app.js"></script>
<script src="../assets/js/layout.js"></script>
<script src="../assets/js/theme-color.js"></script>
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
<script src="../assets/js/pages/material_select/getmdl-select.js"></script>
<!-- animation -->
<script src="../assets/js/pages/ui/animations.js"></script>
<script src="../assets/plugins/jQuery-Knob/dist/jquery.knob.min.js"></script>
<script src="../assets/js/pages/chart/knob/knob_chart_data.js"></script>
<!-- summernote -->
<script src="../assets/plugins/summernote/summernote.min.js"></script>
<script src="../assets/js/pages/summernote/summernote-data.js"></script>
<!-- morris chart -->
<script src="../assets/plugins/morris/morris.min.js"></script>
<script src="../assets/plugins/morris/raphael-min.js"></script>
<script src="../assets/js/pages/chart/morris/morris_home_data.js"></script>
<!-- sparkline -->
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- echart -->
<!-- <script src="../assets/plugins/echarts/echarts.js"></script> -->
<script src="../assets/js/pages/chart/chartjs/home-data2.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- dropzone -->
<script src="../assets/plugins/dropzone/dropzone.js"></script>
<script src="../assets/plugins/dropzone/dropzone-call.js"></script>
<script src="../assets/js/fontawesome-markers.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap" async defer></script>
<script type="text/javascript">
	var map;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-layer'), {
			zoom: 8,
			center: new google.maps.LatLng(9.081999, 8.675277),
			mapTypeId: 'roadmap'
		});
	}

	var dude = [{
		lat: 9.081999,
		lng: 8.675277
	},
	{
		lat: 7.369722,
		lng: 12.354722
	}
	];

	// Loop through the results array and place a marker for each
	// set of coordinates.
	setTimeout(() => {
		for (var i = 0; i < dude.length; i++) {
			console.log(dude[i].lat, dude[i].lng);
			var latLng = new google.maps.LatLng(dude[i].lat, dude[i].lng);
			var marker = new google.maps.Marker({
				position: latLng,
				map: map,
				icon: {
					path: fontawesome.markers.CAR,
					scale: 0.5,
					strokeWeight: 0.8,
					strokeColor: 'black',
					strokeOpacity: 1,
					fillColor: '#f8ae5f',
					fillOpacity: 0.9,
				},
				clickable: false,
			});
		}
	}, 5000) 
</script>
<script src = "../assets/plugins/croppie/croppie.js"></script>
<script>
	var current = document.URL.split('/');
      var len = current.length;
      if(current[len-1].indexOf("add_driver.php") != -1){
        console.log('here');
        var img = '<?=$page_img?>' == ''?'../images/profile.png':'<?=$page_img?>';
        var el = document.getElementById('resizer-demo');
        var resize = new Croppie(el, {
            viewport: { width: 100, height: 100, type:'circle' },
            boundary: { width: 300, height: 300 },
            showZoomer: true,
            enableResize: true,
            enableOrientation: true,
            mouseWheelZoom: 'ctrl'
          });
          resize.bind({
            url: img,
          });
      }

      function processNewData(name) {
      	resize.result({
			type: 'blob',
			size: {
				width: 370,
				height: 370
			},
			format: 'png',
			quality: 1,
			circle: true
		}).then(function(blob) {
			var form = new FormData(document.getElementById(name));
			form.append('uploadBtn', blob);
			$.ajax({
				url: '../assets/system/controller.php',
				method: "post",
				cache: false,
				dataType: "json",
				processData:false,
				contentType:false,
				data: form,
				success: function(response) {
					console.log(response);
					if (response.output == 'success') {
						$.toast({
						heading: "Notification",
						position: 'top-right',
						text: 'operation successfully',
						hideAfter: 6000,
						icon: 'info'
						});
					}else{
						$.toast({
						heading: "Notification",
						position: 'top-right',
						text: response.msg,
						hideAfter: 6000,
						icon: 'error'
						});
					}
					
					// setTimeout(function() {
					// 	window.location.reload();
					// }, 2000);
				}
			});
		});
      }
	jQuery(document).on('click', '#submitPic', function(event) {
		
	});

	jQuery(document).on('submit', '#addDriver1', function(event) {
		event.preventDefault();
		processNewData('addDriver1');
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

	 function showCImgPreview(objFileInput) {
        if (objFileInput.files[0]) {
          var fileReader = new FileReader();
          fileReader.onload = function (e) {
            resize.bind({
              url: e.target.result,
            });
          }
          fileReader.readAsDataURL(objFileInput.files[0]);
        }
      }
      function openDialogBox() {
      	$('#customOPenFile').click();
      }
</script>
</body>

</html>