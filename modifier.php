<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php session_start(); ?>
<header><?php include 'navigation.php'; ?></header>
<section>
    <div id="modif-form">
<?php
	if(!isset($_POST['Modifier'])) {
	$nom = $_POST['modifier'];
	$_SESSION['nom'] = $nom;
	echo "<br>Veuillez renseigner les nouvelles informations du produit <b>''$nom''</b></br><br>";
	}
	
?>
<form action="modifier.php" method="POST">
            <label for="prix">Nouveau Prix</label>
	        <input type="number" id="prix" name="prix" >
            </br>
            <label for="description">Nouvelle Description</label>
	        <input type="text" id="description" name="description">
			</br>
            <label for="quantite">Nouvelle Quantite</label>
	        <input type="number" id="quantite" name="quantite">
            </br>
			<button type="submit" name="Modifier">Modifier</button>
</form>
<?php
if(isset($_POST['Modifier'])){
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('PASSWD', '');
    define('DBNAME', 'produits');
    $cnx = new mysqli(SERVER, USER, PASSWD, DBNAME);
// Modification des informations d'un produit( le prix, la description et la quantite en stock seulement)

    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $quantite = $_POST['quantite'];
    

	$sqlprix = "UPDATE produit SET prix = $prix WHERE nom='{$_SESSION['nom']}'"; 
	$sqldescription = "UPDATE produit SET description = '$description' WHERE nom='{$_SESSION['nom']}'"; 
	$sqlquantite = "UPDATE produit SET quantite = $quantite WHERE nom='{$_SESSION['nom']}'"; 
    

 // si on veut tout simplement modifier la valeur d'un attribut (soit   prix soit description soit la quantite) parcontre on peut aussi laisser le champs vide genre grader la meme valeur.
    if($_POST['prix']!="" && $_POST['description']!="" && $_POST['quantite']!="" ){
        echo "<i><p>Le produit ''<b>{$_SESSION['nom']}</b>'' a ete completement modifie.</i></p>";
    }
    else {
        if($_POST['prix']!=""){
            $ok1 = $cnx->query($sqlprix);
            echo "<p>le prix du produit ''<b>{$_SESSION['nom']}</b>'' a ete modifier</p>";
        } 
        if($_POST['description']!=""){
            $ok2 = $cnx->query($sqldescription);
            echo "<p>la description du produit ''<b>{$_SESSION['nom']}</b>'' a ete modifier</p>";
        }
        if($_POST['quantite']!=""){
            $ok3 = $cnx->query($sqlquantite);  
            echo "<p>la quantite du produit ''<b>{$_SESSION['nom']}</b>'' a ete modifier</p>";
        }
        
        if($_POST['prix']=="" && $_POST['description']=="" && $_POST['quantite']==""){
            echo "<p>vous n'avez apporter aucune modification sur le produit ''<b>{$_SESSION['nom']}</i></b>''</p>";
        } 
    }
    mysqli_close($cnx);
	unset($_SESSION['nom']);
	session_destroy();
    
}   
?>
</div>
</section>
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
