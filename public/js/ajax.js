
$(document).ready(function (){

  $.ajaxSetup({
    headers : {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  })


  $('.like-btn').click(function(){
      var likeBtn = $(this);
      var pictureId = likeBtn.attr('id');

      $.ajax({
        type : 'GET',
        url : '/pictures/'+pictureId+'/like',

        success : function(response){
          likeBtn.addClass('w3-text-blue').animateCss('rubberBand');
          likeBtn.children('.likes-count').replaceWith(response);
          likeBtn.children('.like-keyword').replaceWith(response == 1 ? ' Like':' Likes');
          likeBtn.removeClass('like-btn w3-hover-blue');
        },
        error : function(response){
          likeBtn.animateCss('shake');
        }
      });
  });

  $('.picture-wrapper').click(function(){
    var pictureId = $(this).children('img').attr('id');

    $.ajax({
      type : 'GET',
      url : '/pictures/'+pictureId+'/view',

      success : function($reponse){

      },
      error : function($response){

      }
    });
  });
});
