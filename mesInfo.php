<?php


include_once 'user.php';
include_once 'userManager.php';


if (isset($_GET['nom'])) {

$nom = $_GET["nom"];




$user = new User(NULL, $nom, 0);
$db = new PDO('mysql:host=localhost;dbname=hamza', 'root', '');
$manager = new Manager($db);

$persos = $manager->get($nom);



foreach ($persos as $key => $perso ) {
	echo  $perso->getNom() . " : " . $perso->getDegats() . "<br>";

}	
}























  ?>