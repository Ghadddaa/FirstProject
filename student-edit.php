<?php
session_start();
include('connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Edit & Update data into database </title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update data into database 
                            <a href="Génie.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $etudiant_id = $_GET['id'];

                            $query = "SELECT * FROM etudiant WHERE id=:stud_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':stud_id' => $etudiant_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); 
                        }
                        ?>
                        <form action="code.php" method="POST">

                            <input type="hidden" name="etudiant_id" value="<?=$result->id?>" />

                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text" name="Nom" value="<?= $result->Nom; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" name="Prenom" value="<?= $result->Prenom; ?>" class="form-control" />

                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email" value="<?= $result->Email; ?>" class="form-control" />
                            </div>
                            <div>
        <input type="radio" name="Sexe" value="Masculin" id="homme">
        <label for="homme">Masculin</label>
    </div>
    <div>
        <input type="radio" name="Sexe" value="Féminin" id="femme">
        <label for="femme">Féminin</label>
    </div>
</div>
                            <div class="mb-3">
                                <label>Numéro de Télèphone</label>
                                <input type="text" name="Num" value="<?= $result->Num; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_student_btn" class="btn btn-primary">Modifier Etudiant</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
  </body>
</html>