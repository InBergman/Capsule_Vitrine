
<?php
session_start();
require_once 'functions.php';
logged_only();

if (isset($_POST['button_art'])) {
  echo "<script type='text/javascript'>window.location.href = 'postuler.php';</script>";
}
if (isset($_POST['button_lieu'])) {
  echo "<script type='text/javascript'>window.location.href = 'postuler_lieu.php';</script>";
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
<center>
  <div class="wrapper">
  <h1>Bonjour <?= $_SESSION['auth']->username;?></h1>
<!-- <a href="postuler.php"><button class="wrapper" type="button" name="button">Proposer une oeuvre</button></a>
<a href="postuler.php"><button class="wrapper" type="button" name="button">Proposer un lieu</button></a> -->
<form action="" method="POST">
  <!-- <button class="wrapper" type="button_art" name="button">Proposer une oeuvre</button> -->
  <!-- <button class="wrapper" type="button_lieu" name="button">Proposer un lieu</button> -->
  <input class="wrapper" type="submit" name="button_art" value="Proposer une oeuvre"/>
  <input class="wrapper" type="submit" name="button_lieu" value="Proposer un lieu"/>
</form>
</div>
</center>

<?php //debug($_SESSION);?>

<?php require 'footer.php'; ?>
