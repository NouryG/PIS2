<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Suppression du collaborateur
 $sql = "DELETE FROM projet WHERE code = '".$_POST["code"]."'";
 $bdd->exec($sql);

// Suppression de ses imputations
 $sql = "DELETE FROM imputation WHERE code_projet = '".$_POST["code"]."'";
 $bdd->exec($sql);
 ?>
