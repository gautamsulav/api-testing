<?php




$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,'http://skuninja.madeby.ws/logs.json');
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$query = curl_exec($curl_handle);
curl_close($curl_handle);

print_r($query);


?>