<?php
session_start();
if((!isset($_SESSION['password']) && $_SESSION['password'] != 'actemedia')){
    header ("Location: auth.php");
}?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapport Annuel</title>
        <link rel="icon" type="image/png" href="assets/ico/ms-icon-150x150.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar-custom navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>  
                    </button>
                    <a href="accueil.php"><img src="assets\ico\logo_horizontal_RVB_md.jpg"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="formulaire.php">Formulaires</a>
                        </li>
                        <li>
                            <a href="bdd_display_collabs.php">Collaborateurs</a>
                        </li>
                        <li>
                            <a href="bdd_display_projects.php">Projets</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Afficher les rapports <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  id="" class="hidden-xs"  href="monthly_report.php">Rapport Mensuel</a>
                                    <a  id="" class="visible-xs" href="monthly_report.php" data-toggle="collapse" data-target=".navbar-collapse">Rapport Mensuel</a>
                                    <a  id="" class="hidden-xs"  href="annual_report.php">Rapport Annuel</a>
                                    <a  id="" class="visible-xs" href="annual_report.php" data-toggle="collapse" data-target=".navbar-collapse">Rapport Annuel</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
              </div>
            </div>
        </nav>

        <!-- Content -->
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="table-responsive">
                <div id="live_data"></div>
            </div>
      </body>
 </html>


 <script>
 $(document).ready(function(){

      // Affichage des codes collaborateurs
      function fetch_data()
      {
           $.ajax({
                url:"select_annual_report.php",
                method:"POST",
                success:function(data){
                     $('#live_data').html(data);
                }
           });
      }
      fetch_data();

 });

 //Edition du RAF Réel

//Edition = ENCOURS

 function edit_data(id, text, column_name)
 {
      $.ajax({
           url:"bdd_edit_projet.php",
           method:"POST",
           data:{id:id, text:text, column_name:column_name},

           dataType:"text",
           success:function(data){
          }
      });
 }


 $(document).on('blur', '.RAF_reel', function(){
      var id = $(this).data("id1");
      var value = $(this).text().toUpperCase();
      edit_data(id, value, "RAF_reel");
 });


 </script>
