<h1>Modele  <?=$modele->getNom()?></h1>
<br>
<h2>Detail:</h2>
<p><b>Nom: </b><?=$modele->getNom()?></p>
<p><b>Prix: </b><?=$modele->getPrix()?>€</p>
<hr>
<h2>Modifier le modèle</h2>
<form action="index.php?p=modele_update&modele=<?= $_GET['modele']; ?>" method="POST">
    <input type="hidden" name="id" value="<?= $modele->getId(); ?>">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="<?=$modele->getNom()?>">
    <br><br>
    <label for="nom">Prix :</label>
    <input type="number" name="prix" id="prix" placeholder="<?=$modele->getPrix()?>">
	<br><br>
	<input type="submit" name="update_modele" value="Mettre à jour" class="btn btn-primary">
</form>
