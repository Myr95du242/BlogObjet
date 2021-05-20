<!DOCTYPE html>
<html>
<head>
	<title> Blog objet</title>
</head>
<body>
	<h2>Mon blog avec utilisation d'objet</h2>
	<hr/>

	<?php
	include('Manager.php');
	include('Blog.php');

	try{
		//connexion à la bdd
		$base= new PDO('mysql:host=localhost;dbname=blogobjet;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION) );
		$manager= new Manager($base);

		$data=$manager->getBddContenu();

			if(empty($data)) {
				echo 'tableau vide';
			}else{
					foreach ($data as $value) 
					{
						$date_fr= date_create_from_format('Y-m-d H:i:s', $value->getDateContenu()); 
						echo "<h3>".$value->getTitre() ."</h3>";
						echo "<div style='width:400px'>".$value->getCommentaire()."</div>";
					if ($value->getPhoto() !=""){
						echo "<div>";
						echo "<img src='photos/".$value->getPhoto()."width='200px' height='200px' '/>";
						echo "</div>";
						} 
						echo '<hr/>';
					}
				}
		
	} catch (Exception $e) {
		//message d'erreur
		die('Erreur:'.$e->getMessage());
	}
	?>

</body>
</html>