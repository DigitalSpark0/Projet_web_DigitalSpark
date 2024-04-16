<?php
class service
{
    private $titre_s;
    private $desc_s;
    private $prix_s;
    private $duree_s;
    private $categorie_s;
    private $statut_s;

    public function __construct($a,$b,$c,$d,$e,$f)
    {
        $this->titre_s="$a";
        $this->desc_s="$b";
        $this->prix_s="$c";
        $this->duree_s="$d";
        $this->categorie_s="$e";
        $this->statut_s="$f";
    }

    //Getters:

    public function gettitre_s()
    {
        return $this->titre_s;
    }

    public function getdesc_s()
    {
        return $this->desc_s;
    }

    public function getprix_s()
    {
        return $this->prix_s;
    }

    public function getduree_s()
    {
        return $this->duree_s;
    }

    public function getcategorie_s()
    {
        return $this->categorie_s;
    }

    public function getstatut_s()
    {
        return $this->statut_s;
    }

    //Setters:

    public function settitre_s($b)
    {
        $this->titre_s=$b;
    }

    public function setdesc_s($c)
    {
        $this->desc_s=$c;
    }

    public function setprix_s($d)
    {
        $this->prix_s=$d;
    }

    public function setduree_s($e)
    {
        $this->duree_s=$e;
    }

    public function setcategorie_s($f)
    {
        $this->categorie_s=$f;
    }

    public function setstatut_s($g)
    {
        $this->statut_s=$g;
    }
}


?>