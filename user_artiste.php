<?php
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['mdp'])) {
  require_once 'db.php';
  require_once 'functions.php';
  $req = $pdo->prepare('SELECT * FROM users WHERE username = ? AND confirmed_at IS NOT NULL');
  $req->execute([$_POST['username']]);
  $user = $req->fetch();
  $password = hash('whirlpool', $_POST["mdp"]);
  if ($password == $user->mdp) {
    session_start();
    $_SESSION['auth'] = $user;
    $_SESSION['flash']['success'] = 'Vous est maintenant connecte';
    echo "<script type='text/javascript'>window.location.href = 'espace_artiste.php';</script>";
    exit();
  }
}
elseif ((empty($_POST) || empty($_POST['username']) || empty($_POST['mdp'])) && isset($_POST['conn'])) {
  // echo "<p>Veuillez correctement completer tous les champs</p>";
    $_SESSION['flash']['success'] = "Vous n'avez pas remplie tous les champs";
}
 ?>
<?php require 'header.php'; ?>

  <center>
    <div class="weapper">
        <h2>Connexion à&nbsp;votre compte</h2>
        <form class="" action="" method="POST">
            <input type="text" name="username" placeholder="Identifiant ou E-mail"/><br/>
            <input type="password" name="mdp" placeholder="Mot de passe"/><br/>
            <input type="submit" name="conn" value="Connexion"/><br/>
            <a style="font-size:12px;" href="forget.php">(J'ai oublie mon mot de passe)</a>
        </form>
        <br/>
        <br/>
        <a href="user_inscription_artiste.php">
          <button type="button" name="Inscription">
            Créer un compte
          </button>
        </a>
    </div>
  </center>
<?php require 'footer.php'; ?>
