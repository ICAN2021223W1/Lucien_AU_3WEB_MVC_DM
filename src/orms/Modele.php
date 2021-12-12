<?php

    class Modele{

        protected $id;
        private $nom;
        private $prix;
        private $marque;

        public function setId(int $id) : self
        {
            $this->id = $id;
            return $this;
        }

        public function getId() : int
        {
            return $this->id;
        }

        public function setNom(string $nom) : self
        {
            $this->nom = $nom;
            return $this;
        }

        public function getNom() : string
        {
            return $this->nom;
        }

        public function setPrix(int $prix) : self
        {
            $this->prix = $prix;
            return $this; 
        }

        public function getPrix() : int
        {
            return $this->prix;
        }

        public function setMarque(int $marque) : self
        {
            $this->marque = $marque;
            return $this;
        }

        public function getMarque() : int
        {
            return $this->marque;
        }


        public function __toString()
	    {
		return "
        <tr>
		<td>".$this->getNom()."</td>
		<td>".$this->getPrix()."€</td>
		<td><a class='btn btn-light' href='index.php?p=modele_show&modele=".$this->getId()."'>Afficher</a></td>
        <td><a class='btn btn-danger' href='index.php?p=modele_delete&modele=".$this->getId()."'>Supprimer</a></td>
        </tr>
        ";
	    }
    }
    

?>