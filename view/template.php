<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
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
    </head>
        
    <body>
        <div class="container-fluid">
        <?= $content ?>
        </div>
    </body>
</html>