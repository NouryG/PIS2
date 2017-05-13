<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Table collaborateurs</title>
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
                    <a class="navbar-brand" href="accueil.php">Acte Media - Suivi de Production</a>
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
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Afficher les rapports <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  id="" class="hidden-xs"  href="monthly_report.php">Rapport Mensuel</a>
                                    <a  id="" class="visible-xs" href="annual_report.php" data-toggle="collapse" data-target=".navbar-collapse">Rapport Mensuel</a>
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
        <div class="container">
            <br />
            <br />
            <br />
            <br />
            <br />
            <div class="table-responsive">
                <div id="live_data"></div>
            </div>
        </div>
      </body>
 </html>


 <script>
 $(document).ready(function(){
      function fetch_data()
      {
           $.ajax({
                url:"bdd_select_collab.php",
                method:"POST",
                success:function(data){
                     $('#live_data').html(data);
                }
           });
      }
      fetch_data();

      //Ajout = Ok
      $(document).on('click', '#btn_add', function(){
           var nom = $('#nom').text();
           var prenom = $('#prenom').text();
           var code = $('#code').text();
           var societe = $('#societe').text();
           var tj = $('#tj').text();
           var actif = $('#actif').text();
           if(nom == '')
           {
                alert("Entrer Nom");
                return false;
           }
           if(prenom == '')
           {
                alert("Entrer Prenom");
                return false;
           }
           $.ajax({
                url:"bdd_add_collab.php",
                method:"POST",
                data:{nom:nom, prenom:prenom,code:code , societe:societe, TJ:tj, actif:actif},
                dataType:"text",
                success:function(data)
                {
                     //alert(data);
                     fetch_data();
                }
           })
      });

      //Edition = Ok
      function edit_data(id, text, column_name)
      {
           $.ajax({
                url:"bdd_edit_collab.php",
                method:"POST",
                data:{id:id, text:text, column_name:column_name},
                dataType:"text",
                success:function(data){
                     //alert(data);
                }
           });
      }

      //Pour l'édition de tous les champs
      $(document).on('blur', '.code', function(){
           var id = $(this).data("id1");
           var code = $(this).text().toUpperCase();
           edit_data(id, code, "code");
      });
      $(document).on('blur', '.nom', function(){
           var id = $(this).data("id1");
           var nom = $(this).text();
           edit_data(id, nom, "nom");
      });
      $(document).on('blur', '.prenom', function(){
           var id = $(this).data("id2");
           var prenom = $(this).text();
           edit_data(id,prenom, "prenom");
      });
      $(document).on('blur', '.societe', function(){
           var id = $(this).data("id2");
           var societe = $(this).text().toUpperCase();
           edit_data(id,societe, "societe");
      });
      $(document).on('blur', '.tj', function(){
           var id = $(this).data("id2");
           var tj = $(this).text();
           edit_data(id,tj, "tj");
      });
      $(document).on('blur', '.actif', function(){
           var id = $(this).data("id2");
           var actif = $(this).text();
           edit_data(id,actif, "actif");
      });

      //Suppression = Ok
      $(document).on('click', '.btn_delete', function(){
           var id=$(this).data("id3");
           if(confirm("Etes-vous sûr de vouloir supprimer ce collaborateur?"))
           {
                $.ajax({
                     url:"bdd_delete_collab.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){
                          //alert("Ok");
                          fetch_data();
                     }
                });
           }
      });
 });
 </script>
