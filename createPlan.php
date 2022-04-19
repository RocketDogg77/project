

<?php

//get plan ID page----


//get product id and access token from address bar
$ProductID = $_GET['ProductID'];
$token = $_GET['access_token'];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v1/billing/plans');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"name\": \"Quick forms subscription\",\n    \"description\": \"web services\",\n    \"product_id\": \"$ProductID\",\n    \"billing_cycles\": [\n        {\n            \"frequency\": {\n                \"interval_unit\": \"MONTH\",\n                \"interval_count\": 1\n            },\n            \"tenure_type\": \"REGULAR\",\n            \"sequence\": 1,\n            \"total_cycles\": 0,   \n            \"pricing_scheme\": {\n                \"fixed_price\": {\n                    \"value\": \"0.01\",\n                    \"currency_code\": \"GBP\"\n                }\n            }\n        }\n    ],\n    \"payment_preferences\": {\n        \"auto_bill_outstanding\": true,\n        \"payment_failure_threshold\": 1\n    }\n }");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '.rawurlencode($token);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo'Error:'.$err;
}
else {
    $response = json_decode($result);
    //var_dump($response);
    $PlanID = $response->id;
    //var_dump($PlanID);

    if ($PlanID) {
        header("Location: ../signUpAndPay.php?PlanID=".$PlanID."&access_token=".$token);
            exit();
        }
}


?>
