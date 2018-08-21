<?php
require_once 'functions.php';
require_once 'php/PHPMailer/PHPMailerAutoload.php';
session_start();
logged_only();
//
if (!empty($_POST)) {
  require_once 'db.php';
  $req =  $pdo->prepare("UPDATE users SET lieu_site = ?, lieu_sociaux = ?,
                                                 lieu_adresse = ?, lieu_departement = ?,
                                                 lieu_telephone = ?, lieu_statut = ?,
                                                 lieu_role = ?, lieu_dim = ?,
                                                 lieu_plafond = ?, lieu_elect = ?,
                                                 lieu_voisins = ?, lieu_msg = ?");
  $req->execute([$_POST['lieu_site'], $_POST['lieu_sociaux'], $_POST['lieu_adresse'],
                                               $_POST['lieu_departement'], $_POST['lieu_telephone'],
                                               $_POST['lieu_statut'], $_POST['lieu_role'],
                                               $_POST['lieu_dim'], $_POST['lieu_plafond'],
                                               $_POST['lieu_elect'], $_POST['lieu_voisins'],
                                               $_POST['lieu_msg']]);

    $message  = '<pre style="background-color :#a4ff63; margin: 0.5px"><p>Site du lieu :</p></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST["lieu_site"]}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Instagram, Tumblr... :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_sociaux']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Adresse du lieu :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_adresse']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Departement du lieu :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_departement']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Telephone : </p><br/></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_telephone']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Satut de lieu :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_statut']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Quel role a cet te personne :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_role']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Dimention du lieu : </p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_dim']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Hauteur de plafond :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_plafond']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Possibilite de branchement electique ?</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_elect']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Information sur le voisinage :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_voisins']}</pre>";
    $message .= '<pre style="background-color :#a4ff63; margin: 0.5px"><br /><p>Autre choses a nous dire :</p><br /></pre>';
    $message .= "<pre style='background-color :#1cede2; margin: 0.5px'>{$_POST['lieu_msg']}</pre>";
    // echo $message;
    $message = wordwrap($message, 50);
   send_mail("capsule@bonjour-capsule.fr",
             'Webmaster : Proposition nouveau Lieu', $message);
//     echo "<script type='text/javascript'>window.location.href = 'user_artiste.php';</script>";
}
 ?>
<?php require 'header.php';?>
<style>
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    rgb(135, 202, 255);
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    rgb(135, 202, 255);
        opacity:  1;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    rgb(135, 202, 255);
        opacity:  1;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:    rgb(135, 202, 255);
    }

    input, textarea {
      /*width: 150%;*/
        box-sizing: border-box;
      padding: 20px;
        margin: 5px 0;
        border: 0;
      background-color: rgb(0, 146, 255);
        font-family: "frutiger";
        font-size: 0.5rem;
        color: white;
        box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);

    }

    #send, button {
      min-height: 45px;
        margin: 30px 0;
      background-color: rgb(0, 146, 255);
      border: 1px solid rgb(0, 146, 255);
      color: white;
      font-size: 18px;
        transition: background-color 200ms;
    }

    #send {
        /*width: 150%;*/
    }

    #send:hover, button:hover {
      background-color: rgb(4, 95, 163);
        cursor: pointer;
    }

    .form h3,p,label {
      text-align:center;
        margin: 0;
    }

    .form {
        text-align: center;
        max-width: 400px;
        margin: 0 auto;
        /*height: 900px;*/
        /*position: absolute;*/
        /*transform: translateX(-50%);
        left: 50%;*/
    }

    .form * {
        width: 100%;
    }

    .form h3 {
        margin: 30px 0;
        /*width: 150%;*/
        color: rgb(0, 146, 255);
        text-align: center;
    }

    #lieu-form, #artiste-form, #public-form {
        transition: opacity 500ms ease-out;
    }

    .side_menu {
      left: 20px;
    }
</style>
<div class="wrapper">
<center>
  <br/>
  <p> Proposer nous votre lieu :</p>
  <br/>
  <form action="" method="POST">
    <input style="width:344px" type="text" name="lieu_site" placeholder="votre site"/>
    <input style="width:344px" type="text" name="lieu_sociaux" placeholder="Instagram, Tumblr ..."/><br />
    <input style="width:344px" type="text" name="lieu_adresse" placeholder="Votre adresse"/>
    <input style="width:344px" type="text" name="lieu_departement" placeholder="Votre departement"/>
    <input style="width:344px"type="text" name="lieu_telephone" placeholder="Votre numero de telephone"/><br />
    <input style="width:344px" type="text" name="lieu_statut" placeholder="Public ou bien privé"/>
    <input style="width:344px" type="text" name="lieu_role" placeholder="Quel est votre role au seins de ce lieu"/><br />
    <input style="width:700px" type="text" name="lieu_dim" placeholder="Capacité du lieu en m3"/><br />
    <input style="width:700px" type="text" name="lieu_plafond" placeholder="Hauteur sous plafond"/>
    <input style="width:700px" type="text" name="lieu_elect" placeholder="Votre lieu permet il des branchements electriques"/>
    <textarea style="height:300px; width:700px" name="lieu_voisins" placeholder="A propos du voisinage"></textarea><br />
    <textarea style="height:300px; width:700px" name="lieu_msg" placeholder="Avez-vous des remarques, des commentaires ?"></textarea><br />
    <input style="height:70px; width:700px" type="submit" name="submit" value="Envoyer"/><br />
  <br/>
  </form>
</center>
</div>
<?php require 'footer.php'; ?>
