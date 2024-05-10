<?php
class commande
{
    private $idservice;
    private $date_c;
    private $statut_c;
    private $montant_c;

    public function __construct($f,$a,$b,$c)
    {
        $this->idservice="$f";
        $this->date_c="$a";
        $this->statut_c="$b";
        $this->montant_c="$c";
    }

    //Getters:
    public function getidservice()
    {
        return $this->idservice;
    }

    public function getdate_c()
    {
        return $this->date_c;
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
    public function setidservice($a)
    {
        $this->idservice=$a;
    }

    public function setdate_c($b)
    {
        $this->date_c=$b;
    }

    public function setstatut_c($d)
    {
        $this->statut_c=$d;
    }

    public function setmontant_c($e)
    {
        $this->montant_c=$e;
    }
}


?>