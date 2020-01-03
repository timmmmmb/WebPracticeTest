<?php
    require_once 'autoloader.php';
    $apartment = Apartment::getApartmentById($_GET['id']);
    $images = new Image($apartment);
    echo "<div>".$apartment->getSlogan()."</div>";
    echo "<div>".$apartment->getDescription()."</div>";
    echo "<div>".$images->render()."</div>";

?>
