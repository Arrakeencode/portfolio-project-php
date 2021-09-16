$(function(){

    $('#image').on('change',function(e){

        let fichier = e.target.files; // récuperer les fichiers choisis
        // console.log(fichier);
        let reader = new FileReader(); // création d'un lecteur de fichiers
        reader.readAsDataURL(fichier[0]); // lecture du premier fichier (index 0)
        reader.onload = function(e){ // sur chargement
            $('#box').html('<img src="'+e.target.result+'" alt="" class="img-fluid">');
            // je créé du contenu dans ma div #box
        }

    });

}); // Fin du document ready