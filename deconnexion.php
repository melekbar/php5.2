<?php

if(isset($_SESSION["nom"])){
	session_destroy();

	header("location:get_all?$nom");
}

?>