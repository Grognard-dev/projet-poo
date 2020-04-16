<?php
require 'boot.php';
require 'classes/Jeu.php';
require 'classes/Magicien.php';
require 'classes/Barbare.php';
require 'classes/Randomizer.php';



if(!isset($_SESSION['game'])){
    $randomizer = new Randomizer($_GET['seed']??rand());
    $perso = new Magicien('Mike','philipe je sais ou tu te cache !, viens ici que je te bute ******',$randomizer);
    $perso2 = new Barbare('Phillipe','salaud ! viens ici espece d******',$randomizer);
    $jeu = new Jeu($perso,$perso2,$randomizer);
}else{
    $jeu = unserialize($_SESSION['game']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<h1>Alerte cobra</h1>
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
        <a href="index.php">Recommencer</a>
        <?php } ?>
        
        </body>
        </html>
        
        <?php 
        if(!$jeu->ended()){
            $_SESSION['game'] = serialize($jeu);
        }
        
        