<?php 
if (isset($_GET['id'])) {
 $id = $_GET['id'];
 $tid = $_GET['rid'];
 $track = $_GET['p'];
}else{
    header('location:index.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank you for riding with us-minibusexpress</title>
    <link rel=stylesheet type=text/css href="css/app.css">
    <link rel=stylesheet type=text/css href="css/overrides.css">
    <link rel="stylesheet" href="main/css/bootstrap.css">
    <link href="assets/plugins/sweet-alert/sweetalert.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    $check = $track == '1'?(object)["icon"=>"success","header"=>"Alright!!!","msg"=>"Your test transaction has been successfully processed"]:(object)["icon"=>"success","header"=>"Alright!!!","msg"=>"Your test transaction has been successfully processed"];
    ?>
    <div class="wrapper">
        <div class="response container">
            <div class="content">
                <div class="icon">
                    <img src="images/<?php echo($check->icon)?>.svg" alt="">
                </div>

                <h1><?php echo($check->header)?></h1>
                <section>
                    <p><?php echo($check->msg)?></p>
                </section>
                <section>
                    <a class="button primary back" href="index.php">
                        <span>Go Back Home</span>
                    </a>
                </section>
            </div>
        </div>
    </div>

    <aside class="drawer dark">
        <header>
            <div class="content compact">
                <h3>User Review</h3>
            </div>
        </header>

        <article class="content compact" id="contents">
            <section>
                <form>
                    <fieldset>
                        <legend>
                            <h5 class="text-center h5">What did you think of the ride?</h5>
                        </legend>
                        <div id='jRate' class="text-center"></div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="text-white">Comment</label>
                            <textarea class="form-control bg-dark text-white" id="comment" rows="3"></textarea>
                        </div><!-- 
                        <div class='form-group'>
                            <textarea class='form-control' id='comment' rows='10' style="width: 100%"></textarea>
                        </div> -->
                    </fieldset>
                    <button class="btn button" type="button" onclick="rate()">submit</button>
                </form>
            </section>
        </article>
    </aside>
    <script src="main/js/jquery.min.js"></script>
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugins/star/jRate.min.js"></script>
    <script type="text/javascript">
        var stars;
        (function() {
            var toolitup = $("#jRate").jRate({
                rating: 1,
                strokeColor: 'black',
                precision: 0.5,
                minSelected: 1,
                width: 30,
                height: 30,
                onSet: function(rating) {
                    stars = rating;
                }
            });
        })();
        function rate() {
            var comment = $('#comment').val();
            $.ajax({
                type: "post",
                url: "assets/system/controller.php",
                data: {
                    passStarRating: stars,
                    comment: comment,
                    tid: '<?=$tid?>'
                },
                dataType: "text",
                success: function(response) {
                    console.log(response);
                    setTimeout(function() {
                        $('#contents').html('<div class="text-white text-center"><p class="lead">Your review has been submitted</p></div>');
                    }, 2000);
                }
            });
        }
    </script>
</body>
</html>