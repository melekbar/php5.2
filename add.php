



<?php  
if (isset($_GET['nom']) && !empty($_GET['nom'])) {

$nom = $_GET["nom"];
include_once 'user.php';
include_once 'userManager.php';

// Get data from form
$login = $_GET["nom"];
$degat=0;


$user = new User(NULL, $nom,$degat);
$db = new PDO('mysql:host=localhost;dbname=hamza', 'root', '');
$manager = new Manager($db);

$manager->add($user);

//header("location: personne.php");
}
?>