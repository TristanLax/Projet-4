<?php include("header.php");
$title = htmlspecialchars($chapitre->getTitle()); ?>



<div class ="row">
    <div class="col-lg-12" id="menu">
        <nav>
            <ul class="menu">
                <li><a href="index.php">Retour au site</a></li>
            </ul>
         </nav>
    </div>
</div>


    <div class ="row">
        <div class="col-lg-12">

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
            <h2 class="commentaires">Commentaires</h2>

            <form method="post" action="index.php?controller=front&action=addComment&id=<?=$chapitre->getId() ?>" class="comform">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" size="25" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment" rows="4" cols="30"></textarea>
                </div>
                <div>   
                    <input type="hidden" name="chapitre_id" value="<?= $chapitre->getId()?>" /><br/>
                    <input type="submit" />
                </div>
            </form>
            <div class ="row">
            <?php
            foreach ($comments as $comment)
            { 
            ?>  
                <div class="col-lg-12">
                    <div class="col-lg-12 comment">
                        
                        <div class=""><p>Commentaire écrit par <strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getDate() ?></p></div>
                        <div class=""><p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p></div>
                        <p><a href="index.php?controller=front&action=signaler&id=<?=$comment->getId()?>">Signaler ce commentaire</a></p>
                        
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