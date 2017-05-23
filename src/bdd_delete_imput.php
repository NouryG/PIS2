<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

 $sql = "UPDATE imputation SET jours = 0 WHERE id = '".$_POST["id"]."'";
 $bdd->exec($sql);
 ?>
