<?php
require_once 'Personnage.php';

class Urssaf extends Personnage 
{
    protected $vie = 999;
    public $defense = 999;

     public function degats(Personnage $perso)
    {
        return $this->randomizer->rand(99,100);
    }

    public function getDescription()
    {
        
        return $this->getNom().' Agent de Urssaf ';

    }

    public function getAttaque()
    {
        return 'Envoye la facture';
    }

    public function reset() 
    {
        $this->vie = 999;
         $this->defense = 999;
        $this->randomizer->reset();
    }

}