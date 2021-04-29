<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout-produit</title>
    <link rel="stylesheet" href="style/style.css">    
</head>
<body><div class="continue">
<?php include "navigation.php";?> 
<section>
<h1>Veuillez ajouter ici vos produit</h1>
    <section>
        <div id="ajout-form">
    <form action= "Ajouter.php" method="POST" enctype="multipart/form-data">
    <label for="nom">Nom du produit</label>
    <input type="text" id="nom" name="nom" required> 
    </br>
    <label for="prix">Prix du produit</label>
	<input type="number" id="prix" name="prix" required> 
    </br>
    <label for="description">Description du produit</label>
    <input type="text" id="description" name="description" required>
    </br>
    <label for="quantite">Quantite</label>
    <input type="number" id="quantite" name="quantite" required>
    </br> 
    <label for="photo">image du produit</label>
	<input type="file" accept="image/png, image/jpeg, image/jpg" id="photo" name="photo" required>
    </br>
    <button type= "submit" name="Ajouter">Ajouter</button><br>
    </form>
    </div>
    </section>
<?php 
if(isset($_POST['Ajouter'])){
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('PASSWD', '');
    define('DBNAME', 'produits');
    $cnx = new mysqli(SERVER,USER,PASSWD,DBNAME);
    
    $photo=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];

    $sql = "INSERT INTO produit VALUES ('{$nom}','{$prix}','{$description}','{$quantite}','{$photo}')";
    $ok = $cnx->query($sql);
    mysqli_close($cnx);

    echo "<br> le produit <b>''$nom''</b> a ete ajoute ";
}   
?></div>
   <!-- </section> -->
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