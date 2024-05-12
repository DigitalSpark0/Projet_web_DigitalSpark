<?php
class candidatures
{
    private $id_candidature;
    private $id_offre;
    private $date_candidature;
    private $cv;
    private $disponibilté;


    

    public function __construct($c,$d,$e,$f)
    {
        //$this->id_candidature=$b;
        $this->id_offre=$c;
        $this->date_candidature=$d;
        $this->cv=$e;
        $this->disponibilté=$f;
    }

    //Getters:

    public function getid_cand()
    {
        return $this->id_candidature;
    }

    public function getid_offre()
    {
        return $this->id_offre;
    }

    public function getdate_cand()
    {
        return $this->date_candidature;
    }
    public function getcv()
    {
        return $this->cv;
    }
    public function getdisponibilite()
{
    return $this->disponibilté;
}



    //Setters:


    public function setid_cand($a)
    {
        $this->id_candidature=$a;
    }
    public function setid_offre($c)
    {
        $this->id_offre=$c;
    }

    public function setdate_cand($d)
    {
        $this->date_candidature=$d;
    }
    public function setcv($e)
    {
        $this->cv=$e;
    }
    public function setdisponibilté($f)
    {
        $this->disponibilté=$f;
    }
    

}


?>