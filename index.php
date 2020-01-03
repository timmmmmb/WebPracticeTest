<?php 
	require_once 'autoloader.php';

	$apartments = Apartment::getApartments();
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
	<?php foreach($apartments as $apartment) : ?> 
		<div class="teaser">
			<h4><?php echo $apartment->getSlogan() ?></h4>
			<div class="content clearfix">
				<div class="img-holder"><img src="assets/images/<?php echo $apartment->getImages()[0]; ?>" /></div>
				<p><label>Rent: </label>CHF <?php echo $apartment->getRent(); ?>.-</p>
				<p><label>Rooms: </label><?php echo $apartment->getRooms(); ?></p>
				<p><label>Address: </label><?php echo $apartment->getStreet(); ?></p>
				<p><label>Zip/City: </label><?php echo $apartment->getZip() ." " . $apartment->getCity(); ?></p>
		 		
		 		<p class="space">&raquo; <a class="show-details" href="#details-<?php echo $apartment->getId(); ?>">More Details</a></p>
		 		<p>&raquo; <a href="register.php?id=<?php echo $apartment->getId(); ?>">Register</a></p>
		 	</div>
		</div>
	<?php endforeach;?>
	
	</article>
	<footer>&copy; <?php echo date('Y')?></footer>
	<div class="overlay">
		<div class="o-outer">
			<div id="o-close">Close X</div>
			<div id="o-content"></div>
		</div>
	</div>
</body>
</html>