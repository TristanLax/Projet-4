<?php include("header.php"); ?>
<?php $title = "Administration"; ?>


<div class ="row">
    <div class="col-lg-12" id="menu">
        <nav>
            <ul class="menu">
                <li><a href="index.php">Retourner à l'accueil</a></li>
                <li><a href="index.php?controller=admin&action=reportedComments">Modération des commentaires</a></li>
                <li><a href="index.php?controller=admin&action=logout">Se deconnecter</a></li>
            </ul>
         </nav>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        
        <h2>Modifier un chapitre :</h2>

            <table>
                <tr>
                    <th>Chapitre</th>
                    <th>Titre</th>
                    <th class="cacher">Date d'ajout</th>
                    <th class="cacher">Dernière modification</th>
                    <th>Action</th>
                </tr>
                
            <!-- Retourne sous forme d'un tableau les objets PHP correspondant aux chapitres disponibles sur le site et stockés dans la BD -->
                
            <?php
            foreach ($chapitres as $chapitre) { 
            ?>
                <tr class="chapitre_<?= $chapitre->getId() ?>">
                    <td> <?= $chapitre->getSort() ?> </td>
                    <td> <?= $chapitre->getTitle() ?> </td>
                    <td class="cacher"> <?= $chapitre->getDate() ?></td>
                    <td class="cacher"> <?= $chapitre->getEdit() ?></td>
                    <td> <a class="modifier" href="index.php?controller=admin&action=getchapitre&id=<?= $chapitre->getId() ?>">Modifier</a> |
                         <a class="supprimer" data-toggle="modal" data-target="#deleteChapter" data-chapterid="<?= $chapitre->getId() ?>" data-chaptersort="<?= $chapitre->getSort() ?>" href="#">Supprimer</a>
                    </td>
                </tr>
            <?php 
            }
            ?>
            </table>
        
            <!-- Modal récupérant les valeurs "Sort" et "Id" utilisées en appel AJAX et permettant de confirmer ou d'annuler la suppression définitive d'un chapitre du site  -->
        
            <div class="modal fade" id="deleteChapter" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle">Voulez-vous supprimer ce chapitre ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>   
                    <input type='hidden' id='modal-chapter-id' />
                    <input type='hidden' id='modal-chapter-sort' />
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                    <button type="button" class="btn btn-primary" id="confirmer">Confirmer</button>
                  </div>
                </div>
              </div>
            </div>

        
            <div class="col-lg-12">
                <h2 class="mainpage">Ecrire un nouveau chapitre : </h2>

                    <form method="post" action="<?php echo 'index.php?controller=admin&action=envoyer' ?>">
                        <div>
                            <label for="title">Titre :</label><br />
                            <input type="text" id="title" name="title" size="25" />
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
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>