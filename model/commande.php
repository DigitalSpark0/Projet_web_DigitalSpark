<?php
class commande
{
    private $idc;
    /*
    private $idu(id user);
    private $ids(id table service);
    */
    private $date_c;
    private $heure_c;
    private $statut_c;
    private $montant

    //Getters:
    public function getidc()
    {
        return $this->idc;
    }

    public function getdate_c()
    {
        return $this->date_c;
    }

    public function getheure_c()
    {
        return $this->heure_c;
    }

    public function getstatut_c()
    {
        return $this->statut_c;
    }

    public function getmontant_c()
    {
        return $this->montant_c;
    }

    //Setters:
    public function setidc($a)
    {
        $this->idc=$a
    }

    public function setdate_c($b)
    {
        $this->date_c=$b;
    }

    public function getheure_c($c)
    {
        $this->heure_c=$c;
    }

    public function getstatut_c($d)
    {
        $this->statut_c=$d;
    }

    public function getmontant_c($e)
    {
        $this->montant_c=$e;
    }
}


?>