
<?php  




include_once 'user.php';
include_once 'userManager.php';









// Get data from form
if (isset($_GET['nom'])) {

$nom = $_GET["nom"];


$_SESSION['nom']=$nom;

$user = new User(NULL, $nom, 0, NULL);
$db = new PDO('mysql:host=localhost;dbname=hamza', 'root', '');
$manager = new Manager($db);





$persoo = $manager->getUserByName($nom);
echo "<h2 style='color:red'> Mes information </h2>" ;


echo "Nom : " . $persoo->getNom() ."<br>"."Degats:". $persoo->getDegats() ."<br>";


echo "<br>";

echo "<img src=uploads/".$persoo->getImage().">";
?>





<form action="image.php" method="post" enctype="multipart/form-data">
  Select image to upload:<br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload_Image" name="submit">
</form>


<?php

$persos = $manager->getall($nom);
;
echo "<h2 style='color:red'> Qui frapper </h2>" ;


foreach ($persos as $key => $perso ) {

	echo  "<a href=frapper.php?nom=$nom&pafrap=".$perso->getNom()."> ". $perso->getNom() ." :(degats: ".$perso->getDegats().") </a> <br> ";

}


session_start();
echo "<br>";
echo "<a href=deconnexion.php> deconnexion </a>";
echo "<br>";

}

?>