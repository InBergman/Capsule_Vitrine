<?php require 'header.php'; ?>
<div id="main-content">
<div class="slide scrollActive" id="slide-home" >
        <div class="content">
            <div class="main-logo"><img src="./img/logo.png"></div>
            <h1 class="logo-title">Capsule</h1>
        </div>
        <script language="javascript" type="text/javascript" src="js/art/libraries/p5.js"></script>
        <script language="javascript" type="text/javascript" src="js/art/background/sketch.js"></script>
        <div id="background-canvas-holder"></div>
    </div>

    <!-- News -->
	<!-- <div class="slide scrollActive" id="slide-news" >
        <div class="content">
            <article>
                <div class="news-border">
                    <div class="news-fix">
                        <p class="date">28 avril 2017</p>
                        <h2>BONJOUR,<br>NOUVELLE CAPSULE!</h2>

                        <p>La prochaine Capsule sera hébergée le <u>samedi 6 mai</u> par nos amis de la <u>Paillasse</u>, rue Saint Denis, dans le deuxième arrondissement de Paris.<br><br>Vous voulez y participer ?<u> Prenez un créneau en appuyant sur le bouton ci-&nbsp;dessous : </u> </p>
                    </div>
                </div>
            </article>
        </div>
        <div id="link-button-inscription">
            <a href="./inscriptions.php">
                <button type="button" name="button">Réserver un créneau</button>
            </a>
        </div>
    </div> -->

        <!-- Concept -->
        	<div class="slide" id="slide-idee">
                <img class="forme1" src="img/FORMES/1.png">
                <div class="content">
                    <div class="type-box">
                        <!-- <div class="blinker"></div> -->
                        <h2 class="slide-title">L'idée</h2>
                    </div>
                    <p>Capsule propose des <u style="color:black;">expériences</u> durant lesquelles le visiteur vient créer ou interagir avec des artistes (de toutes disciplines confondues) dans des <u style="color:black;">lieux insolites</u>.</p>
                    <p>Concept nomade, les séances Capsule sont des instants de rencontres et de partages en petit comité au cours desquelles <u style="color:black;">l’expression artistique initiée par les artistes intervenants s’exprime avant tout <em>avec</em> et <em>par</em> le spectateur</u>.</p>
                </div>
        	</div>

        <!-- Artistes -->
        	<div class="slide" id="slide-artistes">
                <img class="forme2" src="img/FORMES/2.png">
                <div class="content">
                    <div class="type-box">
                        <!-- <div class="blinker"></div> -->
                        <h2 class="slide-title">Les artistes</h2>
                    </div>

                    <p>Nous sommes ouvert à tout type de pratiques artistiques (encrées ou bien émergentes).</p>
                    <p>La seule contrainte de création est le lieu où prendra place la capsule.</p>
                    <p>L’expérience vous tente ? <span class="soft-scroll">Contactez-nous !</span></p>
                </div>
            </div>

        <!-- Lieux -->
        	<div class="slide" id="slide-lieux">
                <img class="forme3" src="img/FORMES/3.png">
                <div class="content">
                    <div class="type-box">
                        <!-- <div class="blinker"></div> -->
                        <h2 class="slide-title">Les lieux</h2>
                    </div>
                    <p>Capsule entre partout, même là où on l’attend le moins. Vous pensez à un lieu où le format Capsule aurait sa place ? <span class="soft-scroll">Proposez le nous !</span></p>
                </div>
            </div>

        <!-- Formulaires -->
            <div class="slide" id="slide-contact">
                <!-- <img class="forme4" src="img/FORMES/4.png"> -->
                <!-- Dans formulaire.html, attention a ajouter class='slide' -->
                <div>
                    <a class="facebook" target="_blank" href="https://www.facebook.com/capsuleBeta"></a>
                </div>
                <div>
                    <a href="mailto:bonjourcapsule@gmail.com?subject=Bonjour%20Capsule&body=Bonjour%20Capsule,%20comment%20ça%20va%20%3F">
                        <button>Nous contacter</button>
                    </a>
                </div>
            </div>
        </div>
    <!-- Footer -->

<?php require 'footer.php'; ?>
