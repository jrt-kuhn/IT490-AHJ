<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('mysqlconnect.php');


function doLogin($username,$password)
{
    $conn = mysqlconnect();
    $query = "SELECT * FROM userAccounts WHERE username= '$username' AND password= '$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1){
    	echo "Success";
    	return show($username);
    }else{
    	echo "seems to be the wrong username or password".PHP_EOL;
    	return false;
    }
}
?>
