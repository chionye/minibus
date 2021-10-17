
var getOnlineDrivers = function(info){
	$('#onlineDrivers').html('');
	jQuery.ajax({
		url:'../assets/system/controller.php',
		method:"post",
		cache:false,
		dataType:"json",
		data:{getOnlineDrivers:1, info:info},
		success:function (response) {
			
			for (var i = 0; i < response.msg.length; i++) {
				var pic = response.msg[i].photo != ''? response.msg[i].photo: '../images/profile.png';
				$('#onlineDrivers').append($('<li>').append($('<div>').addClass('prog-avatar').append($('<img>').attr({'src':pic,'alt':'','width':'40','height':'40'}))).append($('<div>').addClass('details').append($('<div>').addClass('title').append($('<a>').attr({'href':'#'}).text())).append($('<div>').append($('<span>').addClass('mobileTxt').text(response.msg[i].firstname+" "+response.msg[i].lastname+" ").append($('<span>').addClass('mobileTxt').text(response.msg[i].phone))))));
			}
		}
	});
}


function deleteInfo(table,id,cond){
	$.ajax({
		url: "../assets/system/controller.php",
		method: "post",
		cache: false,
		dataType: "text",
		data: { delete: 1,deletetable:table,delId:id,delCond:cond },
		success: function(response) {
			$.toast({
				heading: "Notification",
				text: "delete successful",
				position: "top-right",
				icon: "info",
				hideAfter: 5000,
				stack: 6
			});
			setTimeout(function(){
				window.location.reload();
			})
		}
	});
}