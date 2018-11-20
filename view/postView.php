<?php include("header.php");
$title = htmlspecialchars($article->getTitle()); ?>

<p><a href="index.php">Retour au site</a></p>

    <div class ="row">
        <div class="col-lg-12">
        <div class="col-lg-12 news">
            <div class="newsheader">
                <h3>
                    <?= $article->getTitle()?>
                    , un article écrit le <?= $article->getDate() ?>
                </h3>
            </div>
            <div class="newstext">
                <p>
                    <?= $article->getContent() ?>
                </p>
            </div>
        </div>
        </div>
    </div>


    <div class ="row">
        <div class="col-lg-12">
            <h2>Commentaires</h2>

            <form method="post" action="index.php?controller=front&action=addComment&id=<?=$article->getId() ?>">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>   
                    <input type="hidden" name="article_id" value="<?= $article->getId()?>" />
                    <input type="submit" />
                </div>
            </form>

            <?php
            foreach ($comments as $comment)
            {
            ?>
                <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getDate() ?></p>
                <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                <a href="index.php?controller=front&action=signaler&id=<?=$comment->getId()?>">Signaler ce commentaire</a>
            <?php
            }
            ?>
        </div>
    </div>

<?php include("footer.php"); ?>

<?php require('template.php'); ?>