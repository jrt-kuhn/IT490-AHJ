<?php
session_start(); 

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");


if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}


if (isset($_POST['login'])) {
	$request = array();
	$request['type']     = "Login";
	$request['username'] = $_POST["username"];
	$request['password'] = $_POST["password"];
	$request['message']  = $msg;
	
	$response = $client->send_request($request);
	//$response = $client->publish($request);
	echo "client received response: ".PHP_EOL;
	print_r($response);
	if ($response==0){
		echo "Something went wrong".PHP_EOL;	
	}
	if ($response != null){  
				
		$_SESSION['username'] = $request['username'];
      		$_SESSION['success'] = "Successfuly Logged in";
		header('location: index.php');
	}
}

?>

