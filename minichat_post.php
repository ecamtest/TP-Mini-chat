<?php
	try
	{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);
	$messages = '';
	
	$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message');
	
	$req->execute(array(
    'pseudo' => $pseudo,
    'message' => $message,
    ));
	
	$reponse = $bdd->query("select * from minichat"); //order by ID desc limit l0
	$donnees = $reponse->fetch();
	
	while ($donnees = $reponse->fetch())
	{
		$messages+="<p>".$donnees['pseudo']." : ".$donnees['message']."</p>";
	}
	
	header('Location: minichat.php');
?>