<?php 
class Jeu
{
    public $perso;
    public $perso2;
    public $tour = 0;
    public function __construct(Personnage $perso, Personnage $perso2)
    {
        $this->perso = $perso;
        $this->perso2 = $perso2;
    }
    
    public function tour()
    {
        $piece = rand(1,2);
        $this->tour = $this->tour+1;
        $this->afficher('début du tour :'.$this->tour);
        try{
            if($piece == 1){
                $this->perso->frapper($this->perso2);
                $this->perso2->frapper($this->perso);
            }else{
                $this->perso2->frapper($this->perso);
                 $this->perso->frapper($this->perso2);
            }
            
            
        }catch (Exception $e){

        }
        $this->afficher('##############################################');
    }
    
    public function resultats()
    {
        if($this->perso->vivant()){
            $this->afficher($this->perso->getNom().' gagne avec '.$this->perso->getVie().' PV ');
        }else{
            $this->afficher($this->perso2->getNom().' gagne avec '.$this->perso2->getVie()." PV ");
        }
    }
    
    public function afficherMenaces(){
            $this->perso->menace();
            $this->perso2->menace();
    }

    public function started(){
        return $this->tour>0;
    }
    
    public function ended(){
        return !$this->perso->vivant() || !$this->perso2->vivant();
    }
    
    
    private function afficher(string $text)
    {
        echo ' # '.$text."\n";
    }
}










