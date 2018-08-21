<?php
$user_id = $_GET['id'];
$token = $_GET['token'];
require 'db.php';
$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $token ){
    $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $_SESSION['flash']['success'] = 'Votre compte a bien été validé';
    $_SESSION['auth'] = $user;
    // header('Location: account.php');
    echo "<script type='text/javascript'>window.location.href = 'espace_artiste.php';</script>";
}
else
{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
//     header('Location: login.php');
    echo "<script type='text/javascript'>window.location.href = 'user_artiste.php';</script>";
}
