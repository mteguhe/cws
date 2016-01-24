<!DOCTYPE html>
<html>
  <head>
	<title> Login || Admin </title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  </head>

  <body>
  	

	<h3 align="center"> Login || Admin </h3>

	<div id="input" align="center">
	 	<form method="post" action="<?php echo base_url();?>index.php/login">
			<input type="text" name="username" placeholder="Username" autocomplete="off" autofocus required> <br>
			<input type="password" name="password" placeholder="Password" required><br>
			<button class="btn" type="submit" style="margin-left:25%;"> Login </button> <br> <br>
		</form>
	</div>
  </body>
</html>