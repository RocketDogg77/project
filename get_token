


<?php


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-m.paypal.com/v1/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_USERPWD, 'AUYsMmq7-qoHApAcALfn0vOAIMrjSbZvImJaKioDqlK8aiUFi-xqB0g-IqL3ZOgbrHB3mRaclHXlLRv3' . ':' . 'EGoDPL6HYU2nt6XvFYzjVBWyhvhGG89bas79K93npYFys_CGx71lm5dSyH3Zq-7P--kYIXF94mDtax-c');

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en_GB';
$headers[] = 'Content-Type: application';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else {

    $response = json_decode($result);
    //var_dump($response);
    $access_token = $response->access_token;
    var_dump($access_token);
/*
    if ($access_token) {
        header("Location: createProduct.php?access_token=" . $access_token);
        
    }
*/

}
curl_close($ch);
