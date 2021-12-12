<h1>Liste Marque</h1>

<?php

if ($marques->rowCount()>0){
    ?>
     <table class="table">
        <thead>
            <tr>
                <th>Nom des marques</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($liste_marques as $marque){
                    echo $marque;
                }
            ?>
        </tbody>

    </table>
<?php
}else{
    echo "<p>Il y'a aucune marque dans ce garage</p>";
}


?>

<h2 style="margin-top:100px" >Ajouter une marque</h2>
<form action="index.php?p=marque_insert" method="POST">
	<label for="nom">Nom :</label>
	<br>
	<input type="text" name="nom" id="nom">

	<br><br>
	<input type="submit" name="ajout_marque" value="Ajouter" class="btn btn-primary">
</form>