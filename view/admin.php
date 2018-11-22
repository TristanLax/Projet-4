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
        
        <h2>Modifier un chapitre :</h2>
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
    
foreach ($chapitres as $chapitre)
{
 echo '<tr><td>', $chapitre->getSort(), '</td><td>', $chapitre->getTitle(), '</td><td>', $chapitre->getDate(), '</td><td>', ($chapitre->getDate() == $chapitre->getEdit() ? '-' : $chapitre->getEdit()), '</td><td>','<a href="index.php?controller=admin&action=getchapitre&id=', $chapitre->getId(), '">Modifier</a> | <a href="index.php?controller=admin&action=supprimer&id=', $chapitre->getId(),'&sort=', $chapitre->getSort(), '">Supprimer</a> ', '</td></tr>';
}
?>
</table>
<?php
}
?>
    
    </div>
        <div class="col-lg-12">

            <h2 class="mainpage">Ecrire un nouveau chapitre : </h2>

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