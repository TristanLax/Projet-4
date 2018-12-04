<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=" Bienvenue sur le site de l'écrivain Jean Rochefort, sont disponibles des aperçus de son prochain livre 'Billet simple pour l'Alaska', venez discuter et commenter sur votre auteur préféré avec d'autres membres de la communauté."/>
    
        <link href="web/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="web/css/style.css" rel="stylesheet" /> 

        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yjsi4djzw00wupol3thu9mxk4mehvvp3ite0bv4ndjtslbh5"></script>
        <script>
            tinymce.init({
                selector: '#content'
            });

        </script>
        
        <title><?= $title ?></title>

    </head>
        
    <body>

        <div class="container-fluid">
        <?= $content ?>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="web/js/projet.js"></script>
        


    </body>
</html>