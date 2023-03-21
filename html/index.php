<?php
session_start();
$uname = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Successfully Logged in!</title>
</head>
<body>
	<div class="Header">
		<h2> Success!</h2>
		<p> welcome </> <?php echo $uname;?>
	</div> 
</body>
</html>

