$('#deleteChapter').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget);
    var chapterId = button.data('chapterid');
    var modal = $(this);
        
    modal.find('.modal-title').append();
    modal.find('#modal-chapter-id').val(chapterId);
});


 $("#confirmer").on("click", function(){
   var id = $('#deleteChapter').find('#modal-chapter-id').val();
     
     $.ajax({
            url : 'index.php?controller=admin&action=supprimer',
            data : "id=" + id ,
            type : 'GET',
         success : function(data){
             location.reload(); 
            },
         
     });
     
   $("#deleteChapter").modal('hide');
 });


