<?php

class ModeleController {

    public function save(){

        if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['marque']) 
        && !empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['marque'])
        ){

            $mm = new MarqueManager();
            $marque = $mm->findOneById($_POST['marque']);

            if($marque->rowCount() == 1){

                $mom = new ModeleManager();
                $mom->setNom($_POST['nom'])
                    ->setPrix($_POST['prix'])
                    ->setMarque($_POST['marque']);

                if($mom->save()->rowCount() == 1){
                    echo "<p class='text-success'> Modèle ajouter </p>";
                }
                else{
                    echo "<p class='text-danger'>Une erreur est survenue</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Modèle Introuvable</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuiller completter le formulaire</p>";

        }

    }

    public function delete(){

        if(isset($_GET['modele']) && !empty($_GET['modele'])
        ){

            $mom = new ModeleManager();
            $modele = $mom->findOneById($_GET['modele']);

            if($modele->rowCount() == 1){

                $mom->setId($_GET['modele']);
    
                if($mom->delete()->rowCount() >= 1){
                    echo "<p class='text-success'>Modèle bien supprimer</p>";
                }
                else{
                    echo "<p class='text-danger'>une erreur est survenue</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Modèle introuvable</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Modèle introuvable</p>";
        }
    }

    public function show(){

        ob_start();
        
        if(isset($_GET['modele']) && !empty($_GET['modele'])
        ){
            $mom = new ModeleManager();
            $modele = $mom->findOneById($_GET['modele']);

            if($modele->rowCount() == 1){
             
                $modele = $modele->fetchObject('Modele');
                require_once 'src/views/modele_show.php';

            }
            else{
                echo "<p class='text-danger'>Modèle introuvable</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Modèle introuvable</p>";
        }

        $content = ob_get_clean();
        echo $content;
        
    }

    public function update(){
        
        if(isset($_POST['nom']) && isset($_POST['prix']) && !empty($_POST['nom']) && !empty($_POST['prix']) 
        && isset($_POST['id']) && !empty($_POST['id'])
        ){

            $mom = new ModeleManager();
            $modele = $mom->findOneById($_POST['id']);

            if($modele->rowCount() == 1){

                $mom->setId($_POST['id'])
                    ->setNom($_POST['nom'])
                    ->setPrix($_POST['prix']);

                if($mom->update()->rowCount() >= 1){
                    echo "<p class='text-success'>Modèle bien mise à jour</p>";
                }
                else{
                    echo "<p class='text-danger'>Une erreur s'est produit</p>";
                }
            }
            else{
                echo "<p class='text-danger'>Modèle introuvable</p>";
            }
        }
        else{
            echo "<p class='text-danger'>Veuiller complété le formulaire</p>";
        }
    }
}



?>