    // function payWithPaystack() {
    //   var email = jQuery('input[name=email]').val();
    //   var fname = jQuery('input[name=fname]').val();
    //   var trip = jQuery('input[name=trip_id]').val();
    //   var amount = jQuery('input[name=amount]').val();
    //   console.log(amount,email,fname,trip);
    //   var handler = PaystackPop.setup({
    //     key: 'pk_test_dca5b77edb197ab7d1f958b73bc20fef6aa84983',
    //     email:email ,
    //     amount: parseInt(amount)+"00",
    //     currency: "NGN",
    //     metadata: {
    //      custom_fields: [
    //      {
    //       display_name: "full name",
    //       variable_name: "full_name",
    //       value: fname
    //     },
    //     {
    //       display_name: "email",
    //       variable_name: "email",
    //       value: email
    //     },
    //     {
    //       display_name: "trip id",
    //       variable_name: "trip_id",
    //       value: trip
    //     }
    //     ]
    //   },
    //   callback: function(response){
    //     // alert('success. transaction ref is ' + response.reference);
    //     setTimeout(function () {
    //       num = 2;
    //       window.location.href="trans.php?id="+response.reference+"&rid="+trip+"&p="+num;
    //     }, 2000);
    //   },
    //   onClose: function(){
    //     // alert('window closed');
    //   }
    // });
    //   handler.openIframe();
    // }

    const API_publicKey = "FLWPUBK_TEST-fc806e20fa4895a2c7d400bcd5af1930-X";

    function payWithRave() {
      var email = jQuery('input[name=email]').val();
      var fname = jQuery('input[name=fname]').val();
      var trip = jQuery('input[name=trip_id]').val();
      var amount = jQuery('input[name=amount]').val();
      var drvId = jQuery('input[name=drv_id]').val();
      var passId = jQuery('input[name=pass_id]').val();
      var phone = jQuery('input[name=phones]').val();
      var country = jQuery('#country').val();
      var per = parseInt(jQuery('input[name=per]').val());
      var ref = "rave-"+trip;
      var ravePer = (100-per)/100;
      var x = getpaidSetup({
        PBFPubKey: API_publicKey,
        customer_email:email,
        amount: amount,
        customer_phone:phone,
        customer_firstname: fname,
        currency: country,
        txref: ref,
        subaccounts: [
        {
            id: "RS_D87A9EE339AE28BFA2AE86041C6DE70E",
            transaction_charge_type: "percetage",
            transaction_charge: ravePer
        }
        ],
        meta: [{
            metaname: "T-fare",
            metavalue: trip
        }],
        onclose: function() {},
        callback: function(response) {
          var txref = response.tx.txRef; // collect txRef returned and pass to a          server page to complete status check.
          console.log("This is the response returned after a charge", response);
          if (
            response.tx.chargeResponseCode == "00" ||
            response.tx.chargeResponseCode == "0"
            ) {
            var calc = per  * amount /100;
        var tax = calc.toFixed(2);
        $.ajax({
            url: 'assets/system/controller.php',
            type: 'post',
            dataType: 'json',
            data: {fname:fname,amount:amount,passId:passId,email:email,trip:trip,drvId:drvId,transId:ref,tax:tax},
            success:function (res) {
                console.log(res);
                var num = 2;
                window.location.href="trans.php?id="+ref+"&rid="+trip+"&p="+num;
            }
        });
    } else {
        swal('sorry','payment didnt go through, please try other mediums','error');
    }
          x.close(); // use this to close the modal immediately after payment.
      }
  });
  }