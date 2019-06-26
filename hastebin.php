<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://hastebin.com/documents",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $_GET['text'],
  CURLOPT_HTTPHEADER => array(
    "accept: application/json, text/javascript, */*; q=0.01",
    "cache-control: no-cache",
    "content-type: application/json; charset=UTF-8",
    "origin: https://hastebin.com",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36",
    "x-requested-with: XMLHttpRequest"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$response_array = json_decode($response,true);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response_array['key'];
  echo "https://hastebin.com/" . $response_array['key'];
}
