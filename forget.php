<?php
if (!empty($_POST) && !empty($_POST['email'])) {
  require_once 'db.php';
  require_once 'functions.php';
  $req = $pdo->prepare('SELECT * FROM users WHERE email = ? AND confirmed_at IS NOT NULL');
  $req->execute([$_POST['email']]);
  $user = $req->fetch();
  if ($user) {
    require_once 'php/PHPMailer/PHPMailerAutoload.php';
    session_start();
    $reset_token = str_random(60);
    $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
    $_SESSION['flash']['success'] = 'Les instructions de reinitialisation de votre mot de passe vous ont ete envoyees par mail.';
    send_mail($_POST['email'], 'Reinitialisation de votre mot de passe',"Afin de reinitialisation de votre mot de passe merci de cliquer sur ce lien\n\n<a href=\"https://bonjour-capsule.fr/reset.php?id={$user->id}&token=$reset_token\">Clique ici pour reinitialiser votre mot de passe</a>");
    // send_mail($_POST['email'], 'Confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost:8888/Capsule_v2/Online/confirm.php?id=$user_id&token=$token");
    echo "<script type='text/javascript'>window.location.href = 'user_artiste.php';</script>";
    exit();
  }
  else {
    // echo "<p>Veuillez correctement completer tous les champs</p>";
      session_start();
      $_SESSION['flash']['danger'] = 'Aucun compte ne correspond a cet email.';
  }
}
 ?>
<?php require 'header.php'; ?>

  <center>
    <div class="weapper">
        <h2>Mot de passe&nbsp;oublie</h2>
        <form class="" action="" method="POST">
            <input type="email" name="email" placeholder="email"/><br/>
            <input type="submit" name="submit" placeholder="envoyer"/><br/>
        </form>
        <br/>
    </div>
  </center>

<?php require 'footer.php'; ?>
