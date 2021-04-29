<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <?php include "navigation.php";?>
</head>
<body>
<?php
// Connexion a la ase de donnees
define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWD', '');
define('DBNAME', 'produits');
$cnx = new mysqli(SERVER,USER,PASSWD,DBNAME);
// operation sur la base de donnees

$nom = $_POST['supprimer'];

$liste_brute = mysqli_query($cnx,"DELETE  from produit WHERE nom = '$nom'");

echo "<h1><li>le produit <b>''$nom''</b> a bien ete supprime !</li></h1>";

mysqli_close($cnx);
 ?>
     <footer>
     <div class="contenu-footer">         
            <div class="bloc footer-commentaire">
                <h3>Vos commentaires</h3>
                <ul class="liste-commentaire">
                <input type="text" name="" placeholder="Entrez votre e-mail" id="mail"><br>
    		<input type="text" name="" placeholder="Votre message" id="mess"><br>
    		<button onclick="window.location.href = 'https://mail.google.com/mail/u/0/#inbox';"><a id="contact">Envoyer</a></button>

            </div>

            <div class="bloc footer-contact">
                <h3>Restons en contact</h3>
                <p>(+221) 77 348 65 84</p>
                <p>azizdabakh97@gmail.com</p>
                <p>azizdabakh97@outlook.com</p>
                <p>29 Batrin Ouakam,Dakar,Senegal</p>
                <h6>&copy; Copyright 2021 LO fish Tout droit reserve</h6>
            </div>

            <div class="bloc footer-medias">
                <h3>Reseaux</h3>
                <ul class="liste-media">
                    <li><a href="https://www.facebook.com/abdouaziz.lo.16">
                      <img src="media/fb.png" alt="icones réseaux sociaux">Facebook</a></li>
                    <li><a href="https://www.instagram.com/ziza_lo/">
                      <img src="media/ig.png" alt="icones réseaux sociaux">Instagram</a></li>
                    <li><a href="https://twitter.com/azizlo10">
                      <img src="media/twit.png" alt="icones réseaux sociaux">Twitter</a></li>
                    <li><a href="https://github.com/Ziza-LO">
                      <img src="media/gh.png" alt="icones réseaux sociaux">Github</a></li>
                    <li><a href="https://www.linkedin.com/in/abdoul-aziz-lo-bb26521b5/">
                      <img src="media/li.png" alt="icones réseaux sociaux">linkedin</a></li>

                </ul>
            </div>
    </div>
    </div>	
</div>
</footer>
</body>
</html>
