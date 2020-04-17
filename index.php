<?php
require 'boot.php';
require_once 'classes/Jeu.php';
require_once 'classes/Magicien.php';
require_once 'classes/Barbare.php';
require_once 'classes/Urssaf.php';
require_once 'classes/Randomizer.php';

function personnage($classe,$nom,$randomizer){

    if($classe == 'Magicien'){
        return  new Magicien($nom, 'SKWALALA',$randomizer);
        }
        if($classe == 'Barbare'){
            return new Barbare($nom,'CROM !!! ',$randomizer);
        }
         if($classe == 'Urssaf'){
            return new Urssaf($nom,'Tu va payer !',$randomizer);
        }
}

if(isset($_POST['button'])){
    $nom1 =  empty($_POST['nom']) ? null : $_POST['nom'];
    $classe1 =  empty($_POST['classe']) ? null : $_POST['classe'];
    $nom2 =  empty($_POST['nom2']) ? null : $_POST['nom2'];
    $classe2 = empty($_POST['classe2']) ? null : $_POST['classe2'];
    
    if($nom1 === null || $nom2 === null || $classe1 === null || $classe2 === null){
        $erreur = "Veuillez remplir tous les champs";
    }else{
        $randomizer = new Randomizer($_GET['seed']??rand());
        $perso = personnage($classe1,$nom1,$randomizer);
        $perso2 = personnage($classe2,$nom2,$randomizer);
         
         $jeu = new Jeu($perso,$perso2,$randomizer);
          $_SESSION['game'] = serialize($jeu);
          header('location: combat.php');
          die;
    }
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
    <h1>Fight club </h1>
    <form action="" method="POST">
    <label for="nom">Nom personnage</label>
    <input type="text" name="nom" id="nom">
    <label for="classe">Classe</label>
    <select name="classe" id="classe" >
        <option>Magicien</option>
        <option>Barbare</option>
        <option>Urssaf</option>
        </select>
    <br>
    <label for="nom2">Nom personnage</label>
    <input type="text" name="nom2" id="nom2">
    <label for="classe2">Classe</label>
    <select name="classe2" id="classe2">
        <option>Magicien</option>
        <option>Barbare</option>
        <option>Urssaf</option>
    </select>
    <button type="submit" name="button">Fight!</button>
  <?=  $erreur ?>
    </form>
</body>
</html>