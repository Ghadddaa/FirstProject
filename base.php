<?php 

include('connect.php');
 ?>
<!doctype html >
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>PHP PDO CRUD</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

            <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>
            <div class="card">
                <div class="card-header">
                    <h3> Gestion des Etudiants  
                    <a href="Génie.php" class="btn btn-danger float-end">BACK</a>
                            <a href="student-add.php" class="btn btn-primary float-end" > Ajouter Etudiant </a>
                            
                     </h3>
                    
                    </div>
            <div class="card-body">
                <table class="table table_bordered table-striped">
                   <thead> 
                     <tr> 
                        <th> Id </th>
                        <th> Nom </th> 
                        <th> Prenom</th> 
                        <th> Email </th> 
                        <th> Sexe </th> 
                        <th> Numéro de télèphone </th> 
                        <th> Modifer </th>
                        <th> Supprimer </th>
                     </tr>
                     </thead>
                    <tbody>
                        <?php
                         $query = "SELECT * FROM etudiant ";
                         $statement = $conn->prepare($query);
                         $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_OBJ);
                         $result = $statement->fetchAll();
                         if($result)
                         {
                            foreach($result as $row)  
                            { 
                                ?>
                                 <tr>
                                 <td> <?= $row->id; ?> </td>
                                <td> <?= $row->Nom ;?> </td>
                                <td> <?= $row->Prenom; ?> </td>
                                <td> <?= $row-> Email; ?> </td>
                                 <td> <?= $row->Sexe; ?> </td>
                                 <td> <?= $row->Num; ?> </td>
                                 <td> 
                                    <a href="student-edit.php?id=<?= $row->id; ?>" class="btn btn-primary"> Modifier </a>
                                 </td> 
                                 <td>  
                                 <form action="code.php" method="POST">
                                     <button type="submit" name="delete_student" value="<?=$row->id;?>" class="btn btn-danger">Supprimer</button>
                                 </form>
                                 </td>
                                 </tr> 
                                <?php 

                            }  
                         }
                         else 
                         {
                                    ?>
                                    <tr> 
                                        <td colspan="5"> No record found </td>
                                    </tr>
                                    <?php 
                         }
                        ?>
                       
                      </tbody>  
            </div>
        </div>
    </div>
</body>
     
