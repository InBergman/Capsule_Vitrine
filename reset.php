<?php
// if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['mdp'])) {
//   require_once 'db.php';
//   require_once 'functions.php';
//   $req = $pdo->prepare('SELECT * FROM users WHERE username = ? AND confirmed_at IS NOT NULL');
//   $req->execute([$_POST['username']]);
//   $user = $req->fetch();
//   $password = hash('whirlpool', $_POST["mdp"]);
//   if ($password == $user->mdp) {
//     session_start();
//     $_SESSION['auth'] = $user;
//     $_SESSION['flash']['success'] = 'Vous est maintenant connecte';
//     echo "<script type='text/javascript'>window.location.href = 'espace_artiste.php';</script>";
//     exit();
//   }
// }
if (isset($_GET['id']) && isset($_GET['token'])) {
    require_once 'db.php';
    require_once 'functions.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'],$_GET['token']]);
    $user = $req->fetch();
    if ($user) {
      if (!empty($_POST)) {
        if(!empty($_POST['mdp1']) && $_POST['mdp1'] == $_POST['mdp1_conf']) {
          $password = hash('whirlpool', $_POST["mdp1"]);
          $pdo->prepare('UPDATE users SET mdp = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
          session_start();
          $_SESSION['flash']['success'] = "Votre mot de passe a bien ete modifie";
          $_SESSION['auth'] = $user;
          echo "<script type='text/javascript'>window.location.href = 'espace_artiste.php';</script>";
          exit();
        }
        elseif(!empty($_POST['mdp1']) && $_POST['mdp1'] != $_POST['mdp1_conf'] ) {
          session_start();
          $_SESSION['flash']['danger'] = "Les mots de passe ne sont pas identique";
          exit();
        }
      }
    }

}

 ?>
<?php require 'header.php'; ?>

  <center>
    <div class="weapper">
        <h2>Reinitialiser mon mot de passe</h2>
        <form class="" action="" method="POST">
            <input style="width:500px;" type="password" name="mdp1" placeholder="Nouveau mot de passe"/><br/>
            <input style="width:500px;" type="password" name="mdp1_conf" placeholder="Confirmation du nouveau mot de passe"/><br/>
            <input type="submit" name="conn" value="Reinitialiser mon mot de passe"/><br/>
        </form>
        <br/>
  </center>
<?php require 'footer.php'; ?>
