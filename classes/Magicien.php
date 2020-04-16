<?php
require_once 'Personnage.php';

class Magicien extends Personnage 
{
    protected $vie = 80;

     public function degats(Personnage $perso)
    {
        return $this->randomizer->rand(15,75);
    }

    public function getDescription()
    {
        
        return $this->getNom().' le Magicien ';

    }

    public function getAttaque()
    {
        return 'lance une boule de feu';
    }


}