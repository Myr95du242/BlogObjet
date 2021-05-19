<?php
include('Blog.php');
include('manager.php');

try{

	//connexion à la bdd
$base= new PDO('mysql:host=localhost;dbname=blogobjet;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	if ($_FILES['photo']['error']){
		switch ($_FILES['photo']['error']) 
		{
			case 1:
				echo "La taille de votre fichier est supérieur à 2M <br/> ";
				break;			
			case 2:
				echo "La taille de votre fichier est nulle <br/> ";
				break;
		}
	}else{
		echo "Aucune erreur avec le fichier <br/> ";
		
		if( (isset($_FILES['photo']['name'] ) && ($_FILES['photo']['error']== UPLOAD_ERR_OK) )){
			$destination="postes/";
			move_uploaded_file($_FILES['photo']['tmp_name'], $destination.$_FILES['photo']['name']);
			echo 'Fichier copié dans le repertoire';
		}else{
			echo "Fichier pas connecté ! <br/> ";
		}
	}
	if(!empty($_POST['titre']) AND !empty($_POST['message']) )
	{

		$manager= new Manager($base);
		$titre=htmlspecialchars(addslashes($_POST['titre']));
		$date=date("Y-m-d H:i:s");
		$commentaire=htmlspecialchars(addslashes($_POST['message']));
		$photo=$_FILES['photo']['name'];

		$blog= new Blog($titre,$date,$commentaire,$photo);

		//Insertion avec la fonction 
		$identifiant= $manager->insertionBdd($blog);
		echo 'Votre enregistrement a réussi';
		if ($identifiant != 0){
			echo 'Ajout de vos données dans la bdd <br/>';
		}else{
			echo 'Les données ne sont pas enregistrées !';
		}
		echo '</br> Votre enregistrement a réussi! <br/>';
	}

}catch(Exception $e) 
{
	die('Erreur :'.$e->getMessage() );
}


?>