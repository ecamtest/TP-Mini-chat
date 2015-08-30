<?php

setcookie('pseudo', $_POST['pseudo'], time() + 24*3600, null, null, false, true);

if(!($_POST['pseudo'])=='' and !($_POST['message'])=='')
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare('INSERT INTO messages(date_msg, pseudo, message) VALUES(NOW(), :pseudo, :message)');

	$req->execute(array(
	'pseudo' => $_POST['pseudo'],
	'message' => $_POST['message'],
	));
}
header('Location: minichat.php');
?>