<?php
class Abonnement
{
    
    private $email_ab;
    private $date_ab;
    private $token;
   
    
    //Getters:
    

    public function getemail_ab()
    {
        return $this->email_ab;
    }


    public function getdate_ab()
    {
        return $this->date_ab;
    }

    public function gettoken()
    {
        return $this->token;
    }
    //Setters:
    

    public function setemail_ab($a)
    {
        $this->email_ab=$a;
    }

    public function setdate_ab($b)
    {
        $this->date_ab=$b;
    }

    public function settoken($c)
    {
        $this->token=$c;
    }

    public function __construct($a,$b)
    {
        $this->email_ab="$a";
        $this->date_ab="$b";
        $this->token = 0;
       
    }


}


?>