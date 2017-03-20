

<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM projet');

    
    



   echo '<ul>';
    while ($donnees = $reponse->fetch())
    {
        echo '<h1>PROJET NUMERO ' . $donnees['id'].  '</h1>';
        echo '<li> Nom du projet : ' . $donnees['nom']. '</li>';
        echo '<li> Code du projet : ' . $donnees['code']. '</li>';
        echo '<li> Client demandant le projet : ' . $donnees['client']. '</li>';
        echo '<li> Date de début du projet : ' . $donnees['date_debut']. '</li>';
        echo '<li> Nombre de jours vendus: ' . $donnees['jours_vendus']. '</li>';
    }
    echo '</ul>';
    $reponse->closeCursor();

?>