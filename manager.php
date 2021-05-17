<?php
//Connect in the bdd
$bdd= new PDO('mysql:host=localhost;dbname=blogobjet;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if(!$bdd) 
{
	echo 'Echec de connexion !';
	exit();
}
?>