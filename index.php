<?php 
    require 'database.php';

    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PokéStream - Accueil</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="img/icon.png" type="image/gif">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container admin">
            <img src="img/Logo.png" alt="" class="picto">
            <br>
            <br>
            <h3>Bienvenue sur PokéStream, le site de streaming de Hardi Tabuna !</h3>
            <h3>Vous pouvez retrouver ci-dessous les épisodes de l'arc Ligue d'Alola de la série Pokémon Soleil & Lune.</h3>
            <h3>Bon visionnage !</h3><br><br>
            
            <div id="menu" class="row">
                <ul id="list">
                    <?php
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM episodes');
                        while($ep = $statement->fetch())
                        {
                            echo '<li><a class="btn btn-warning" href="stream.php?id='. $ep["id"] .'">'. $ep["name"] .'</a></li>';
                        }
                        Database::disconnect();
                    ?>                    
                </ul>
            </div>
            <br><br>
        </div>
    </body>
</html>