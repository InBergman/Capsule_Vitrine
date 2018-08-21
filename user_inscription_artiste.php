<?php
session_start();
require_once 'functions.php';
require_once 'php/PHPMailer/PHPMailerAutoload.php';
if(!empty($_POST)) {
  $errors = array();
  require_once 'db.php';

  if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
    $errors['username'] = "Le champ identifiant est vide";
    $_SESSION['flash']['danger'] = "Le champ identifiant est vide";
  } else {
    $req =  $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if ($user) {
      $errors['username'] = "Ce nom existe deja.";
      $_SESSION['flash']['danger'] = "Ce nom existe deja.";
      // phpAlert($errors['username']);
    }
  }
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre mail n'est au bon format";
  } else {
    $req =  $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if ($user) {
      $errors['email'] = "Cet email existe deja.";
      $_SESSION['flash']['danger'] = "Cet email existe deja.";
      // phpAlert($errors['email']);
    }
  }
  if (empty($_POST['mdp1']) || $_POST['mdp1'] != $_POST['mdp2']) {
    $errors['mdp'] = "Votre mot de passe ne correspond pas.";
    if (empty($_POST['mdp1']) && empty($_POST['mdp2'])) {
      $_SESSION['flash']['danger'] = "Veuillez renseigner tous les champs.";
    }
    else {
      $_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas.";
    }
  }
  if (empty($errors)) {
    $req =  $pdo->prepare("INSERT INTO users SET username = ?, mdp = ?, email = ?, confirmation_token = ?");
    $password = hash('whirlpool', $_POST["mdp1"]);
    $token = str_random(60);
    // debug($token);
    $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
    $user_id = $pdo->lastInsertId();
    send_mail($_POST['email'], 'Confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\n<a href=\"https://bonjour-capsule.fr/confirm.php?id=$user_id&token=$token\">Cliquez Ici pour confirmer votre compte</a>");
    $_SESSION['flash']['success'] = 'Un email de confirmation vous a ete envoye';
    echo "<script type='text/javascript'>window.location.href = 'user_artiste.php';</script>";
    // phpAlert($_POST['email']);
    exit();
  }
  // debug($errors);
}
?>
  <?php require 'header.php'; ?>
  <?php if(!empty($errors)): ?>
    <?php  echo $_SESSION['flash']['success'];?>
  <?php endif; ?>
  <center>
    <div class="wrapper">
        <form action="" method="POST">
            <h2>Créez votre compte Capsule</h2>
            <input type="text" name="username" placeholder="Nom" /></br>
            <input type="text" name="email" placeholder="E-mail" /></br>
            <input type="password" name="mdp1" placeholder="Mot de passe" /></br>
            <input type="password" name="mdp2" placeholder="Répéter le mot de passe" /></br>
            <input type="submit" value="Inscription">
        </form>
    </div>
    </center>

<?php require 'footer.php'; ?>
