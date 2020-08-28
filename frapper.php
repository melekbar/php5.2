<?php



include_once 'user.php';

include_once 'userManager.php';

session_start();

$db = new PDO('mysql:host=localhost;dbname=hamza', 'root', '');

$manager = new Manager($db);

$user1 = $manager->getUserByName($_SESSION["nom"]);

$user2 = $manager->getUserByName($_GET['pafrap']);


$res = $user1->frapper($user2);


if ($res ==3) {
	echo "personnage frappé";

	$manager->update($user2);

	header("location:get_all.php?nom=".$user1->getNom());
}



{
	
//session_destroy();

}


  ?>