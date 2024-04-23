<?php

/*
Objectif : Permettre à l'utilisateur de créer son compte
 
Contenu de la page : 
	Titre de la page : h1 "Création de compte utilisateur"
	Formulaire de création de compte : 
		- Nom (nom) : input type text - obligatoire
		- E-mail (email) : input type text - obligatoire
		- Mot de passe (mot_de_passe) : input type text - obligatoire
		- Bouton "Valider" (valider) : input type submit
 
Action à la validation du formulaire :
	- Détecter la validation formulaire
	- Récupérer les données du formulaire : nom, email, mot_de_passe
	- Enregistrement des données dans la base : insert sql
*/

// connexion a la base des donnes
$serveur = "localhost";
$utilisateur = "root"; 
$mot_de_passe = ""; 
$base_de_donnees = "utilisateur";
// connexion avec la base de donnée
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if (!$connexion) { 
    die("Échec de la connexion : " . mysqli_connect_error()); 
} else { 
    echo "Connexion réussie à la base de données.";
}

print_r($_POST);
// 6) verification de la validation du formulaire
if (isset($_POST['creer'])) {

    // 7) requete d'insertion dans la table compte
    $sql = "INSERT INTO compte (nom, email, mot_de_passe) VALUES ('{$_POST['nom']}', '{$_POST['email']}', '{$_POST['motdepasse']}')";
    $resultats = mysqli_query($connexion, $sql); 

    // 8) Redirection vers la page de connexion
    header("Location: connexion-compte.php");

}

    
?>

<!-- // 1) balises ouvrante html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation du compte</title>
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
    <style>
        h1{
            text-align: center;
            text-decoration: underline;
            margin-top: 20px;
        }
    </style>

  

</head>
<body>
    <main class="container">

    <!-- // 3)titre de la page  -->
    <h1>Création de compte utilisateur</h1>

    <!-- // 4) formulaire de creation de compte  -->
        <form action="" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <br><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="motdepasse">Mot de passe :</label>
            <input type="password" id="motdepasse" name="motdepasse" required>
            <br><br>
            <input type="submit"  name="creer" value="Créer">
        </form>

   
    <!-- // 2) fin des balises html  -->
    </main>
</body>
</html>












    



