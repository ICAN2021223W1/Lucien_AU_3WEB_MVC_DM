<?php

include_once 'inc.header.php';

require_once 'src/class/BDD.php';

require_once 'src/orms/Marque.php';
require_once 'src/orms/Modele.php';

require_once 'src/models/MarqueManager.php';
require_once 'src/models/ModeleManager.php';

require_once 'src/controllers/MarqueController.php';
require_once 'src/controllers/ModeleController.php';

if(isset($_GET['p'])){

        switch ($_GET['p']){

            case 'marques':
                $mc = new MarqueController();
                $mc->list();
                break;

            case 'marque_insert':
                $mc = new MarqueController();
                $mc->save();
                break;

            case 'marque_delete':
                $mc= new MarqueController();
                $mc->delete();
                break;
                
            case 'marque_show':
                $mc =  new MarqueController();
                $mc->show();
                break;

            case 'marque_update':
                $mc = new MarqueController();
                $mc->update();
                break;

            case 'modele_insert':
                $mom = new ModeleController;
                $mom->save();
                break;

            case 'modele_delete':
                $mom = new ModeleController;
                $mom->delete();
                break;

            case 'modele_show':
                $mom = new ModeleController;
                $mom->show();
                break;

            case 'modele_update':
                $mom = new ModeleController();
                $mom->update();
                break;

            default:
                echo "<p class='alert alert-danger'>Erreur 404</p>";
                break;   
        }
}
else{
    echo "<p class='alert alert-danger'>Erreur 404</p>";
}

include_once 'inc.footer.php';

?>