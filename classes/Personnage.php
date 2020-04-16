<?php 

abstract class Personnage{
    protected $nom;
    protected $vie = 100;
    protected $menace ;
    protected $experience = 0;
    protected $gagnerExperience;
    protected $randomizer;
    
    
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
    
    public function attaquer(Personnage $perso)
    {
        
        if(!$this->vivant()){
            throw new Exception('Un personnage mort , ne peut pas frapper');
        }
        $degats = $this->degats($perso);
        
        $perso->vie = $perso->vie - $degats;
    
        return $degats;
    }

    abstract public function degats(Personnage $perso);
    
    
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
    
    public function getExperience()
    {
        return $this->experience;
    }
    
    public function gagnerExperience()
    {
        $this->experience = $this->experience + 1;
    }

    public function reset() 
    {
        $this->vie = 100;
        $this->randomizer->reset();
    }

  abstract  public function getDescription();

  abstract public function getAttaque();

}

