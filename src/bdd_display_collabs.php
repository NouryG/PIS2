

<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM collaborateurs');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
      <title>Projet ActeMedia</title>


  		<meta charset="utf-8"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1"/>

      <!-- CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
      <link href="assets\css\bdd_collabs.css" rel="stylesheet">

    </head>
    <body>

      <div class="header" id="header">
        <nav class="navbar navbar-inverse">
        <div class="container">
              <ul class="nav navbar-nav">
                <li><a href="formulaire.php">Formulaire</a></li>
                <li><a href="bdd_display_projects.php">Projets</a></li>
                </ul>
        </div><!--/.Container -->
        </nav>
      </div><!--/.header -->

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered ">
              <thead>
                <tr class="bg-primary">
                <th >ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Societe</th>
                <th>TJ</th>
                <th>Actif</th>
                </tr>
              </thead>


<?php
  echo'<tbody>';
  while ($donnees = $reponse->fetch())
  {
      echo'<tr>';
      echo ' <td>'.  $donnees['id'].  ' </td>';
      echo ' <td>' . $donnees['nom']. '</td>';
      echo ' <td>' . $donnees['prenom']. '</td>';
      echo ' <td>' . $donnees['societe']. '</td>';
      echo ' <td>' . $donnees['TJ']. '</td>';
      echo ' <td>' . $donnees['actif']. '</td>';
      echo'</tr>';
  }
    echo'  </tbody> </table>';
  $reponse->closeCursor();
?>

        </div>
      </div>
    </div>
  </body>
</html>
