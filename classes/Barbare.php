<?php
require_once 'Personnage.php';

class Barbare extends Personnage 
{
    public $vie = 150;
     public $defense = 50;

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

    public function reset() 
    {
        $this->vie = 150;
         $this->defense = 50;
        $this->randomizer->reset();
    }
}