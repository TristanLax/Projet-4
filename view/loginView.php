<?php $title = "Connexion"; ?>

<?php ob_start(); ?>
<p><a href="index.php">Retourner sur le site</a></p>


<h2>Se connecter</h2>

<form class="login" action="<?php echo 'index.php?controller=login&action=login' ?>" method="post">
    
    <div>
        <label for="email">Email</label><br />
        <input type="text" id="email" name="email" size="30" />
    </div>
    <div>
        <label for="password">Mot de Passe</label><br />
        <input type="password" id="password" name="password" size="30" />
    </div>
    <div>
        <br /><input type="submit" name="connexion" value="Connexion" />
    </div>
</form>



<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
