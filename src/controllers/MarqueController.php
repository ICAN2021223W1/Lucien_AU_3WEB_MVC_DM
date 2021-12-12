<?php

class MarqueController{

    public function list(){

        ob_start();

        $mm = new MarqueManager();
        $marques = $mm->findAll();

        $liste_marques = $marques->fetchAll(PDO::FETCH_CLASS,'Marque');

        require_once 'src/views/marque_list.php';

        $contenu = ob_get_clean();

        echo $contenu;

    }

    public function save(){

        if(isset($_POST['nom']) && !empty($_POST['nom'])){

            $mm = new MarqueManager();
            $mm->setNom($_POST['nom']);

            if($mm->save()->rowCount() == 1){
                echo "<p class='text-success'>Marque ajouté.</p>";

            }
            else{
                echo "<p class='text-success'>Une erreur est survenu lors de l'ajout de la marque</p>";
            }

        }
        else{
            echo "<p class='text-danger'>Veuillez renseigner tous les champs du formulaire.</p>";

        }

    }

    

    public function delete(){

        if(isset($_GET['marque']) && !empty($_GET['marque'])){

            $mm= new MarqueManager();
            $marque = $mm->findOneById($_GET['marque']);

            if($marque->rowCount() == 1){
                $mm->setId($_GET['marque']);

                if($mm->delete()->rowCount() >= 1){

                    echo "<p class='text-success'>Marque suprrimer.</p>";
                }
                else{
                    echo "<p class='text-danger'>Une erreur est survenu lors de la supression de la marque.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Marque introuvable.</p>";

            }
        }
        else{
            echo "<p class='text-danger'>Marque introuvable.</p>";
        }
        
    }

    public function show(){

        ob_start();

        if(isset($_GET['marque']) && !empty($_GET['marque'])){

            $mm = new MarqueManager();
            $marque = $mm ->findOneById($_GET['marque']);

            if($marque->rowCount() == 1){
                
                $marque = $marque->fetchObject('Marque');

                $mom = new ModeleManager();
                $modeles = $mom->findByMarque($marque->getId());
                
                $liste_modeles = $modeles->fetchAll(PDO::FETCH_CLASS, 'Modele');
                require 'src/views/modele_list.php';

            }
            else{
                echo "<p class='text-danger'>Marque introuvable.</p>";
            }
        }
        else{
			echo "<p class='text-danger'>Marque introuvable.</p>";
        }

        $contenu = ob_get_clean();
		echo $contenu;

    }

    
    public function update(){

        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_GET['marque']) && !empty($_GET['marque'])){
            
            $mm = new MarqueManager();
            $marque = $mm->findOneById($_GET['marque']);

            if($marque->rowCount() == 1){

                $mm->setId($_GET['marque'])
                    ->setNom($_POST['nom']);
                
                if($mm->update()->rowCount() >= 1) {
                    echo "<p class='text-success'> Marque mise à jour</p>";
                }
                else{
                    echo "<p class='text-danger'>Les données remplis dans le formulaire sont identiques.</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Marque introuvable</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuiller completter le formulaire</p>";

        }
    }

}





?>