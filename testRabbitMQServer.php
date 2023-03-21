#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

require_once('mysqlconnect.php');
//require_once('databaseFunctions.php');

function doLogin($username,$password)
{
    $conn = mysqlconnect();
    $query = "SELECT * FROM userAccounts WHERE username= '$username' AND password= '$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1){
    	echo "Success";
    	return $username;
    }else{
    	echo "seems to be the wrong username or password".PHP_EOL;
    	return false;
    }
}

function requestProcessor($request)
{
  echo "----------------------".PHP_EOL;
  echo $request['type'].PHP_EOL.PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return array ('message'=>"error: no such type");
  }
  switch ($request['type'])
  {
    case "Login":
      echo "\n";
      echo "Processing Login Info...".PHP_EOL;
      $responseMessage = doLogin($request['username'],$request['password']);
      break;
    case "validate_session":
      $responseMessage = doValidate($request['sessionId']);
      break;
      
  }
  //var_dump($responseMessage);
  return $responseMessage;


}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");


echo "server start".PHP_EOL;
$server->process_requests('requestProcessor');
echo "server done".PHP_EOL;
exit();
?>

