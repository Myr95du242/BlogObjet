<?php

class Manager{

	private $bdd;

	//constructeur de la classe Manager
	public function __construct($bdd){
		//echo 'Appel du constructeur Manager <br/>';
		$this->setBdd($bdd);
	}

	//setter de la classe 
	public function setBdd($bdd){
		$this->bdd=$bdd;
	}

	//Leccture des données dans ma bdd
	public function getBddContenu(){
		$tabContenu=array();
		$compteur=0; // variable compteur afin d'incrémenter la table tabContenu
		$req_sql= "SELECT * FROM contenu ORDER BY date_contenu DESC LIMIT 0,3";
		$resultat= $this->bdd->query($req_sql);

		while ($data=$resultat->fetch()) 
		{
			$blog = new Blog( $data['titre'],$data['date_contenu'],$data['commentaire'],$data['photo'] );
			$tabContenu[$compteur]=$blog;
			$compteur++;
		}
		
		return $tabContenu;
	}

	public function insertionBdd(Blog $blog){
		$req_sql= "INSERT INTO contenu(titre,date_contenu,commentaire,photo)
		VALUES('" .$blog->getTitre()."',
				'".$blog->getDateContenu(). "',
				'".$blog->getCommentaire(). "',
				'".$blog->getPhoto(). "'
			)";
			$this->bdd->exec($req_sql);

			//récupération du dernier Identifiant Id
			$identifiant=$this->bdd->lastInsertId();
			return $identifiant;
	}
}
?>