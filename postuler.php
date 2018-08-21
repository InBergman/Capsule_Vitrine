<?php
require_once 'functions.php';
require_once 'php/PHPMailer/PHPMailerAutoload.php';
logged_only();
//
if (!empty($_POST)) {
  require_once 'db.php';
  $req =  $pdo->prepare("UPDATE users SET art_site = ?, art_sociaux = ?,
                                                 art_departement = ?, art_tel = ?,
                                                 art_titre = ?, art_medium = ?,
                                                 art_nbr = ?, art_duree = ?,
                                                 art_taille = ?, art_msg = ?");

  $req->execute([$_POST['art_site'], $_POST['art_sociaux'], $_POST['art_departement'],
                                               $_POST['art_tel'], $_POST['art_titre'],
                                               $_POST['art_medium'], $_POST['art_nbr'],
                                               $_POST['art_duree'], $_POST['art_taille'],
                                               $_POST['art_msg']]);

$message  = '<pre style="background-color :#a4ff63; margin: 0.5px"><p>Site du lieu :</p></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_site']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Instagram, Tumblr... :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_sociaux']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Adresse du lieu :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_departement']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Departement du lieu :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_tel']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Telephone : </p><br/></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_titre']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Satut de lieu :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_medium']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Quel role a cet te personne :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_nbr']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Dimention du lieu : </p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_duree']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Hauteur de plafond :</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_taille']}</pre>";
$message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Possibilite de branchement electique ?</p><br /></pre>';
$message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['art_msg']}</pre>";

$message = wordwrap($message, 50);
send_mail("capsule@bonjour-capsule.fr", 'Webmaster : Candidature Artiste', $message);
session_start();
$_SESSION['flash']['success'] = 'Merci ! Nous avons bien recu votre candidature.';
echo "<script type='text/javascript'>window.location.href = 'espace_artiste.php';</script>";
exit();
}
 ?>
<?php require 'header.php';?>

    <div class="wrapper">
    <center>
      <br/>
      <p> Proposer nous votre Oeuvre :</p>
      <br/>
      <form action="" method="POST">
        <input style="width:344px" type="text" name="art_site" placeholder="votre site"/>
        <input style="width:344px" type="text" name="art_sociaux" placeholder="Instagram, Tumblr ..."/><br />
        <input style="width:344px" type="text" name="art_departement" placeholder="Votre departement"/>
        <input style="width:344px"type="text" name="art_tel" placeholder="Votre numero de telephone"/><br />
        <input style="width:344px" type="text" name="art_titre" placeholder="Titre de votre oeuvre"/>
        <input style="width:344px" type="text" name="art_medium" placeholder="Médium"/><br />
        <input style="width:700px" type="text" name="art_nbr" placeholder="L'oeuvre inclut des performeurs. Si oui combien ?"/><br />
        <input style="width:700px" type="text" name="art_duree" placeholder="Quel serait la duree ideal d'exposition ?"/>
        <input style="width:700px" type="text" name="art_taille" placeholder="Quel serait la superficie ideal du lieu d'exposition"/><br />
        <textarea style="height:300px; width:700px" name="art_msg" placeholder="Avez-vous des remarques, des commentaires ?"></textarea><br />
        <!-- <input type="file" name="img1">
        <input type="file" name="img2">
        <input type="file" name="img3">
        <input type="file" name="img4"> -->
        <input style="height:70px; width:700px" type="submit" name="art_submit" value="Envoyer"/><br />
      </form>
    </center>
    </div>



<?php require 'footer.php'; ?>
