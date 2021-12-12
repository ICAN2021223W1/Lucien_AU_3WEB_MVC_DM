<?php

class Marque{

    protected $id;
    private $nom;

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setNom(string $nom):self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom():string
    {
        return $this->nom;
    }

    public function __toString()
    {
    return "
    <tr>
    <td>".$this->getNom()."</td>
    <td><a class='btn btn-light' href='index.php?p=marque_show&marque=".$this->getId()."'>Afficher</a></td>
    <td><a class='btn btn-danger' href='index.php?p=marque_delete&marque=".$this->getId()."'>Supprimer</a></td>
    </tr>
    ";
    }


}







?>