/* Gère l'appel a la modal de confirmation de suppression d'article en partie admin une fois l'action "supprimer" appellée. Passe en variable les ID et Sort de l'article puis les envoie a la modal pour permettre leur utilisation en requête AJAX. */

$('#deleteChapter').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget);
    var chapterId = button.data('chapterid');
    var chapterSort = button.data('chaptersort');
    var modal = $(this);
        
    modal.find('.modal-title').append();
    modal.find('#modal-chapter-id').val(chapterId);
    modal.find('#modal-chapter-sort').val(chapterSort);
});


/* Une fois le bouton "confirmer" cliqué pour la suppression d'un article, récupère en variable l'ID et le sort de l'article choisi avant d'effectuer un appel AJAX pour supprimer l'article en DB, retire ensuite la ligne incriminée du HTML pour ne pas forcer un rechargement de la page. */

$("#confirmer").on("click", function(){
    
     var id = $('#deleteChapter').find('#modal-chapter-id').val();
     var sort = $('#deleteChapter').find('#modal-chapter-sort').val();
     
     $.ajax({
            url : 'index.php?controller=chapitre&action=supprimer',
            data : "id=" + id + "&sort=" + sort,
            type : 'GET',
         success : function(data){
             $('.chapitre_'+ id).remove();
             var sort = 1;
             $('.sort').each(function(){
                $(this).html(sort++);
                });
            },
     });
   $("#deleteChapter").modal('hide');
});


/* Fonction gérant l'envoi via requête AJAX des données nécéssaires au fonctionnement de la methode signalerAction après les avoir récupérées en variables dans l'AdminController et rendre plus fluide le processus pour l'utilisateur. */

$(".signaler").on("click", function(event) {
    
    event.preventDefault();
    var comment = $(this);
    var self = this;
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=front&action=signaler',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             $(self).replaceWith('<p>Signalement enregistré</p>');
            },
     });
});


$(".ignorer").on("click", function(event) {
    
    event.preventDefault();
    var comment = $(this);
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=comment&action=ignorer',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             $('.report_' + id).html('0');
            },
     });
});


/* Fonction gérant l'envoi via requête AJAX des données nécéssaires au fonctionnement de la methode modererAction après les avoir récupérées en variables dans l'AdminController et rendre plus fluide le processus pour l'utilisateur. */

$(".moderer").on("click", function(event) {
    
    event.preventDefault();
    var comment = $(this);
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=comment&action=moderer',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             $('.moderate_' + id).html('Commentaire modéré par l\'administration');
            },
     });
});


