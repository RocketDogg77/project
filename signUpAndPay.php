

<?php
//get access token from address bar
$productID = 'PROD-1VD21802EL1529426';
$PlanID = 'P-3JV94050DK4169430MJG77MQ';
$token = $_GET['access_token'];
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html lang="en">
    
<head>

    <meta charset="utf-8">

    <title>Quick Forms sign up</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/login_styles.css">

    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="rgb(36, 131, 255)">
    <meta name="msapplication-TileColor" content="rgb(36, 131, 255)">
    <meta name="theme-color" content="rgb(36, 131, 255)">
    
     <script src="javascripts/date_update.js" defer></script> <!-- copyright date update -->

</head>
<body onload="mouseEvent();">
<audio id="click" src="audio/mouseClick.wav" preload="auto"></audio>

        <script src="https://www.paypal.com/sdk/js?client-id=AUYsMmq7-qoHApAcALfn0vOAIMrjSbZvImJaKioDqlK8aiUFi-xqB0g-IqL3ZOgbrHB3mRaclHXlLRv3&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
        <script> var token = '<?php echo $token; ?>'; </script> <!--convert token to js-->
        
<!--[if lt IE 7]> <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p> <![endif]-->
        
<div class="nav_wrapper">

    <div class="nav_bar">

        <div class="nav_bar_left">

            <a href="index.php">Home</a>

        </div>

        <div class="nav_bar_right">

            <?php
                    
                if (isset($_SESSION["userUid"])) {

                    echo "<a href='books_form.html'>Quick form</a>";
                    echo "<a href='emptyForm.html'>Empty form</a>";
                    echo "<a href='emptyPage.html'>Empty form2</a>";
                    echo "<a href='includes/logout.inc.php'>Logout</a>";
                    
                    } else {

                    echo "<a href='login.php'>Login</a>";
                    }

            ?>

        </div>

    </div>

</div>


<div class="payment_info_intro">

    <h2>Sign up for 12 months and get full access to our Quick forms</h2>

    <h2>Only £24.99</h2>


</div>


<div id="buttons_container">

  <div id="paypal-button"></div>

</div>


<script>
  paypal.Buttons({
      style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'subscribe'
        },

      createSubscription: function(data, actions) {
        return actions.subscription.create({
          /* Creates the subscription */
          plan_id: 'P-3JV94050DK4169430MJG77MQ'
        
        });
      },
           
            /* On Approval */
            onApprove: function(data, actions) {

            console.log(data);

                alert("Thanks for subscribing, your ID is " + data.subscriptionID); // optional success message for the subscriber here
                window.location = "php/paypalReturnedInfo.php?subscriptionID=" + data.subscriptionID + "&access_token=" + token;

            },

                /* Payment cancelled */
            onCancel: function(data) {

            alert(" Payment cancelled "); 

            }

        }).render('#paypal-button'); // Renders the PayPal button
    </script>
            


</body>
</html>

