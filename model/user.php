<?php
class offre
{
    private $id_offre;
    private $titre;
    private $statut;
    private $entreprise;
    private $date_pub;
    private $description;

    public function __construct($b,$c,$d,$e,$f)
    {
        $this->titre=$b;
        $this->statut=$c;
        $this->entreprise=$d;
        $this->date_pub=$e;
        $this->description=$f;
    }

    //Getters:

    public function getid_offre()
    {
        return $this->id_offre;
    }

    public function gettitre()
    {
        return $this->titre;
    }

    public function getstatut()
    {
        return $this->statut;
    }

    public function getentreprise()
    {
        return $this->entreprise;
    }

    public function getdate_pub()
    {
        return $this->date_pub;
    }

    public function getdescription()
    {
        return $this->description;
    }

    //Setters:


    public function setid_offre($a)
    {
        $this->id_offre=$a;
    }
    public function settitre($c)
    {
        $this->titre=$c;
    }

    public function setstatut($d)
    {
        $this->statut=$d;
    }

    public function setentreprise($e)
    {
        $this->entreprise=$e;
    }

    public function setdate_pub($f)
    {
        $this->date_pub=$f;
    }

    public function setdescription($g)
    {
        $this->description=$g;
    }
}


?>