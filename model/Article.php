<?php
class Article
{
    
    private $titre_a;
    private $contenu_a;
    private $auteur_a;
    private $date_p;
    private $image_a;
    private $categorie_a;
    private $video_a;
   

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

    public function getimage_a()
    {
        return $this->image_a;
    }

    public function getcategorie_a()
    {
        return $this->categorie_a;
    }

    public function getvideo_a()
    {
        return $this->video_a;
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

    public function setimage_a($e)
    {
        $this->image_a=$e;
    }

    public function setcategorie_a($f)
    {
        $this->categorie_a=$f;
    }

    public function setvideo_a($g)
    {
        $this->video_a=$g;
    }

    public function __construct($a,$b,$c,$d,$e,$f,$g)
    {
        $this->titre_a="$a";
        $this->contenu_a="$b";
        $this->auteur_a="$c";
        $this->date_p="$d";
        $this->image_a="$e";
        $this->categorie_a="$f";
        $this->video_a="$g";
       
    }


}


?>