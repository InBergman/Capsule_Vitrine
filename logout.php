<?php
session_start();
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous etes maintenant deconnecte";
// unset($_SESSION['flash']);
echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
 ?>
