<?php
class Commentaire
{
    
    private $id_ar;
    private $id_ut;
    private $contenu_c;
    private $date_c;
   
    
    //Getters:
    

    public function getid_ar()
    {
        return $this->id_ar;
    }

    public function getid_ut()
    {
        return $this->id_ut;
    }

    public function getcontenu_c()
    {
        return $this->contenu_c;
    }

    public function getdate_c()
    {
        return $this->date_c;
    }


    //Setters:
    

    public function setid_ar($a)
    {
        $this->id_ar=$a;
    }

    public function setid_ut($b)
    {
        $this->id_ut=$b;
    }

    public function setcontenu_c($c)
    {
        $this->contenu_c=$c;
    }

    public function setdate_c($d)
    {
        $this->date_c=$d;
    }

    public function __construct($a,$b,$c,$d)
    {
        $this->id_ar="$a";
        $this->id_ut="$b";
        $this->contenu_c="$c";
        $this->date_c="$d";
       
    }


}


?>