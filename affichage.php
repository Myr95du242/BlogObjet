<?php
include('manager.php');

$req='SELECT * FROM contenu ORDER BY id_contenu DESC LIMIT 0,3';

$exe=$bdd->query($req);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
</head>
<body>
	<h2>Mon blog en objet</h2>
<?php while ($data=$exe->fetch()) 
{
	?>
	<label>Titre : </label><?php if( isset($data['titre']) and !empty($data['titre'])){ echo htmlspecialchars(addslashes($data['titre']));} ?>
<?php

$exe->closeCursor();
} ?>
	

</body>
</html>