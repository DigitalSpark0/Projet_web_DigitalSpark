<?php
class Article
{
    
    private $titre_a;
    private $contenu_a;
    private $auteur_a;
    private $date_p;
   

    //Getters:
    

    public function gettitre_a()
    {
        return $this->titre_a;
    }

    public function getcontenu_a()
    {
        return $this->contenu_a;
    }

    public function getauteur_a()
    {
        return $this->auteur_a;
    }

    public function getdate_p()
    {
        return $this->date_p;
    }


    //Setters:
    

    public function settitre_a($a)
    {
        $this->titre_a=$a;
    }

    public function setcontenu_a($b)
    {
        $this->contenu_a=$b;
    }

    public function setauteur_a($c)
    {
        $this->auteur_a=$c;
    }

    public function setdate_p($d)
    {
        $this->date_p=$d;
    }

    public function __construct($a,$b,$c,$d)
    {
        $this->titre_a="$a";
        $this->contenu_a="$b";
        $this->auteur_a="$c";
        $this->date_p="$d";
       
    }


}


?>