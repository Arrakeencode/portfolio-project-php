<?php

require_once('inc/connect.php');

// Tester que les champs sont remplis
if( !empty($_POST) ){

    if( !empty($_POST['titre']) 
        && !empty($_POST['description']) 
        && !empty($_FILES['image']['name']) ){

        // copie de fichier
        $fichier = time() . '_' . $_FILES['image']['name'];
        $chemin = $_SERVER['DOCUMENT_ROOT'] . '/php/11-portfolio/images/';
        move_uploaded_file($_FILES['image']['tmp_name'], $chemin . $fichier);

        // insertion en BDD
        $result = $pdo->prepare("INSERT INTO projets VALUES (NULL,:titre,:description,:image)");
        $result->execute(array(
            'titre' => htmlspecialchars($_POST['titre']),
            'description' => htmlspecialchars($_POST['description']),
            'image' => $fichier // défini en ligne 13
        ));
        header('location:backoffice.php');
        exit();
    }
}

require_once('inc/header.php');
// coeur de la page
?>

<h1 class="text-center">Gérer mes projets</h1>

<!-- afficher les projets présents -->
<table class="table table-striped table-bordered">
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Image</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
        $result = $pdo->query("SELECT * FROM projets");
        while( $projet = $result->fetch() ){
            ?>
            <tr>
                <td><?= $projet['id_projet'] ?></td>
                <td><?= $projet['titre'] ?></td>
                <td><?= $projet['description'] ?></td>
                <td class="w-25"> <!-- case fera 1/4 de mon tableau width 25% -->
                    <img src="images/<?= $projet['image'] ?>" alt="<?= $projet['titre'] ?>" class="img-fluid">
                </td>
                <td>Modif</td>
                <td>Suppr</td>
            </tr>
            <?php
        }
    ?>
</table>
<!-- formulaire d'ajout de projet -->
<form action="" method="post" class="row d-flex align-items-stretch" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="image">Image<br>
                <span id="camera">&#128247;</span>
                <div id="box"></div>
            </label>
            <input type="file" id="image" name="image" class="d-none">
        </div>
    </div>
    <input type="submit" value="Enregistrer" class="btn btn-primary d-block mx-auto">
</form>
<?php
require_once('inc/footer.php');
