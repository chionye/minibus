$(document).ready(function($) {
	$(document).on('submit', '#addAdmin', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#editAdmin', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#fare', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#editCoupons', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#passDetails', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});

	$(document).on('submit', '#generateCoupons', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	// $(document).on('submit', '#addDriver', function(event) {
            // 	event.preventDefault();
            // 	$(this).easyAjax();
            // });

	$(document).on('submit', '#editDriver', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#editAccount', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#addAccount', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#passengerSignUp', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});

	$(document).on('submit', '#passengerLogin', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});

	$(document).on('submit', '#DriverLoginPage', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});

	$(document).on('submit', '#driverSignUp', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});

	$(document).on('submit', '#passengerBookingForm', function(event) {
		event.preventDefault();
		$(this).easyAjax("assets/system/controller.php");
	});
	
	$(document).on('submit', '#addDriverVehicles', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#EditPassenger', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#terms', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#adminLogin', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('submit', '#changePass', function(event) {
		event.preventDefault();
		$(this).easyAjax();
	});

	$(document).on('click', '#accept', function(event) {
		event.preventDefault();
		var drv = $('#drv').val();
		var id = document.getElementById('trip_id').innerHTML;
		var tid = $('#tid').val();
		$.ajax({
			url: '../assets/system/controller.php',
			type: 'post',
			dataType: 'text',
			beforeSend: function(){document.getElementById('accept').disabled = true;$('#accept').html('accepting...');},
			data: {takeRideRequest: 'booked',drv:drv, id:id, rid:tid},
			success:function (res) {
				var res = JSON.parse(res);
				$.toast({
					heading: 'Notification',
					text: res.msg,
					position: 'top-right',
					icon: res.output,
					hideAfter: 5000, 
					stack: 6
				});
				setTimeout(function (argument) {
					document.getElementById('accept').disabled = false;
					$('#accept').attr({id: 'cancel'}).html('cancel request');
				}, 3000);
			}
		})
	});

	$(document).on('click', '#cancel', function(event) {
		event.preventDefault();
		var tid = $('#tid').val();
		var drv = $('#drv').val();
		$.ajax({
			url: '../assets/system/controller.php',
			type: 'post',
			dataType: 'text',
			beforeSend: function(){document.getElementById('cancel').disabled = true;$('#cancel').html('cancelling...');},
			data: {rejectRideRequest: 'cancelled',rid:tid, drv:drv},
			success:function (res) {
				var res = JSON.parse(res);
				$.toast({
					heading: 'Notification',
					text: res.msg,
					position: 'top-right',
					icon: res.output,
					hideAfter: 5000, 
					stack: 6
				});
				setTimeout(function (argument) {
					document.getElementById('cancel').disabled = false;
					$('#accept').attr({id: 'accept'}).html('accept request');
				}, 3000);
			}
		})
	});
});
function checkPasswordStrength(){
	var passArr = $('#defaultRegisterFormPassword').val().split("");
	var arr = ["ABCDEFGHIJKLMNOPQRSTUVWXYZ","<>!#$%^&*()+[]{}?:;@|'\"\\,/~`=","0123456789"];
	var check = {};
	for (var i = 0; i < arr.length; i++){
		var indArray = arr[i];
		for (var j = 0; j < indArray.length; j++) {
			for (var k = 0; k < passArr.length; k++){
				if(passArr.includes(indArray[j])){
					check[i] = indArray[j];
				}
			}
		}
	}
	switch(Object.getOwnPropertyNames(check).length){
		case 0:
		$('.passStrength').html('Passwords must have at least 1 uppercase letter, 1 special character, 1 number and must be more than 5 characters');
		$('#signBtn').attr({'disabled':"disabled"});
		break;
		case 1:
		$('.passStrength').html('Password Strength: Weak');
		$('#signBtn').attr({'disabled':"disabled"});
		break;
		case 2:
		$('.passStrength').html('Password Strength: Medium');
		$('#signBtn').attr({'disabled':"disabled"});
		break;
		case 3:
		$('.passStrength').html('Password Strength: Strong');
		document.getElementById('signBtn').disabled = false;
		break;
		default:
		$('.passStrength').html('Passwords must have at least 1 uppercase letter, 1 special character, 1 number and must be more than 5 characters');
		$('#signBtn').attr({'disabled':"disabled"});
	}
}