<?php



/**
 * 
 */
class User
{




	
  private $_degats,$_id,$_nom, $_image;
  
  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
  
  
  /*public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }*/
  
  public function frapper(user  $perso)
  {
    if ($perso->getId() == $this->_id)
    {
      return self::CEST_MOI;
    }
    
    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $perso->recevoirDegats();
  }
  // ellle fait quoi ??§!
  
  /*public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }*/
  
  public function recevoirDegats()
  {
    $this->_degats += 5;
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if ($this->_degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }
  

	function __construct($id,$nom,$degats, $image)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setDegats($degats);
		$this->setImage($image);
	}




//getters
public function setId($id){

$this->_id=$id;
}
public function setNom($nom){

$this->_nom=$nom;
}

public function setDegats($degats){

$this->_degats=$degats;
}

public function setImage($image){

$this->_image=$image;
}

public function getId(){

	return $this->_id;
}
public function getNom(){

	return $this->_nom;
}
public function getDegats(){

	return $this->_degats;
}

public function getImage(){

	return $this->_image;
}

}






  ?>