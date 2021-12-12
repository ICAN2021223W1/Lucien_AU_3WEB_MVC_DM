<h1>Modele liste de la marque <?=$marque->getNom()?></h1>

<?php

if($modeles->rowCount()>0){

    ?>
    <table class="table">
        <thead> 
            <tr>
                <th>Nom des modèles</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
   
        
        <tbody>
            <?php
                foreach($liste_modeles as $modele){
                    echo $modele;
                }
            ?>
        </tbody>
    </table>

<?php
}
else{
    echo "<p>Il n'y as pas de modèle pour cette marque</p>";
}

?>

<h2>Modifier la marque</h2>
<form action="index.php?p=marque_update&marque=<?= $_GET['marque']; ?>" method="POST">
	<label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="<?=$marque->getNom()?>">
	<br><br>
	<input type="submit" name="update_marque" value="Mettre à jour" class="btn btn-primary">
</form>

<hr>
	
<h2>Ajouter un modele dans la marque</h2>
<form action="index.php?p=modele_insert" method="POST">
	<input type="hidden" name="marque" value="<?= $marque->getId(); ?>">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">
	<br><br>
    <label for="nom">Prix :</label>
	<br>
	<input type="number" name="prix" id="prix">
    <br><br>
	<input type="submit" name="insert_modele" value="Ajouter" class="btn btn-primary">
</form>