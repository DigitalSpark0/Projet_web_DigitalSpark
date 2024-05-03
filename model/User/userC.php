<?php
class UserClass
{
    private $id_utilisateur;
    private $prenom;
    private $nom;
    private $Email;
    private $Password;
    private $Role;

    public function __construct($prenom, $nom, $Email, $Password, $Role)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Role = $Role;
    }

    public function getID_USER()
    {
        return $this->id_utilisateur;
    }

    public function getFirst_Name()
    {
        return $this->prenom;
    }

    public function getLast_Name()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function getRole()
    {
        return $this->Role;
    }

    public function setID_USER($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }
}
?>
