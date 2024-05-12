<?php
    class tache
    {
        private $IDt;
        private $IDp;
        private $NomTache;
        private $DescriptionT;
        private $Deadline;
        private $Priority;
        private $Notes;

        public function __construct($b,$c,$d,$e,$f,$g)
    {
        //$this->IDt=$a;
        $this->IDp=$b;
        $this->NomTache=$c;
        $this->DescriptionT=$d;
        $this->Deadline=$e;
        $this->Priority=$f;
        $this->Notes=$g;
    }

    //Getters:
    
    public function getid_tache()
    {
        return $this->IDt;
    }

    public function getid_project()
    {
        return $this->IDp;
    }

    public function getNomTache()
    {
        return $this->NomTache;
    }

    public function getdescription()
    {
        return $this->DescriptionT;
    }

    public function getdeadline()
    {
        return $this->Deadline;
    }

    public function getpriority()
    {
        $valideValues = ['low','medium','high'];
        if(in_array($this->Priority,$valideValues))
        {
            return $this->Priority;
        }
        else {
            return $valideValues[0];
        }
        
    }

    public function getnotes()
    {
        return $this->Notes;
    }

     //Setters:


     public function setid_tache($a)
     {
         $this->IDt=$a;
     }
     public function setid_project($b)
     {
         $this->IDp=$b;
     }
 
     public function setnomtache($c)
     {
         $this->NomTache=$c;
     }
 
     public function setdescription($d)
     {
         $this->DescriptionT=$d;
     }
 
     public function setdeadline($e)
     {
         $this->Deadline=$e;
     }
 
     public function setpriority($f)
     {
         $this->Priority=$f;
     }

     public function setnotes($g)
     {
        $this->Notes=$g;
     }
    }
?>