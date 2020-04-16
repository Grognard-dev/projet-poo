<?php 
class Randomizer{

    public $seed;
    public $compteur = 0;
   public function __construct($seed)
    {
      $this->seed = $seed;
      $this->init();
    }

    public function init(){
        srand($this->seed);
        for ($i = 0; $i < $this->compteur; $i++){
            rand();
        }
    }

    public function rand($min,$max){
      $this->compteur =  $this->compteur+1;
        return rand($min,$max);
    }

    public function __wakeup()
    {
        $this->init();
    }
}