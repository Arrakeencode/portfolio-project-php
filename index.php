<?php
/*

BDD portfolio
- projets
    - id_projet - INT
    - titre - VARCHAR(50)
    - description - TEXT
    - image - VARCHAR(150)

METHODOLOGIE
1 - Créer la base de données portfolio sur https://localhost/phpmyadmin (encodage utf8_general_ci)
2 - Créer une table projets avec 4 champs
3 - Une fois créée,  générer un export à partir de la BDD portfolio, et cocher l'option avancée : 
    Ajouter une instruction CREATE DATABASE / USE
    => portfolio.sql
4 - rédiger la chaine de connexion à la BDD dans le fichier connect.php
5 - créer le header et le footer du site (gestion des liens du menu)
6 - constituer la page index
7 - constituer la page de back office
*/

require_once('inc/connect.php');
require_once('inc/header.php');
// coeur de la page
?>

<div class="row">
    <div class="col-4">
        <img src="images/1575646316_sony.jpg" alt="moi" class="img-fluid rounded-circle w-75">
    </div>
    <div class="col-8">
        <p>
            <h1 class="text-center">TREMEL Bryan</h1>
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi eaque tenetur deserunt assumenda voluptatem cupiditate a corporis ex laborum doloremque, animi tempore id at non labore ducimus porro voluptate officia.</span>
            <span>Ad dolorum eaque possimus neque est beatae aliquam obcaecati reiciendis odit unde quisquam molestiae, eligendi ipsa odio iure, nobis corporis alias atque facere fuga? A, cupiditate. Beatae officia temporibus esse.</span>
            <span>Aperiam commodi facere est modi, iste deleniti sed nemo officiis obcaecati temporibus? Nihil debitis eveniet nobis eos, similique mollitia vero quibusdam, deleniti error ipsum fugiat iste in quasi illo. Laborum.</span>
        </p>
    </div>
</div>

<div class="row mt-5 pt-5">
    <div class="col">
            <h2 id="portfolio" class="text-center">Projets</h2>
            <div class="row">
                <?php
                    // requete qui va chercher les projets
                ?>               
            </div>
    </div>
</div>
<?php

require_once('inc/footer.php');