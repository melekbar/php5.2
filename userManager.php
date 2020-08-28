<?php
include_once 'user.php';

/**
 * 
 */
class Manager
{
	private $_db;

	function __construct(PDO $db)
	{
		$this->setDb($db);
	}

	function setDb($db) {
		$this->_db= $db;
	}

	//ajouter
	 public function add(User $user)
  {

    $q = $this->_db->prepare('INSERT INTO personnage(id, nom, degats,image) VALUES(:id, :nom, :degats , :image)');

    $q->bindValue(':id', null);
    $q->bindValue(':nom', $user->getNom());
    $q->bindValue(':degats', $user->getDegats());
    $q->bindValue(':image', $user->getImage());




    $q->execute();
  }



//exsitance
	public function login($nom)
  {

    $q = $this->_db->query('SELECT * FROM personnage WHERE nom LIKE "$nom" ');
     $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new User($donnees["id"], $donnees["nom"], $donnees["degats"],  $donnees["image"] );
  }


//suprimer

  public function delete(User $perso)
  {
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
  }


//recuper
public function getall($nom)
  {
       $persos = [];
    $q = $this->_db->prepare('SELECT * FROM personnage where nom <> :nom');
    $q->bindValue(':nom', $nom);
    $q->execute();

    
  while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] =  new User($donnees["id"], $donnees["nom"], $donnees["degats"],  $donnees["image"] );
    }
     return $persos;
  }



//count
public function count()

  {
   


return $this->_db->query('SELECT COUNT(*) from personnage')->fetchColumn();
  
}



/*public function get($info)
  {
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      
      return new user($donnees);
    }
    else
    {
      $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
      $q->execute([':nom' => $info]);
    
      return new user($q->fetch(PDO::FETCH_ASSOC));
    }
  }*/

  public function getUserByName($nom)
  {


      $q = $this->_db->prepare('SELECT * FROM personnage WHERE nom = :nom');
      $q->execute([':nom' => $nom]);

      $donnees = $q->fetch(PDO::FETCH_ASSOC);


      
    
      return new User($donnees["id"], $donnees["nom"], $donnees["degats"],  $donnees["image"]);
    
  }

//modifier

 public function update(User $user)
  {
    $q = $this->_db->prepare('UPDATE personnage SET degats = :degats, image = :image  WHERE id = :id');
     $q->bindValue(':degats', $user->getDegats(), PDO::PARAM_INT);
          $q->bindValue(':image', $user->getImage());
$q->bindValue(':id', $user->getId(), PDO::PARAM_INT);
    

    $q->execute();
  }








}


?>
