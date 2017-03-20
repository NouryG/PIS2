

<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM collaborateurs');

    
    



   echo '<ul>';
    while ($donnees = $reponse->fetch())
    {
        echo '<h1>COLLABORATEUR NUMERO ' . $donnees['id'].  '</h1>';
        echo '<li> Nom : ' . $donnees['nom']. '</li>';
        echo '<li> Prénom : ' . $donnees['prenom']. '</li>';
        echo '<li> Employeur : ' . $donnees['societe']. '</li>';
        echo '<li> Tarif journalier : ' . $donnees['TJ']. ' € </li>';
    }
    echo '</ul>';
    $reponse->closeCursor();

?>