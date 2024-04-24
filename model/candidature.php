<?php
class condidatures
{
    private $id_candidature;
    private $id_offre;
    private $date_candidature;


    

    public function __construct($b,$c,$d,$e,$f)
    {
        $this->id_candidature=$b;
        $this->id_offre=$c;
        $this->date_candidature=$d;
    }

    //Getters:

    public function getid_candidature()
    {
        return $this->id_candidature;
    }

    public function getid_offre()
    {
        return $this->id_offre;
    }

    public function getdate_candidature()
    {
        return $this->date_candidature;
    }


    //Setters:


    public function setid_candidature($a)
    {
        $this->id_candidature=$a;
    }
    public function setid_offre($c)
    {
        $this->id_offre=$c;
    }

    public function setdate_candidature($d)
    {
        $this->date_candidature=$d;
    }

}


?>