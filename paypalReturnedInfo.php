<?php

$subscriptionID = $_GET['subscriptionID'];
$token = $_GET['access_token'];
if ($subscriptionID =="" OR $token =="") {
    header("location:../index.php");
}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.paypal.com/v1/billing/subscriptions/'.rawurlencode($subscriptionID));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer'.rawurlencode($token);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else {
    $response = json_decode($result);

var_dump($response);
/*
$status = $response->status;
$subscriberID = $response->id;
$PlanID = $response->plan_id;
$start_time = $response->start_time;
$status_update_time = $response->status_update_time;
$given_name = $response->subscriber->name->given_name;
$surname = $response->subscriber->name->surname;
$fullName = $given_name."".$surname;
$payment_email_address = $response->subscriber->email_address;


if ($status == 'ACTIVE' && $subscriptionID == $subscriberID) {

        header("Location: signUp.php?status=".$status);
        
        }
        else {
            header("Location: signUpAndPay.php?status=".$status);
        }
*/
}
curl_close($ch);
?>


