
<?php
//get product ID page-----

//get acess token from address bar
$token = $_GET['access_token'];
$unique_id = md5(uniqid());

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v1/catalogs/products');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"name\": \"Quick forms access\",\n\n  \"description\": \"12 monthsaccess to quick forms\",\n  \"type\": \"services\",\n  \"category\": \"software\",\n  \"image_url\": \"https://example.com/streaming.jpg\",\n  \"home_url\": \"http://quick-forms.co.uk\"\n}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '.rawurlencode($token);
$headers[] = 'Paypal-Request-Id: '.rawurlencode($unique_id);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$result = curl_exec($ch);
curl_close($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else {

    $response = json_decode($result);
    //var_dump($response);
    $ProductID = $response->id;
    //var_dump($ProductID);
    
    if ($ProductID) {
    header("Location: createPlan.php?ProductID=".$ProductID."&access_token=".$token);
        exit();
    }

}

?>