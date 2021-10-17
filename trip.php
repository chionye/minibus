<?php include_once 'header.php'; ?>
<?php
use \minibus\Service\StripePayment;

if (!empty($_POST["token"])) {
    require_once 'stripe/StripePayment.php';
    $stripePayment = new StripePayment();
    
    $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);
   
    $amount = $stripeResponse["amount"] /100;
    
    $param_type = 'tfare';
    $param_value_array = array(
        $_POST['email'],
        trim($_POST['rideId']),
        $amount,
        $stripeResponse["currency"],
        $stripeResponse["balance_transaction"],
        $stripeResponse["status"],
        json_encode($stripeResponse)
    );
    $tid = trim($_POST['rideId']);
    $table = "tbl_payment";$fields = array('email', 'item_number', 'amount', 'currency_code', 'txn_id', 'payment_status', 'payment_response');
    $query = $obj->insert($table, $fields, $param_value_array);
    
    if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {
        $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $stripeResponse["balance_transaction"];
        header("location:trans.php?p=0&id=0&rid='$tid'");
    }
}

if (isset($_GET['tid'])) {
    $tid = $_GET['tid'];
    $get = json_decode($obj->getRideDetails('getRideDets', $tid, '', rd));
    $res = $get[0];
    $get2 = json_decode($obj->getRideDetails('driverDetails', $res->driver_id, '', drv));
    $res2 = $get2[0];
    $get3 = json_decode($obj->getRideDetails('passDetails', $res->customer_id, '', mt));
    $res3 = $get3[0];
    $get4 = json_decode($obj->getRideDetails('percetage', '', '', per));
    $res4 = $get3[0];
    $latlng = explode("/", $res2->driver_location);
    $t1 = (float) $latlng[0];
    $t2 = (float) $latlng[1];
    $lng = ["lat" => $t1, "lng" => $t2];
    $dec = $lng;
    $latnlng = json_encode($dec);
}
?>
<div class="top-bar_sub_mini container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-5 col-6 text-left">
            <a class="index.php" href="index.php">
                <i class="material-icons f-left m-icon text-dark">arrow_back</i>
            </a>
        </div>
        <div class="col-md-4 col-sm-2 logo d-md-block d-sm-none d-none">
            <a class="" href="javascript:void(0);">
                <img src="images/minibus.png" style="width:50%;">
            </a>
        </div>
        <div class="col-md-4 col-sm-5 col-6 text-right">
            <div class="dropdown show">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle fa-2x"></i>
                </a>
                <div class="dropdown-menu bg-light card-background-image shadow" aria-labelledby="dropdownMenuLink">
                    <?php
                    if (isset($_SESSION['uid'])) {
                        ?>
                        <h6 class="dropdown-header  text-dark">Hello, User</h6>
                        <a class="dropdown-item text-dark" href="profile.php">Profile</a>
                        <a class="dropdown-item text-dark" href="logout.php">Logout</a>
                        <?php
                    } else {
                        ?>
                        <h6 class="dropdown-header  text-dark">Hello, User</h6>
                        <a class="dropdown-item text-dark" href="login.php">Login</a>
                        <a class="dropdown-item text-dark" href="signup.php">SignUp</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map" class="rounded"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12 center-card">
        <div class="card shadow">
            <div class="card-header bg-info">
                <img src="images/drive.png" alt="">
                <h3 class="h2 text-white text-left">Ride Details</h3>
            </div>
            <div class="card-body">
                <div class="trip-deets">
                    <p class="blockquote"><span><i class="fas fa-street-view" style="color: #00bce4"></i></span>&nbsp;Pick Up: <span id="from"></span></p>
                    <p class="blockquote"><span><i class="fas fa-map-marker-alt" style="color: #00bce4"></i></span>&nbsp;Drop off: <span id="to"></span></p>
                    <p class="blockquote"><span><i class="fas fa-taxi" style="color: #00bce4"></i></span>&nbsp;Driver Name: <span id="drv"><?=$res2->firstname?> <?=$res2->lastname?></span></p>
                    <p class="blockquote"><span><i class="fa fa-dollar-sign" style="color: #00bce4"></i></span>&nbsp;Fare Estimate: <span>&euro;<?=$res->fare?></span></p>
                    <div class="text-right">
                        <button class="btn btn-info" id="cancel_trip">cancel trip</button>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <p class="text-right" id="eta"></p>
            </div>
        </div>
    </div>
</div>
<!-- Default form register -->
<div class="entire-page mt-2">
    <div class="foots" style="height: 200px;"></div>
    <p class="text-muted text-right pos-txt"><a href="index.php"><img src="images/minibus.png" class="logobottom"></a></p>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose payment method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <p class="lead m-2 payWhat">You are paying &euro;<?=$res->fare?></p>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Pay with Stripe
            </button>
        </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card">
            <div class="card-body">
                <form  id="frmStripePayment" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Card Holder Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Draco Malfoy" required value="<?=$res3->first_name?> <?=$res3->lastname?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="example@gmail.com" value="<?=$res3->email?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Card Number</label>
                    <input type="text" class="form-control" id="card-number" name="card-number" required placeholder=".... .... .... ....">
                  </div>
                  <div class="row no-gutters">
                      <div class="col-md-3 col-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Month</label>
                            <select class="form-control" name="month" id="month">
                              <option>MM</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-3 col-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Year</label>
                            <select class="form-control" name="year" id="year">
                            </select>
                          </div>
                      </div>
                       <div class="col-md-3 col-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">CVV</label>
                            <input type="password" class="form-control" id="cvv" name="cvv" required placeholder="...">
                          </div>
                      </div>
                  </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name='currency_code' onchange="calcMoney()" id="exampleRadios1" value="eur" checked>
                      <label class="form-check-label" for="exampleRadios1">
                        EUR
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name='currency_code' onchange="calcMoney()" id="exampleRadios2" value="usd">
                      <label class="form-check-label" for="exampleRadios2">
                        USD
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name='currency_code' onchange="calcMoney()" id="exampleRadios3" value="gbp">
                      <label class="form-check-label" for="exampleRadios3">
                       GBP
                      </label>
                    </div>
                  <input type='hidden' name='amount' id="stripeAmt" value='<?=$res->fare?>'>
                  <input type='hidden' name='item_name' value='Test Product'>
                <input type='hidden' name='rideId'
                    value='<?=$tid?>'>
                 <div class="text-center">
                      <button type="submit" class="btn btn-info" onClick="stripePay(event);">Pay now</button>
                 </div>
                  <div id="loader">
                        <img alt="loader" src="images/LoaderIcon.gif">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
<!-- <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0"> -->
        <!-- <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Pay with Rave
        </button> -->
  <!--   </h5>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
  <div class="card-body">
    <div class="text-center">
        <form id="payWithPaystack">
            <div class="form-group">
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?=$res->fare?>">
                <input type="text" name="fname" hidden="hidden" value="<?=$res3->first_name?> <?=$res3->lastname?>">
                <input type="email" name="email" hidden="hidden" value="<?=$res3->email?>">
                <input type="text" name="trip_id" hidden="hidden" value="<?=$res->trip_id?>">
                <input type="text" name="drv_id" hidden="hidden" value="<?=$res2->id?>">
                <input type="text" name="pass_id" hidden="hidden" value="<?=$res->customer_id?>">
                <input type="text" name="per" hidden="hidden" value="<?=$res4->percetage?>">
                <input type="text" name="phone" hidden="hidden" value="<?=$res3->phone?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Country</label>
                <select class="form-control" id="country">
                    <option>Select Country</option>
                    <option value="DZD">Algeria</option>
                    <option value="AOA">Angola</option>
                    <option value="XOF">Benin</option>
                    <option value="BWP">Botswana</option>
                    <option value="XOF">Burkina Faso</option>
                    <option value="XOF">Burundi</option>
                    <option value="XAF">Cameroon</option>
                    <option value="XAF">Cape Verde</option>
                    <option value="XAF">Central African Republic</option>
                    <option value="XAF">Chad</option>
                    <option value="KMF">Comoros</option>
                    <option value="XAF">Congo</option>
                    <option value="CDF">Democratic Republic of the Congo</option>
                    <option value="DJF">Djibouti</option>
                    <option value="EGP">Egypt</option>
                    <option value="CFA">Equatorial Guinea</option>
                    <option value="ERI">Eritrea</option>
                    <option value="ETB">Ethiopia</option>
                    <option value="XAF">Gabon</option>
                    <option value="GMD">Gambia</option>
                    <option value="GHS">Ghana</option>
                    <option value="XAF">Guinea</option>
                    <option value="XOF">Guinea-Bissau</option>
                    <option value="XOF">Ivory Coast</option>
                    <option value="KES">Kenya</option>
                    <option value="LSL">Lesotho</option>
                    <option value="LRD">Liberia</option>
                    <option value="MGA">Madagascar</option>
                    <option value="MWK">Malawi</option>
                    <option value="XOF">Mali</option>
                    <option value="MRU">Mauritania</option>
                    <option value="MUR">Mauritius</option>
                    <option value="MAD">Morocco</option>
                    <option value="MZN">Mozambique</option>
                    <option value="NAD">Namibia</option>
                    <option value="XOF">Niger</option>
                    <option value="NGN">Nigeria</option>
                    <option value="RWF">Rwanda</option>
                    <option value="STN">Sao Tom and Principe</option>
                    <option value="XOF">Senegal</option>
                    <option value="SCR">Seychelles</option>
                    <option value="SLL">Sierra Leone</option>
                    <option value="ZAR">South Africa</option>
                    <option value="SDG">Sudan</option>
                    <option value="SZL">Swaziland</option>
                    <option value="TZS">Tanzania</option>
                    <option value="XOF">Togo</option>
                    <option value="TND">Tunisia</option>
                    <option value="UGX">Uganda</option>
                    <option value="GBP">United Kingdom</option>
                    <option value="USD">United States</option>
                    <option value="ZMW">Zambia</option>
                </select>
            </div>
            <button type="button" class="btn btn-info shadow" name="submit" onclick="payWithRave()">Pay</button>
        </form>
        <img src="images/cardRAVE.png">
    </div>
</div>
</div>
</div> -->
<!-- <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Pay from Balance
      </button>
  </h5>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
  <div class="card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div> -->
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<script src="main/js/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
<script type="text/javascript" src="main/js/bootstrap.js"></script>
<script src="assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script>
    var dest = '<?= $res->location ?>';
    var dest1 = '<?= $res->destination ?>';
    var orig = JSON.parse('<?= $latnlng ?>');

    function init() {

        var chicago = new google.maps.LatLng(41.850033, -87.6500523);
        var mapOptions = {
            zoom: 7,
            center: chicago
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    }

    function calcRoute(directionsService, directionsRenderer) {
        var start = '<?= $res->location ?>';
        var end = '<?= $res->destination ?>';
        var request = {
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        };
        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);
            }
        });
    }

    var mapOut;
    function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var service = new google.maps.DistanceMatrixService;
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 55.53,
                lng: 9.4
            },
            zoom: 10
        });
        var mapOut = map;
        var destinationIcon = "https://img.icons8.com/cotton/64/000000/london-cab-front-view.png";
        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById('directionsPanel'));
        setTimeout(calcRoute(directionsService, directionsRenderer), 2000);
        service.getDistanceMatrix({
            origins: [orig],
            destinations: [dest, dest1],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function(response, status) {
            if (status !== 'OK') {
                alert('Error was: ' + status);
            } else {
                drvPos(orig, map, destinationIcon);
                console.log(response);
                var originList = response.originAddresses;
                var destinationList = response.destinationAddresses;
                var eta = document.getElementById('eta');
                var from = document.getElementById('from');
                var to = document.getElementById('to');
                from.innerHTML = '';
                to.innerHTML = '';
                for (var i = 0; i < originList.length; i++) {
                    var results = response.rows[i].elements;
                    eta.innerHTML += "<i class='fas fa-clock'></i> Your driver is " + response.rows[0].elements[0].duration.text + " away";
                    for (var j = 0; j < results.length; j++) {
                        from.innerHTML += destinationList[j];
                        j++;
                        to.innerHTML += destinationList[j];
                        break;
                    }
                }
            }
        });
    }

    function drvPos(orig, map, destinationIcon) {
        $.ajax({
            type: "post",
            url: "assets/system/controller.php",
            data: {getDriverInformation:'<?=$res2->id?>'},
            dataType: "json",
            success: function (response) {
                let res = $.trim(response[0].driver_location);
                let str = res.split('/');
                let pos = {lat:parseFloat(str[0]),lng:parseFloat(str[1])};
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: '<?= $res2->firstname ?>',
                    icon: destinationIcon
                });
            }
        });

    }
    (function (argument) {
        setInterval(drvPos(orig, mapOut, "https://img.icons8.com/cotton/64/000000/london-cab-front-view.png"), 2000);
    })
