<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ACTEMEDIA - Accueil</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />



        <!-- Favicon pour logo des pages -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
        <link rel="manifest" href="assets/ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>
            <nav class="navbar-custom navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>  
                    </button>
                    <a class="navbar-brand" id=""  href="accueil.php">Acte Media - Suivi de Production</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="formulaire.php">Formulaires</a>
                        </li>
                        <li>
                            <a href="bdd_display_collabs.php">Afficher collaborateurs</a>
                        </li>
                         <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Afficher les rapports<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  id="" class="hidden-xs"  href="">Rapport Mensuel</a>
                                    <a  id="" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Rapport Mensuel</a>
                                    <a  id="" class="hidden-xs"  href="">Rapport Annuel</a>
                                    <a  id="" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Rapport Annuel</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
              </div>
            </div>
            </nav>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg" style="padding: 250px 0 170px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text">
                            <h1><strong>Page d'accueil</strong></h1>
                            <div class="description">
                            	<p>
	                            	Bienvenue dans l'application de suivi de production d'Acte Media. Nous vous souhaitons une bonne navigation.
                            	</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/form.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.fr.js"></script>
        <script src='ajax_projects.js'></script>


    </body>

</html>
