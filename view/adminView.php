<?php if (!isset($_SESSION['secured'])) 
{
    header("location: index.php");
}
?>
<?php include("header.php"); ?>
<?php $title = "Administration"; ?>


    <div class="row">
    <div class="col-lg-12">

        <p><a href="index.php">Retourner sur le site</a></p>
        <p><a href="index.php?controller=admin&action=reportedComments">Accèder à la modération des commentaires</a></p>
        <p><a href="index.php?controller=admin&action=logout">Se deconnecter</a></p>
        
        <h2>Modifier un article :</h2>
<?php
{
?>
<table>
    <tr>
        <th>Chapitre</th>
        <th>Titre</th>
        <th>Date d'ajout</th>
        <th>Dernière modification</th>
        <th>Action</th>
    </tr>
    
<?php
    
foreach ($posts as $article)
{
 echo '<tr><td>', $article->getSort(), '</td><td>', $article->getTitle(), '</td><td>', $article->getDate(), '</td><td>', ($article->getDate() == $article->getEdit() ? '-' : $article->getEdit()), '</td><td>','<a href="index.php?controller=admin&action=getarticle&id=', $article->getId(), '">Modifier</a> | <a href="index.php?controller=admin&action=supprimer&id=', $article->getId(),'&sort=', $article->getSort(), '">Supprimer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
?>
    
    </div>
        <div class="col-lg-12">

            <h2 class="mainpage">Ecrire un nouvel article : </h2>

                <form method="post" action="<?php echo 'index.php?controller=admin&action=envoyer' ?>">
                    <div>
                        <label for="title">Titre :</label><br />
                        <input type="text" id="title" name="title" size="30" />
                    </div>
                    <div>
                        <label for="content">Contenu :</label><br />
                        <textarea rows="8" cols="60" id="content" name="content"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="envoyer" />
                    </div>
                </form>

        </div>
    </div>

<?php include("footer.php"); ?>
<?php require('template.php'); ?>