<?php 
	require_once 'autoloader.php';
	
	$register = isset($_POST['register']) ? $_POST['register'] : false;
	if ( $register ) {
		
		// Validate input...
		$formIsValid = true;
		
		if ($formIsValid) {
			Register::save($register);
			header("Location: registered.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trial Test</title>
	<link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/main.js"></script>
</head>
<body>
	<header><h1>Find your new apartment, here and now!</h1></header>
	
	<article>
		<h2>Register for #<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?></h2>
		
		<form id="register" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<p><label>Name</label><input name="register[name]"/></p>
			<p><label>Street/Nr.</label><input name="register[street]"/></p>
			<p><label>Zip</label><input name="register[zip]"/></p>
			<p><label>City</label><input name="register[city]"/></p>
			<p><label>Email</label><input type="email" name="register[email]"/></p>
			<p><label>Comment</label><textarea name="register[comment]"></textarea></p>
			<p><input class="submit" type="submit" value="Submit" />
		</form>
	</article>
	<footer>&copy; <?php echo date('Y')?></footer>
</body>
</html>