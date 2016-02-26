<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equi="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fais ta carte!</title>
  </head>
  <body>
    <main>
      <header>
        <a href="index.html" title="">Accueil</a>
      </header>
      <form method="post" action="test.php">
        <label for="prenom">Prénom:
          <input type="text" name="prenom" placeholder="Victor" required>
        </label>
        <label for="nom">Nom:
          <input type="text" name="nom" placeholder="Hugo" required>
        </label>
        <label for="email"><abbr title="Messagerie électronique en ligne">Mél</abbr>:
          <input type="text" name="email" multiple placeholder="auteur@lalegendedessiecl.es" pattern="([\w*\d*\.*\-*\_*]*)(\+\w*\d*)?@[\w+\.\w+]*" required>
        </label>
        <label for="telephone">Téléphone:
          <input type="text" name="tel" placeholder="+33 1793" pattern="(\+\d{1,2})?[\d+\s*]+">
        </label>
        <button type="submit">C'est bon</button>
      </form>

      <img src="eg.png" alt="" />
      <?php
          try{ $pdo = new PDO('mysql:host=localhost;dbname=cartes;charset=utf8', 'root', 'root');
          }
          catch (Exception $e) {
           die('Erreur : ' . $e->getMessage());
          }
          $stmt = $pdo->prepare('INSERT INTO visiteurs(prenom, nom, mel, tel) VALUES(:prenom, :nom, :mel, :tel)');
          $stmt->bindParam(':prenom', $_POST['prenom']);
          $stmt->bindParam(':nom', $_POST['nom']);
          $stmt->bindParam(':mel', $_POST['email']);
          $stmt->bindParam(':tel', $_POST['tel']);
          $stmt->execute();
          echo 'Données enregistrées';

        ?>
      <?php
         $nom_image = "eg.png";
         header("Content-type: image/png");
         $image = imagecreatefrompng("eg.png");
         $noir = imagecolorallocate($image, 0, 0, 0);
         imagestring($image, 5, 100, 25, $_POST['prenom'], $noir);
         imagestring($image, 5, 200, 25, $_POST['nom'], $noir);
         imagestring($image, 5, 100, 50, $_POST['email'], $noir);
         imagestring($image, 5, 100, 75, $_POST['tel'], $noir);
         imagepng($image, "carte.png");
         ?>

      </main>
    </body>
  </html>
