<?php
include('Blog.php');
include('manager.php');

$req_sql='INSERT INTO contenu(titre,date_contenu,commentaire,photo)
					VALUES(?,NOW(),?,?) ';
//prepare data
$req=$bdd->prepare($req_sql);

if(!empty($_POST['titre']) AND !empty($_POST['message']) ){
	$titre=htmlspecialchars(addslashes($_POST['titre']));
	$commentaire=htmlspecialchars(addslashes($_POST['message']));
	$photo=$_FILES['photo']['name'];

$saisi=array($titre,$commentaire,$photo);

//var_dump($saisi);

	$blog= new BLOG($titre,$commentaire,$photo);

	// Récupération des données du blog
	$titreSaisi=$blog->getTitre();
	$commentaireSaisi=$blog->getCommentaire();
	$photoSaisi=$blog->getPhoto();
echo 'Votre enregistrement a réussi';
	//Exécution de la requête
	$data= $req->execute(array($titreSaisi,$commentaireSaisi,$photoSaisi) );

	//echo 'Votre enregistrement a réussi';

}



?>