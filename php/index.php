<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://developer.api.autodesk.com/project/v1/hubs?filter[extension.type]=hubs:autodesk.bim360:Account",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer YOUR_ACCESS_TOKEN",
    "Cache-Control: no-cache",
    "Content-Type: application/vnd.api+json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$curl_info = curl_version();
echo $curl_info['ssl_version']. "\n";

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}