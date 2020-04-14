<?php 
require 'Personnage.php';
require 'Jeu.php';

$perso = new Personnage('phillipe');
$perso->parler('tu va mourir');

$perso2 = new Personnage('Mike');
$perso2->parler('OH non !');

$jeu = new Jeu($perso,$perso2);
while ($perso->vivant() && $perso2->vivant()){
    $jeu->tour();
}
$jeu->resultats();