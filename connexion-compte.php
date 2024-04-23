<?php
/*
Objectif : Permettre à l'utilisateur de se connecter à son compte
 
Contenu de la page : 
	Titre de la page : h1 "Connexion au compte utilisateur"
	Formulaire de connexion au compte : 
		- E-mail (email) : input type email - obligatoire
		- Mot de passe (motdepasse) : input type password - obligatoire
		- Bouton "Connecter" (creer) : input type submit
 
Action à la validation du formulaire :
	- Récupérer les données du formulaire : email, motDePasse
	- Vérification de l'existence d'un utilisateur en base avec l'email et le mot de passe correspondant
	- Afficher un message selon le résultat de la vérification
*/

// 1) Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root"; 
$mot_de_passe = ""; 
$base_de_donnees = "utilisateur";
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// 2) Vérification de la connexion à la base de données
if (!$connexion) { 
    die("Échec de la connexion : " . mysqli_connect_error()); 
}

// 3) Vérification si des données ont été envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs des champs du formulaire
    $email = $_POST['email'];
    $motDePasse = $_POST['motdepasse'];

    // 4) Requête SQL pour vérifier l'existence de l'utilisateur dans la table de compte
    $sql = "SELECT * FROM compte WHERE email = '$email' AND mot_de_passe = '$motDePasse'";
    $resultat = mysqli_query($connexion, $sql);

    header("Location: connexion-compte.php");
    exit; // Terminer le script après la redirection
    
}
// 4) Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>



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
    <h1>Connexion au compte</h1>
    <!-- // 4) formulaire de creation de compte  -->
        <form action="" method="POST">
            <!-- <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <br><br> -->
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="motdepasse">Mot de passe :</label>
            <input type="password" id="motdepasse" name="motdepasse" required>
            <br><br>
            <input type="submit"  name="creer" value="Connecter">
        </form>
   
    <!-- // 2) fin des balises html  -->
    </main>
</body>
</html>
