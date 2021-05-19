<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8" content="text/html" />
</head>
<body>
	<h3>Formulaire de notre contenu</h3>
	<form action="controler.php" method="post" enctype="multipart/form-data">
		<p>
			<label>Titre </label><br/> 
			<input type="text" name="titre" /><br/>
		</p>
		<p>
			<label>Commentaire</label><br/>
			<textarea name="message"></textarea><br/>
		</p>
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
		<p>Choisissez votre photo</p>
		<input type="file" name="photo"/><br/>
		<input type="submit" name="envoyer" value="send"/>
	</form>
	<br/><a href="affichage.php">Affichez le formulaire renseigné </a><br/>
</body>
</html>