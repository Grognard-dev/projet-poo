<?php
require 'boot.php';
require_once 'classes/Jeu.php';
require_once 'classes/Magicien.php';
require_once 'classes/Barbare.php';
require_once 'classes/Randomizer.php';



if(!isset($_SESSION['game'])){
 header('location: index.php');
 die;
}else{
    $jeu = unserialize($_SESSION['game']); 
}
if(isset($_POST['revoir'])){
    $jeu->restart();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fight club</title>
</head>
<body>
<h1>Fight club</h1>
<div>

</div>
<div>

<?php 
if(isset($_POST['button'])){
    foreach($jeu->infostours as $key => $etat ){
        $jeu->afficherEtatdutour($etat,$key);
    }

    $jeu->tour();
    if($jeu->ended()){
        $jeu->resultats();
        unset($_SESSION['game']);
    }
}
if(!$jeu->started()){
    $jeu->afficherMenaces();
}
?>
</div>
<?php if($jeu->perso->vivant() && $jeu->perso2->vivant()){?>
    <form  method="post">
    <button type="submit" name="button">Prochain tour</button>
    </form>
    <?php } ?>
    <?php
    if($jeu->ended()){
        ?>
        <form method="POST">
            <button type="submit" name="revoir">revoir</button>
        </form>
        <a href="index.php">faire une autre partie</a>
        <?php } ?>
        
        </body>
        </html>
        
        <?php 
        
            $_SESSION['game'] = serialize($jeu);
        
        
        