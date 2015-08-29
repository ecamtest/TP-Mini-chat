<?php

session_start();

if(!isset($_SESSION['messages'])) $_SESSION['messages'] = '';

?>
<html>

 <head>
 <meta charset="UTF-8"> 
 <title>Mini-chat</title>

 </head>



 <body>

	<form style="text-align:center; width:50px;margin-left:40%" action="minichat_post.php" method="post">
		<input style="width:150px;" name="pseudo" type="text" placeholder="Pseudo"/>
		<input style="margin-top:5px;width:150px;" name="message" type="text" placeholder="Message"/>
		<button style="margin-top:10px;width:70px;margin-left:40px" name="envoyer" type="submit">Envoyer</button>
	</form>
	
	<div style="width:30%; padding:5px; border:solid 1px; height:65%">
		<?php echo $_SESSION['messages']; ?>
	</div>
 
 </body>

 </html>



