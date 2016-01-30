<?php
  $prenom = $_REQUEST['prenom'] ;
  $nom = $_REQUEST['nom']       ;
  $email = $_REQUEST['email']   ;
  $tel = $_REQUEST['tel']       ;

/* Déterminer les variables pour la base: port, nom utilisateur et mot de passe
  $dbhost = 'localhost:3036';
  $dbuser = 'root';
  $dbpass = 'rootpassword';
*/
//Ouverture de la connexion avec la base
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
//Si la connexion ne marche pas, affichage d'un message d'erreur
  if(! $conn )
  {
    die('Désolé, nous avons eu un problème: ' . mysql_error());
  }


  $sql = 'INSERT INTO cartes './/nom de la base
        '(lname, fname, email, phone) '. //nom des colonnes
        'VALUES ( $nom, $prenom, $email, $tel )'; //nom des variables

     mysql_select_db('test_db');
     $retval = mysql_query( $sql, $conn );

     if(! $retval ) {
        die('Could not enter data: ' . mysql_error());
     }

     echo "Entered data successfully\n";

     mysql_close($conn);

  header()
  mail( "$email", "Fais ta carte! - C'est fait!",
    $message, "From: $email" );
  header( "Location: http://www.example.com/thankyou.html" );
?>
