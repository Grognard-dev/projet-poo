<?php 

class Personnage{
    private $nom;
    private $vie = 100;
    private $menace ;
    private $experience = 0;
    private $gagnerExperience;
    private $force = 50;
    public $randomizer;
    
    
    public function __construct(string $nom,string $menace, Randomizer $randomizer)
    {
        $this->nom = $nom;
        $this->menace = $menace;
        $this->randomizer = $randomizer;
    }
    
    public function parler(string $phrase)
    {
        if(!$this->vivant()){
            throw new Exception('Les morts ne parlent pas');
        }
        echo $this->nom.":$phrase<br>";
    }
    
    public function menace(){
        $this->parler($this->menace);
    }
    
    public function frapper(Personnage $perso)
    {
        
        if(!$this->vivant()){
            throw new Exception('Un personnage mort , ne peut pas frapper');
        }
        $degats = $this->randomizer->rand(1,35);
        
        $perso->vie = $perso->vie - $degats;
    
        return $degats;
    }
    
    public function vivant()
    {
        return ($this->vie > 0);  
    }
    
    public function getVie()
    {
        return  $this->vie;
    }
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getForce()
    {
        return $this->force;
    }
    
    public function getExperience()
    {
        return $this->experience;
    }
    
    public function gagnerExperience()
    {
        $this->experience = $this->experience + 1;
    }
}

