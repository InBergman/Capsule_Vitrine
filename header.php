
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slides.css">
    <link rel="stylesheet" type="text/css" href="css/form_and_buttons.css">
    <link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- temporary javascript nonsense -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/scroller.js"></script>
    <title>
        Capsule
    </title>
</head>

<body>
  <?php if (isset($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $type => $message) :?>
      <?php if ($type == 'danger'): ?>
          <?php echo '<p style="background-color:#f4414d;font-size:15px;">' . $_SESSION['flash']['danger'] . '</p>';?>
        <?php elseif ($type == 'success'): ?>
          <?php echo '<p style="background-color:#22e871;font-size:15px;">' . $_SESSION['flash']['success'] . '</p>';?>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php
    session_start();
    unset($_SESSION['flash']); ?>
  <?php endif; ?>
  <div id="user-nav">
      <div class="wrapper">
          <nav id="main-logo">
            <a href="./">
              <img src="img/favicon.png" alt="Logo Capsule">
            </a>
        </nav>
        <?php if (isset($_SESSION['auth'])): ?>
          <a href="espace_artiste.php"><button type="button" name="logout">Mon espace</button></a>
          <a href="logout.php"><button type="button" name="logout">Deconnexion</button></a>
        <?php else: ?>
          <a href="user_artiste.php"><button type="button" name="artiste-user">Artiste / Lieu</button></a>
          <!-- <a href="user_lieu.php"><button type="button" name="lieu-user">Espace lieu</button></a> -->
        <?php endif; ?>
      </div>
  </div>
  <br/>
