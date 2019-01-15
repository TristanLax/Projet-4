<?php include("header.php");
$title = htmlspecialchars($chapitre->getTitle()); ?>


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

<div class ="row">
    <div class="col-lg-12 mainpage">
        <?php 
            if ($page > 1) { ?>
                <a class="previous" href="index.php?controller=home&action=getchapitre&chapitre=<?= $chapitre->getSort()-1 ?>">&laquo;Chapitre Precedent</a>
        <?php 
            }
        
            if ($page < $maxPage ) { ?> 
        <a class="next" href="index.php?controller=home&action=getchapitre&chapitre=<?= $chapitre->getSort()+1 ?>">Chapitre Suivant&raquo;</a>
        <?php 
            } ?>
        
        <div class="col-lg-12 news">
            <div class="newsheader">
                <h3>
                    Chapitre <?= $chapitre->getSort() ?> : <?= $chapitre->getTitle()?>
                </h3>
            </div>
            <div class="newstext">
                <p><?= $chapitre->getContent() ?></p>
            </div>
        </div>
    </div>
</div>


<div class ="row">
    <div class="col-lg-12">
        <div class="col-lg-4 offset-lg-4 com">
        <h2 class="commentaires">Commentaires</h2>

        <form method="post" action="index.php?controller=front&action=addComment&id=<?=$chapitre->getId() ?>" class="comform">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" size="32" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" rows="4" cols="30"></textarea>
            </div>
            <div>   
                <input type="hidden" name="chapitre_id" value="<?= $chapitre->getId()?>" /><br/>
                <input type="hidden" name="chapitre_sort" value="<?= $chapitre->getSort()?>" /><br/>
                <input type="submit" />
            </div>
        </form>
        </div>
        
        
        <div class ="row">
        <?php
        foreach ($comments as $comment) { 
        ?>  
            <div class="col-lg-12">
                <div class="col-lg-12 comment">
                        
                    <div class=""><p>Commentaire écrit par <strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getDate() ?></p></div>
                    <div class=""><p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p></div>
                    <p><a class="signaler" data-commentid="<?= $comment->getComment_Id()?>" href="#">Signaler ce commentaire</a></p>
                        
                </div>
            </div>
        <?php
        }
        ?>
        </div>
    </div>
</div>


<?php include("footer.php"); ?>
<?php require('template.php'); ?>