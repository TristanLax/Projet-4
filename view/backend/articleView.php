<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p><a href="admin.php">Retour a l'Administration</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>parue le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
