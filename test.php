<?php

class Vehicule{
    public $roue;

    public function __construct(int $roue)
    {
        $this->roue = $roue;
    }

    public function deplace()
    {
        echo 'je me deplace sur '.$this->roue." roue \n";
    }

    protected function test()
    {
       echo "test\n";
    }

    private function test2()
    {
        echo "test2\n";
    }
}

class Velo extends Vehicule{

    public function __construct()
    {
        parent::__construct(2);
    }

    public function deplace()
    {
        echo 'Je pedale sur '.$this->roue." roue\n";
    }
}

class Tricycle extends Velo{

public $roue = 3;
    public function __construct(){
       
     
    }
}

class Voiture extends Vehicule{
  public $roue = 4;

    public function __construct(){

    }

    public function demarrer()
    {
        echo "vroom\n";
    }
}

abstract class Personnage{
    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

  abstract  public function attaque();
    
}

class Magicien extends Personnage
{
    public function attaque()
    {
        echo $this->nom." lance un sort \n";
    }
}

class Barbare extends Personnage
{
    public function attaque()
    {
        echo $this->nom." Tape sur sa tronche \n";
    }
}

$barbare = new Barbare('Bob');
$magicien = new Magicien('gandoulf');

$barbare->attaque();
$magicien->attaque();

//instances de vehicule

$velo = new Velo();
$tricycle = new Tricycle();
$voiture = new Voiture();

$velo->deplace();
$voiture->demarrer();
$tricycle->deplace();