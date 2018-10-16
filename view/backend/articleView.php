<?php session_start();

<?php if (!isset($_SESSION['user_id'])) 
{
    header("location: login.php");
}
?>

$id = $_REQUEST['id'];

$title = htmlspecialchars($post['title']); ?>

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
<div>
<h1>Editer l'article :</h1>
    
    <form method="post">
    <div>
        <label for="title">Titre :</label><br />
        <input name="id" type="hidden" value="<?php echo $id;?>" />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Contenu :</label><br />
        <textarea rows="8" cols="60" id="content" name="content"></textarea>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
        <input type="submit" name="modifier" />
    </div>
</form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
