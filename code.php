<?php
session_start();
include('connect.php');

if(isset($_POST['delete_student']))
{
    $etudiant_id = $_POST['delete_student'];

    try {

        $query = "DELETE FROM etudiant WHERE id=:stud_id";
        $statement = $conn->prepare($query);
        $data = [
            ':stud_id' => $etudiant_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: base.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: base.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}






if(isset($_POST['update_student_btn']))
{
    $etudiant_id = $_POST['etudiant_id'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $Sexe = $_POST['Sexe'];
    $Num = $_POST['Num'];

    try {

        $query = "UPDATE etudiant SET Nom=:Nom, Prenom=:Prenom, Email=:Email, Sexe=:Sexe, Num=:Num WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':Nom' => $Nom,
            ':Prenom' => $Prenom,
            ':Email' => $Email,
            ':Sexe' => $Sexe,
            ':Num' => $Num,
            ':stud_id' => $etudiant_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: base.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: base.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

 

if(isset($_POST['save_student_btn']))
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Email = $_POST['Email'];
    $Sexe = $_POST['Sexe'];
    $Num = $_POST['Num'];

    $query = "INSERT INTO etudiant (Nom, Prenom, Email, Sexe, Num) VALUES (:Nom, :Prenom, :Email, :Sexe, :Num)";
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
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: base.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: base.php');
        exit(0);
    }
}


?>