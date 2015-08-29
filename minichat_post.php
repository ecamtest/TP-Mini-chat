<?php

session_start();

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

$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');

$req->execute(array(
'pseudo' => $pseudo,
'message' => $message,
));

$reponse = $bdd->query("select * from minichat order by ID desc limit 10"); //order by ID desc limit l0

$_SESSION['messages'] = '';
while ($donnees = $reponse->fetch())
{
	$_SESSION['messages'] .= "<p><b>".$donnees['pseudo']."</b> : ".$donnees['message']."</p>";
}

header('Location: minichat.php');
?>