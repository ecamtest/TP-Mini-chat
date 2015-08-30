<html>

 <head>
 <meta charset="UTF-8"> 
 <title>Mini-chat</title>

 </head>

 <body>
	<form style="text-align:center; width:50px;margin-left:40%" action="minichat_post.php" method="post">
		<input style="width:150px;" name="pseudo" type="text" <?php if(isset($_COOKIE['pseudo'])) echo "value='".$_COOKIE['pseudo']."'"; else echo "placeholder='Pseudo'"; ?>/>
		<input style="margin-top:5px;width:150px;" name="message" type="text" placeholder="Message"/>
		<button style="margin-top:10px;width:70px;margin-left:40px" name="envoyer" type="submit">Envoyer</button>
	</form>
	
	<div style="width:50%; padding:5px; border:solid 1px; height:60%">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
} 

$reponse = $bdd->query("select pseudo, message, DATE_FORMAT(date_msg, '[Le %d/%m/%Y à %Hh %im %ss]') AS date_msg from messages order by ID desc limit 10"); //order by ID desc limit l0

while ($donnees = $reponse->fetch())
{
	echo "<p>".$donnees['date_msg']." <span style='color:blue;font-weight:bold'>".htmlspecialchars($donnees['pseudo'])."</span> : ".htmlspecialchars($donnees['message'])."</p>";
}
?>
	</div>
 
 </body>

 </html>



