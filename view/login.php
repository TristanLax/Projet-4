<?php include("header.php");
$title = "Connexion"; ?>


<div class="row">
    <div class="col-lg-12" id="menu">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText" >
                
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="index.php">Retourner sur le site</a>
                </div>
                
            </div>
            
        </nav>
    </div>
</div>


<!-- Formulaire permettant d'envoyer l'adresse mail et le mot de passe au controlleur pour vérifier les identifiants. -->
<div class="row">
    <div class="col-lg-4 offset-lg-4 login">
        
        <h2 class="mainpage">Se connecter :</h2>

        <form class="loginform" action="<?php echo 'index.php?controller=login&action=login' ?>" method="post">
            <div>
                <label for="email">Email</label><br />
                <input type="text" id="email" name="email" size="25" />
            </div>
            <div>
                <label for="password">Mot de Passe</label><br />
                <input type="password" id="password" name="password" size="25" />
            </div>
            <div>
                <p><?= $error ?></p>
                <br /><input type="submit" name="connexion" value="Connexion" />
            </div>
        </form>
        
    </div>
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>