</script>
<script src="assets/js/formHandler.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY ?>&libraries=places&callback=initMap" async defer></script>
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
            touchDrag: true,
            responsiveClass: true,
            items: 1,
            nav: true,
            navText: [
            "<i class='material-icons'>arrow_back</i>",
            "<i class='material-icons'>arrow_forward</i>"
            ]
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
    $(document).ready(function() {
        $('#nav-icon2').click(function() {
            $(this).toggleClass('open');
        });
    });

    function checkRideStat() {
        $.ajax({
            url: 'assets/system/controller.php',
            type: 'post',
            dataType: 'json',
            data: {areWeThereYet: '<?=$tid?>'},
            success:function (res) {
                console.log(res);
                if (res[0].status == 'completed') {
                 $('#cancel_trip').attr({
                    'id':'payFare',
                    'data-toggle':'modal',
                    'data-target':'#exampleModal'
                }).html('pay now');
                    // getDriverExperience();
                    // console.log('done');
                    stopTimer();
                }
                if (res[0].status == 'in transit') {
                    $('#cancel_trip').attr({
                        'id':'payFare',
                        'data-toggle':'modal',
                        'data-target':'#exampleModal'
                    }).html('pay now');    
                }
            }
        });
    }
    // var stars;
    // var getDriverExperience = () => {
    //     $(function() {
    //         var that = this;
    //         var toolitup = $("#jRate").jRate({
    //             rating: 2,
    //             strokeColor: 'black',
    //             precision: 0.5,
    //             minSelected: 1,
    //             width: 30,
    //             height: 30,
    //             onSet: function(rating) {
    //                 stars = rating;
    //             }
    //         });
    //     });

    //     swal({
    //         title: "",
    //         text: "",
    //         html: true,
    //         type: "info",
    //         showCancelButton: true,
    //         closeOnConfirm: false,
    //         showLoaderOnConfirm: true,
    //     }, function() {

    //     });
    // }
    var areWeThereYet = setInterval(checkRideStat,3000);
    var stopTimer = ()=>{clearInterval(areWeThereYet)};

    var arr = new Date(new Date().setFullYear(new Date().getFullYear() + 5)).toString();
    arr = parseInt(arr.split(' ')[3]);
    var val = '';
    for (var i = 5; i >= 0; i--) {
        val += `<option>${arr - i}</option>`;
    }
    $('#year').html(`<option>YY</option>${val}`);
    function cardValidation () {
    var valid = true;
    var name = $('#name').val();
    var email = $('#email').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvv').val();

    $("#error-message").html("").hide();

    if ($.trim(name) == "") {
        valid = false;
    }
    if ($.trim(email) == "") {
           valid = false;
    }
    if ($.trim(cardNumber) == "") {
           valid = false;
    }

    if ($.trim(month) == "") {
            valid = false;
    }
    if ($.trim(year) == "") {
        valid = false;
    }
    if ($.trim(cvc) == "") {
        valid = false;
    }

    if(valid == false) {
        swal('sorry!!!', 'all fields required','error')
    }

    return valid;
}
//set your publishable key
Stripe.setPublishableKey("<?php echo STRIPE_PUBLISHABLE_KEY; ?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
       swal('sorry!!!',response.error.message,'error').show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        Stripe.createToken({
            number: $('#card-number').val(),
            cvc: $('#cvv').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    }
}
</script>
<script src="assets/plugins/star/jRate.min.js"></script>
<!-- <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> -->
<script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<!-- <script src="https://js.paystack.co/v1/inline.js"></script> -->
<script src="assets/js/payment.js"></script>
<script type="text/javascript">
    function calcMoney() {
        var name = $("input[name = currency_code]:checked").val().toUpperCase();
        $.ajax({
            url: 'https://openexchangerates.org/api/latest.json?app_id=2abafaa1e4614684bb53e49ea8792d80',
            type: 'GET',
            dataType: 'json',
            success:function (data) {
                var curr = "";
                console.log(name);
                if (name == "USD") {
                    var val = Math.ceil(14/data.rates.EUR)
                    var sign = "&dollar;";
                }
                if (name == "GBP") {
                    var val = Math.ceil(14/data.rates.EUR * data.rates.GBP);
                    var sign = "&#163;";
                }
                if (name == "EUR") {
                    var val = Math.ceil(parseInt('<?=$res->fare?>'));
                    var sign = "&euro;";
                }
                $("#stripeAmt").val(val);
                $(".payWhat").html(`You are paying ${sign}${val}`);
            }
        });
    }
</script>
</body>
</html>