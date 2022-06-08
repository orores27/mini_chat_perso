<?php
require_once('db.php');
// Requête SQL qui permet de selectionner tous les champs de la table 'bacasable" et d'affecter une date au format lisible avec la ?méthode? 'date_format'= il faut absolument donenr un ALIAS à date_format pour qu'elle puisse changer
$requete = 'SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %H:%i:%s")AS formated_date FROM bacasable';
//  le 'query' ici réuni le 'prepare' et le 'execute' = on peut l'utiliser parce qu'il n'y a pas de paramètre à entrer. 
$statement = $db->query($requete);
//  On fetch pour récupérer les données de $requete
$bacasable = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <!-- cdn du bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bacasable</title>
</head>
<body>
    <main>
        <!-- Création du formulaire -->
        <form action="chat.php" method="POST">
            <label for="name">Prénom</label>
            <input type="text" name='name' id='name' value="<?= isset($_SESSION['name'])? $_SESSION['name'] : ' '  ?>"  >
            <label for="message">Message</label> 
            <input type="text" name='message' id="message"<?= isset($_SESSION['name']) ? 'autofocus' : ' '  ?>> 
            <button type="submit">Envoyer !</button>

        </form>
<table class="table">
<thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <?php foreach ($bacasable as $message): ?>
    <tr>
      <th scope="col"><?= $message['name'] ?></th>
      <th scope="col"><?= $message['message'] ?></th>
      <th scope="col"><?= $message['formated_date'] ?></th>
    </tr>
    <?php endforeach ?>
</main>
</table>
</body>
</html>