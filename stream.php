<?php 
    require 'database.php';
                    
    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect();

    //La base se prépare à repérer un épisode dans un tableau puis va le chercher
    $statement = $db->prepare('SELECT * FROM episodes WHERE episodes.id = ?');
    $statement->execute(array($id));
    if($statement->rowCount()>0)
    {
        $item = $statement->fetch();        
    }
    else
    {
        header('Location: 404.php'); exit();
    }

    //La base se prépare à repérer l'épisode précédent dans un tableau puis va le chercher
    $statement2 = $db->prepare('SELECT * FROM episodes WHERE episodes.id = ?-1');
    $statement2->execute(array($id));
    $item2 = $statement2->fetch();

    //La base se prépare à repérer l'épisode suivant dans un tableau puis va le chercher
    $statement3 = $db->prepare('SELECT * FROM episodes WHERE episodes.id = ?+1');
    $statement3->execute(array($id));
    $item3 = $statement3->fetch();

    $statement4 = $db->query('SELECT * FROM episodes');
    $ep = $statement4->fetch();
    
    Database::disconnect();    

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
        <title>PokéStream - Streaming</title>
        <link rel="icon" href="img/icon.png" type="image/gif">
        <link rel="stylesheet" href="css/style.css" type="text/css" defer>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </head>
    <body>

        <div class="container site">
            <img src="img/Logo.png" alt="" class="picto">
            <br>

            <button type="button" class="btn btn-secondary" id="retour">
                <a href="index.php"><i class="bi bi-house-door-fill"></i> Retour</a>
            </button>
            <br><br>

            <div id="menu">
                <?php echo '
                    <div id="div-video" style="border-radius: 30px;" class="ratio ratio-16x9">
                            <video style="border-radius: 30px;" controls controlsList="nodownload"  >
                                <source src="videos/'. $item['video'] .'"  type="video/mp4">
                            </video>                     
                    </div>'
                ?>           
                <?php
                    //Connexion à la base de données
                    $db = Database::connect();

                    //Affiche seulement le bouton suivant s'il n'y a pas d'épisode précédent
                    if(empty($item2))
                    {
                    echo    '<div class="buttons">
                                <a class="btn btn-dark" href="stream.php?id='. $item3["id"] .'">Suivant <i class="bi bi-arrow-right"></i></a>
                            </div>';
                    }
                    //Affiche seulement le bouton précédent s'il n'y a pas d'épisode suivant
                    elseif(empty($item3))
                    {
                    echo    '<div class="buttons">
                                <a class="btn btn-dark" href="stream.php?id='. $item2["id"] .'"><i class="bi bi-arrow-left"></i> Précédent</a>
                            </div>';                        
                    }
                    //Affiche les 2 boutons
                    else
                    {
                    echo    '<div class="buttons">   
                                <a class="btn btn-dark" href="stream.php?id='. $item2["id"] .'"><i class="bi bi-arrow-left"></i> Précédent</a>
                                <a class="btn btn-dark" href="stream.php?id='. $item3["id"] .'">Suivant <i class="bi bi-arrow-right"></i></a>
                            </div>';
                    }
                    //Déconnexion de la base de données
                    Database::disconnect();
                ?>

                <div class="row">
                    <ul id="list">
                        <?php
                            //Connexion à la base de données
                            $db = Database::connect();
                            $statement = $db->query('SELECT * FROM episodes');
                            while($ep = $statement->fetch())
                            {
                                //Chaque bouton à son propre id lié à son épisode
                                //Si l'id de l'épisode (établi dans la BDD) correspond à l'id d'un bouton, le bouton passe en classe active (btn btn-dark)
                                if($ep["id"] == $item["id"])
                                {
                                    echo '<li id='. $ep["id"] .'> <a class="btn btn-dark" style="color: #ffc107;" href=stream.php?id='. $ep["id"] .'>'. $ep["name"] .'</a>  </li>';
                                }
                                //Les autres restent en class normale
                                else
                                {
                                    echo '<li id='. $ep["id"] .'> <a class="btn btn-warning" href=stream.php?id='. $ep["id"] .'>'. $ep["name"] .'</a>  </li>';                              
                                }
                            }
                            //Déconnexion de la base de données
                            Database::disconnect();
                        ?>                    
                    </ul> 
                </div>

            </div>
        </div>
    </body>
</html>