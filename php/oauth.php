<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://developer.api.autodesk.com/authentication/v1/authenticate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "client_id={YOUR_CLIENT_ID}&client_secret={YOUR_CLIENT_SECRET}&grant_type=client_credentials&scope=data%3Aread%20data%3Awrite%20data%3Acreate%20data%3Asearch%20bucket%3Acreate%20bucket%3Aread%20bucket%3Aupdate%20bucket%3Adelete%20account%3Aread%20account%3Awrite%20code%3Aall&=",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/x-www-form-urlencoded"
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

?>