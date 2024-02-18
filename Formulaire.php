<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Formulaire d'inscrire</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
    
            


                <div class="card">
                    <div class="card-header">
                        <h3>FORMULAIRE d'inscrire
                        
                        <a href="Génie.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        
                        <form action="CodeFormulaire.php" method="POST">  
                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text" name="Nom" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" name="Prenom" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="Email" class="form-control" />
                            </div>
                            <div class="mb-3">
    <label>Sexe</label>
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
                                <label>Numéro de téléphone</label>
                                <input type="text" name="Num" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student_btn" class="btn btn-primary">S'INSCRIRE </button>
                                


                            </div>
                            
                           
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>