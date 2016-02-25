<?php

// Récupération des variables

  if(isset($_POST['nom'])) $lname=$_POST['nom']         ;
  else $nom=""                                        ;
  if(isset($_POST['prenom'])) $fname=$_POST['prenom'];
  else $prenom=""                                     ;
  if(isset($_POST['email'])) $mail=$_POST['email']  ;
  else $email=""                                      ;
  if(isset($_POST['tel'])) $phone = $_POST['tel']       ;


  // test des champs vides

  if(empty($lname) OR empty($fname) OR empty($mail))
  {
    echo '<strong>Attention, tous les champs sont obligatoires. Seul le numéro de téléphone est facultatif.</strong>';
  }
  else //on y va
  {
    //BDD

    //Déterminer les variables pour la base: port, nom utilisateur et mot de passe
      $dbhost = 'localhost:3306';
      $db = 'cartes';
      $dbuser = 'root';
      $dbpass = 'root';
      $charset = 'utf8';
      $dsn = "mysql:host=$dbhost;dbname=$db;charset=$charset";

      $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
      ];
      $pdo = new PDO($dsn, $dbuser, $dbpass, $opt);   //Ouverture de la connexion avec la base

      $stmt = $pdo->prepare('INSERT INTO visiteurs './/nom de la table
            '(prenom, nom, mel, tel) '. //nom des colonnes
            'VALUES ( :prenom, :nom, :email, :tel )'; //placeholders
            )
      $stmt = execute(['prenom' => $fname, 'nom' => $lname, 'mel' => $mail, 'tel' => $phone]);
/*
    //Image

    $image = imagecreatefrompng("eg.png");

    //écriture de l'image


    imagepng($image);
    <img src="image.php" />

      header()
      mail( "$email", "Fais ta carte! - C'est fait!",
        $message, "From: $email" );
      header( "Location: http://www.example.com/thankyou.html" );
      */
  }

  register_shutdown_function('shutdown');
?>
