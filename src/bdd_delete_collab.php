<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

 $sql = "DELETE FROM collaborateurs WHERE id = '".$_POST["id"]."'";
 $bdd->exec($sql);
 ?>
