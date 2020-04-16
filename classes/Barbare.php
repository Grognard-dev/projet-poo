<?php
require_once 'Personnage.php';

class Barbare extends Personnage 
{
    protected $vie = 150;

     public function degats(Personnage $perso)
    {
        return $this->randomizer->rand(5,50);
    }

     public function getDescription()
    {
        return $this->getNom().' le Barbare ';
    }

    public function getAttaque()
    {
        return 'frappe avec sa hache';
    }


}