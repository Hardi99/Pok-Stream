<?php 

require_once('database.php');

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Streaming</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" defer>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container admin">
            <img src="img/Logo.png" alt="" class="picto">
            <br><br>
                
            <div id="menu" class="row">
                <div class="container404">
                    <div class="container404content">
                        <h1>Erreur 404</h1>
                        <h2>Ooops !</h2>
                        <p>Cet épisode n'est pas disponible</p>
                        <ul id="list">
                            <li class="btn btn-warning"><a href="<?php echo "index.php" ?>">Revenir à l'accueil</a></li> 
                        </ul>
                    </div>
                </div>
            </div>
                <br><br>
        </div>
    </body>
</html>