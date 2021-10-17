(function($) {
    $.fn.easyAjax = function(page) {
        var settings = $.extend({
            page: page
        });
        var getFormData = new FormData(document.getElementById($(this).closest('form').attr('id')));
        var getEntries = getFormData.entries();
        var obj = getEntries.next();
        var url = page == undefined || page == '' ? '../assets/system/controller.php' : page;
        while (undefined !== obj.value) {
            let nam = $("input[name=" + obj.value[0] + "]").attr('type');
            if (nam == 'file' || nam == 'password') {
                if (nam == 'password') {
                    var hash = enc(obj.value[1], url);
                    getFormData.set(obj.value[0], hash);
                }
            } else {
                let type = obj.value[0];
                if (type == 'formsummernote' || type == 'formsummernote1' || type == 'passengerLocation' || type == 'passengeDestination' || type == 'passengePickUpDate') {
                    //console.log(type);
                } else {
                    let check = checkForSpecialChar(obj.value[1]);
                    getFormData.set(obj.value[0], check);
                }
            }
            obj = getEntries.next();
        }
        $.ajax({
            url: url,
            method: "post",
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
            data: getFormData,
            success: function(response) {
                if (response.output != '') {
                    var notifier = response.platform == "jqueryNotifier" ? notifyMe(response.msg, response.output) : notifyMe2(response.msg, response.output);
                    var redirect = response.redirect != '' ? setTimeout(function() { window.location.replace(response.redirect); }, 2000) : '';
                } else {
                    if (typeof response.msg === 'object') {
                        console.log(response);
                        checkIfRequestAnswered(response.msg.rid);
                    } else {
                        notifyMe3(response.msg);
                    }
                }
            }
        });
    };
}(jQuery));

const specialChars = "<>!#$%^&*()+[]{}?:;|'\"\\,/~`=";
var checkForSpecialChar = function(string) {
    string = string.split("");
    for (i = 0; i < specialChars.length; i++) {
        for (var j = 0; j < string.length; j++) {
            if (string[j].indexOf(specialChars)) {
                string[j] = string[j].replace(specialChars[i], '');
            }
        }
    }
    string = string.join("");
    string = string.replace(" ", '');
    return string;
};

var notifyMe = (msg, mode) => {
    $.toast({
        heading: 'Notification',
        text: msg,
        position: 'top-right',
        icon: mode,
        hideAfter: 5000,
        stack: 6
    });
};

var notifyMe2 = (msg, mode) => {
    var mess = mode == 'success' ? 'Alright!!!' : 'Sorry';
    swal(mess, msg, mode);
};
var enc = (val, url) => {
    var a = null;
    $.ajax({
        url: url,
        type: 'POST',
        async: false,
        dataType: 'json',
        data: { param1: val },
        success: function(data) {
            a = data;
        }
    })
    return a;
}

var notifyMe3 = (msg) => {
    swal(msg, {
        className: "black-bg",
        icon: "images/search.gif",
        closeOnClickOutside: false,
        button: false
    });
};

var notifyMe4 = (msg) => {
    swal("You've got a ride request", {
        text: "<br> " + msg.location + "&nbsp;<i class='fa fa-chevron-right'></i>" + msg.destination
    });
};

var checkIfRequestAnswered = (rid) => {
    $.ajax({
        url: "assets/system/controller.php",
        method: "post",
        cache: false,
        dataType: "json",
        beforeSend: notifyMe3("please wait while we get your ride..."),
        data: { checkIfRequestAnswered: rid },
        success: function(response) {
            console.log(response);
            response = JSON.parse(response);
            if (response[0].status == 'pending') {
                setTimeout(checkIfRequestAnswered(rid), 2000);
            } else {
                $.ajax({
                    url: "assets/system/controller.php",
                    method: "post",
                    cache: false,
                    dataType: "json",
                    data: { getDriverInformation: response[0].driver_id },
                    success: function(res) {
                        res = JSON.parse(res);
                        swal("alright", {
                                className: "black-bg",
                                icon: "success",
                                text: res[0].firstname + " is going to pick you up",
                            })
                            .then((value) => {
                                window.location.replace('trip.php?tid=' + rid);
                            });
                    }
                });

            }
        }
    });
};