$('#deleteChapter').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget);
    var chapterId = button.data('chapterid');
    var chapterSort = button.data('chaptersort');
    var modal = $(this);
        
    modal.find('.modal-title').append();
    modal.find('#modal-chapter-id').val(chapterId);
    modal.find('#modal-chapter-sort').val(chapterSort);
});


$("#confirmer").on("click", function(){
    
     var id = $('#deleteChapter').find('#modal-chapter-id').val();
     var sort = $('#deleteChapter').find('#modal-chapter-sort').val();
     
     $.ajax({
            url : 'index.php?controller=admin&action=supprimer',
            data : "id=" + id + "&sort=" + sort  ,
            type : 'GET',
         success : function(data){
             $('.chapitre_'+ id).remove();
            },
     });
   $("#deleteChapter").modal('hide');
});


$(".signaler").on("click", function() {
    
    var comment = $(this);
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=front&action=signaler',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             location.reload();
            },
     });
});


$(".ignorer").on("click", function() {
    
    var comment = $(this);
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=admin&action=ignorer',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             location.reload();
            },
     });
});


$(".moderer").on("click", function() {
    
    var comment = $(this);
    var id = $(this).data('commentid');
    
    $.ajax({
            url : 'index.php?controller=admin&action=moderer',
            data : "id=" + id,
            type : 'GET',
         success : function(data){
             location.reload();
            },
     });
});


