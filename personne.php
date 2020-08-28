<?php 

include 'user.php';
include 'userManager.php';
$db = new PDO('mysql:host=localhost;dbname=hamza', 'root', '');
$manager = new Manager($db);

 echo "le nombre de personne" ;
 echo" ";
 echo $manager->count();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
</head>
<body>
	<form>
		Nom <input type="text" name="nom">
		<input type="submit" name="creer" value="creer personnage">
		<input type="submit" name="utliser" value="Utliser ce personnage">




	</form>

</body>
</html>



<?php  


// Get data from form
if (isset($_GET['nom'])) {

$nom = $_GET["nom"];



$user = new User(NULL, $nom, 0);


 echo "le nombre de personne" ;
 echo ($manager->count());


 if (isset($_GET['creer'])) {
 	header("location:add.php?nom=$nom");
 }elseif (isset($_GET['utliser'])) {
 	header("location:get_all.php?nom=$nom");
 }

}


 ?>