// testing code for SQL Anywhere web service used to receive Twilio SMS API callbacks

<html>
<head><title>ESP SMS Text Callback</title></head>
<body>

<?php
	//$url = 'http://localhost:8082/esp_sys/ws_sms_update';
 	//$url = 'https://postb.in/1589025567690-0301746302284';
 	$url = 'http://db1.kssc.com:8082/esp_sys/ws_sms_update';

	// proxy - message was sent
 	//$data = array('SmsSid' => 'SMeb5d0e32a76f46b9994af0ef54baff19', "SmsStatus" => "sent", "MessageStatus" => "sent", "To" => "+2487985578", "MessageSid" => "SMeb5d0e32a76f46b9994af0ef54baff19", "AccountSid" => "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "From" => "+15017122661", "ApiVersion" => "2010-04-01");

  	// proxy - message was delivered
  	$data = array('SmsSid' => 'SMeb5d0e32a76f46b9994af0ef54baff19', "SmsStatus" => "delivered", "MessageStatus" => "delivered", "To" => "+2487985578", "MessageSid" => "SMeb5d0e32a76f46b9994af0ef54baff19", "AccountSid" => "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "From" => "+15017122661", "ApiVersion" => "2010-04-01");

  	// proxy - message was undelivered
 	//$data = array('SmsSid' => 'SMeb5d0e32a76f46b9994af0ef54baff19', "Errorcode" => "30003", "SmsStatus" => "undelivered", "MessageStatus" => "undelivered", "To" => "+2487985578", "MessageSid" => "SM034666762fda487b81b5919e64a3ad37", "AccountSid" => "ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX", "From" => "+15017122661", "ApiVersion" => "2010-04-01");

 	$options = array(
 		'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data))
 	);

 	$context  = stream_context_create($options);
  	$result = file_get_contents($url, false, $context);
  	var_dump($result);
  
  	//$var_name1=678;
  	//echo ("<br>");
	//var_dump($var_name1);
 
?>

</body>
</html>
