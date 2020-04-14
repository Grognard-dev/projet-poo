<?php 

class Personnage{
    private $nom;
    private $vie = 100;
    private $menace ;
     public function __construct(string $nom,string $menace)
     {
         $this->nom = $nom;
        $this->menace = $menace;
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
        $this->parler('je frappe '.$perso->nom);

        $degats = rand(1,100);

    $perso->vie = $perso->vie - $degats;

    echo '# '.$perso->nom.' subit '.$degats." degats \n";
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
}

