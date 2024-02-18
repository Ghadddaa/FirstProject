<?php
require_once "connect.php"; 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //  verification logic 
    
    $correctUsername = "admin";
    $correctPassword = "password";

    if ($username == $correctUsername && $password == $correctPassword) {
        // Redirect to the desired page after successful authentication
        header("Location: base.php");
        exit;
    } else {
        // error message for incorrect username/password
        header("Location: login_error.php");
        exit;
    }
}
?>
 


<!DOCTYPE html>
<html>
<head>
    <title>Gestion Inscription Etudiants</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

	
    <?php 
    
    if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-success">
        <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="left-side">
            <button onclick="afficherAuthentification()">Espace Administrateur</button><br>
            <button onclick="afficherInscription()">Espace Etudiant</button><br>
        </div>
        <div class="right-side">
            <div id="authentification" style="display:none">
                <fieldset>
                    <legend>Authentification</legend>
                    <form method="post">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Mot de passe :</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Se connecter">
                    </form>
                </fieldset>
            </div>
            <div id="Inscription" style="display:none">
                <fieldset>

                    <legend>Inscription</legend>
                    <form>
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="mot_de_passe">Mot de passe :</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="button" value="valider" onclick="Inscription()">

                       

                    </form>
                </fieldset>
            </div>

            
          
        </div>
        
    </div>
    
    <script>
        function afficherAuthentification() {
            var authentification = document.getElementById("authentification");
            if (authentification.style.display === "none") {
                authentification.style.display = "block";
            } else {
                authentification.style.display = "none";
            }
        }
        function afficherInscription() {
            var Inscription = document.getElementById("Inscription");
            if (Inscription.style.display === "none") {
                Inscription.style.display = "block";
            } else {
                Inscription.style.display = "none";
            }
        }
        function Inscription(){
           
            window.location.href = "Formulaire.php";
        }
    </script>


</body>
</html>