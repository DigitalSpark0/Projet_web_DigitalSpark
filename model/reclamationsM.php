<?php 

class reclamations
{
   
    private $sujet;
    private $description;
    

    //constuct par defaut:
    public function construct()
    {
       
        $this->sujet="";
        $this->description="";
        
        
        
    }

    //Getters:
   

    public function getsujet()
    {
        return $this->sujet;
    }

    public function getdescription()
    {
        return $this->description;
    }


  

    //Setters:
    
    public function setsujet($b)
    {
        $this->sujet=$b;
    }
    public function setdescription($b)
    {
        $this->description=$b;
    }

   

    //construct parametrée:
    public function __construct($b,$c)
    {
        
        $this->sujet="$b";
        $this->description="$c";
        
        
       
    }
    //affichage:
    public function afficher()
    {
        
        echo "nom:".$this->sujet;
        echo "mot de passe:".$this->description;
        
    }
}