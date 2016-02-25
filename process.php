<?php

// Récupération des variables

  if(isset($_POST['nom'])) $nom=$_POST['nom']         ;
  else $nom=""                                        ;
  if(isset($_POST['prenom'])) $prenom=$_POST['prenom'];
  else $prenom=""                                     ;
  if(isset($_POST['email'])) $prenom=$_POST['email']  ;
  else $email=""                                      ;
  if(isset($_POST['tel'])) $tel = $_POST['tel']       ;

  if(empty($nom) OR empty($email) OR empty($email))
  {
    echo '<strong>Attention, tous les champs sont obligatoires. Seul le numéro de téléphone est facultatif.</strong>';
  }
  else
  {

    //BDD

    //Déterminer les variables pour la base: port, nom utilisateur et mot de passe
      $dbhost = 'localhost:8888'; //localhost peut suffire si on recherche sur le port par défaut
      $dbuser = 'admin';
      $dbpass = 'admin';

    //Ouverture de la connexion avec la base
      $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    //Si la connexion ne marche pas, message d'erreur
      if(! $conn )
      {
        die('Désolé, nous avons eu un problème: ' . mysql_error());
      }


      mysql_select_db('cartes', $conn) ;

      $sql = 'INSERT INTO visiteurs './/nom de la table
            '(prenom, nom, mel, tel) '. //nom des colonnes
            'VALUES ( $prenom, $nom, $email, $tel )'; //nom des variables

      $retval = mysql_query( $sql, $conn );

         if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
         }

         echo "Entered data successfully\n"; //dans un else?

         mysql_close($conn);


    //Image

    $image = imagecreatefrompng("eg.png");

    //écriture de l'image


    imagepng($image);
    <img src="image.php" />

      header()
      mail( "$email", "Fais ta carte! - C'est fait!",
        $message, "From: $email" );
      header( "Location: http://www.example.com/thankyou.html" );
    ?>
  }
