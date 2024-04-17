<?php 

class reponses
{
    
    private $contenu;
    
    
    //constuct par defaut:
    public function construct()
    {
        
        $this->contenu="";
     
        
    }

    //Getters:
 

    public function getcontenu()
    {
        return $this->contenu;
    }

  

    //Setters:
    
    
    public function setcontenu($b)
    {
        $this->contenu=$b;
    }

    


    //construct parametrée:
    public function __construct($b)
    {
        
        $this->contenu="$b";
      
        
       
    }
    //affichage:
    public function afficher()
    {
        
        echo "nom:".$this->contenu;
        

    }
}