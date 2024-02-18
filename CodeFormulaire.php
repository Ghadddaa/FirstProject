<?php
session_start();
include('connect.php');
   


if(isset($_POST['save_student_btn']))
{
    
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $Sexe = $_POST['Sexe'];
    $Num = $_POST['Num'];

    $query = "INSERT INTO etudiant (Nom, Prenom, Email, Sexe , Num) VALUES (:Nom, :Prenom, :Email, :Sexe , :Num)";
    $query_run = $conn->prepare($query);

    $data = [
        ':Nom' => $Nom,
        ':Prenom' => $Prenom,
        ':Email' => $Email,
        ':Sexe' => $Sexe,
        ':Num' => $Num,
    ];
    $query_execute = $query_run->execute($data);
        
    if($query_execute)
    {
        header('Location: Génie.php');
        $_SESSION['message'] = "inscription a été effectué avec succès.";
       
        
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: Formulaire.php'); // destination de formulaire pour etudiant
       
    }
}




?>
