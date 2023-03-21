<?php 
if (isset($_POST['login'])) {
include('clientFunctions.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <div class="Header">
	<h2> Log In</h2>
  </div> 
	 
  <form method="POST" action="login.php">
  	
    <div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username">
  	</div> 
    <div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
      
    <div class="input-group">
  		<button type="submit" class="btn" name="login">Login</button>
  	</div>
  </form>
</body>
</html>

