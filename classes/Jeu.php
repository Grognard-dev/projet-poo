<?php 
class Jeu
{
    public $perso;
    public $perso2;
    public $randomiseur;
    public $tour = 0;
    public $infostours = [];
    
    public function __construct(Personnage $perso, Personnage $perso2, Randomizer $randomiseur)
    {
        $this->perso = $perso;
        $this->perso2 = $perso2;
        $this->randomiseur = $randomiseur;
    }
    
    public function tour()
    {
        $subit_perso1 = 0;
        $subit_perso2 = 0;
        $piece = $this->randomiseur->rand(1,2);
        $this->tour = $this->tour+1;
        try{
            if($piece == 1){
                $subit_perso1 =  $this->perso->attaquer($this->perso2);
                $subit_perso2 =    $this->perso2->attaquer($this->perso);
            }else{
                $subit_perso2 =    $this->perso2->attaquer($this->perso);
                $subit_perso1 =    $this->perso->attaquer($this->perso2);
            }
            
            
        }catch (Exception $e){
            
        }
        $this->afficher('##############################################<br>');
        
        $this->infostours[$this->tour] = [
            "piece"=>$piece,
            1 =>[
                "degats" => $subit_perso1,
                "vie" => $this->perso->getVie(),
                "defense" => $this->perso->getDefense(),
            ],
            2 =>[
                "degats" => $subit_perso2,
                "vie" => $this->perso2->getVie(),
                "defense" => $this->perso2->getDefense(),
                ]
            ];
            $this->afficherEtatdutour($this->infostours[$this->tour],$this->tour);
        }
        
        public function resultats()
        {
            if($this->perso->vivant()){
                 $this->afficher($this->perso->getDescription().' gagne avec '.' '.$this->perso->Armure().' Armure et'.$this->perso->getVie()." PV et gagne ".$this->perso->getExperience().' XP ');
            }else{
                $this->afficher($this->perso2->getDescription().' gagne avec '.' '.$this->perso2->Armure().' Armure et'.$this->perso2->getVie()." PV et gagne ".$this->perso2->getExperience().' XP ');
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
            echo $text."\n";
        }
        
        public function afficherEtatdutour($etat,$numero)
        {
            if($etat['piece'] ==1){
                $premierfrappeur = $this->perso;
                $deuxiemefrappeur = $this->perso2;
                $index1er = 1;
                $index2eme = 2;
            }else{
                $premierfrappeur = $this->perso2;
                $deuxiemefrappeur = $this->perso;
                $index1er = 2;
                $index2eme = 1;
            }
            echo ' tour: '.$numero.'<br>';
            echo $premierfrappeur->getDescription().' '.$premierfrappeur->getAttaque().' est fait '.$etat[$index1er]['degats'].' degats '.' <br> ';
            if($deuxiemefrappeur->vivant()){
                echo $deuxiemefrappeur->getDescription().' a encore '.$etat[$index2eme]['defense'].' '.$etat[$index2eme]['vie'].' point de vie '.'<br><br>';
                echo $deuxiemefrappeur->getDescription().' '.$deuxiemefrappeur->getAttaque().'  '.' est fait '.$etat[$index2eme]['degats'].' degats '.' <br> ';
                if($premierfrappeur->vivant()){
                    echo $premierfrappeur->getDescription().' a encore '.$etat[$index1er]['defense'].' '.$etat[$index1er]['vie'].' point de vie '.'<br><br>';
                }else{
                    echo $premierfrappeur->getDescription().' est mort<br>';
                }
            }else{
                echo $deuxiemefrappeur->getDescription().' est mort<br>';
            }
        }
        public function restart()
        {
            $this->tour = 0;
            $this->randomiseur->reset();
            $this->perso->reset();
            $this->perso2->reset();
            $this->infostours = [];
        }
        
}
    
    
    
    
    
    
    
    
    
    
    