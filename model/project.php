<?php
class project
{
    private $IDp;
    private $ProjectName;
    private $Category;
    private $Description;
    private $ProjectCost;
    private $TacheDemande;

    public function __construct($b,$c,$d,$e,$f,$a)
    {
        $this->IDp=$b;
        $this->ProjectName=$c;
        $this->Category=$d;
        $this->Description=$e;
        $this->ProjectCost=$f;
        $this->TacheDemande=$a;
    }

    //Getters:

    public function getid_project()
    {
        return $this->IDp;
    }

    public function getProjectName()
    {
        return $this->ProjectName;
    }

    public function getcategory()
    {
        return $this->Category;
    }

    public function getdescription()
    {
        return $this->Description;
    }

    public function getprojectcost()
    {
        return $this->ProjectCost;
    }

    public function gettache()
    {
        return $this->TacheDemande;
    }

    //Setters:


    public function setid_project($a)
    {
        $this->IDp=$a;
    }
    public function setprojectname($c)
    {
        $this->ProjectName=$c;
    }

    public function setcategory($d)
    {
        $this->Category=$d;
    }

    public function setdescription($e)
    {
        $this->Description=$e;
    }

    public function setprojectcost($f)
    {
        $this->ProjectCost=$f;
    }

    public function settache($g)
    {
        $this->TacheDemande=$g;
    }
}


?>