new WOW().init();
$(document).ready(function () {

    $('.toast').delay(5000).fadeOut(500);

    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
            });
        }
    });

    $("img").unveil(500);

    $("#scroll-btn").click(function(){
        $('html, body').animate({
            scrollTop: $("#main-content").offset().top
        }, 700);
    });

    $lg = $('#random-pictures-wrapper');

    $lg.lightGallery({
        selector : '.picture-wrapper',
        appendSubHtmlTo: '.lg-item',
        addClass: 'fb-comments',
        mode: 'lg-fade',
        download: false,
        enableDrag: false,
        enableSwipe: false,
        counter: false,
        controls:false,
        keyPress:false
    });

    $lg.on('onAfterOpen.lg',function(event){
        $('.lg-toolbar').append('<span id="lg-info" class=\"lg-icon\"><i class="fa fa-info-circle"></i></span>');

    });

    $(document).on("click", "#lg-info", function(){
        $('.lg-custom-caption').fadeToggle();
    });

    $(document).on("click", "#toggleExifDataBtn", function(){
        $(this).next().toggle();
    });

    $('.download-btn').click(function(){
        var downloadBtn = $(this);

        downloadBtn.append('!');
        downloadBtn.addClass('w3-dark-gray').animateCss('flash');
        downloadBtn.removeClass('download-btn w3-hover-dark-gray');
    });

    changeRowColumnNumber(3);

    $('select').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function (Input) {
        return {
            value: input,
            text: input
        }
      }
    });

    $('a.delete-confirm').confirm({
        icon: 'fa fa-trash',
        theme: 'supervan',
        content:'Are you sure you want to delete?',
        autoClose: 'Cancel|6000',
        buttons: {
            Yeaaa: function(){
                location.href = this.$target.attr('href');
            },
            Cancel: function () {
                
            }
        }
    });
});

function changeRowColumnNumber(param){
  $("#pictures-section").children('div').removeClass().addClass('col-'+param);
  $("#pictures-section").children('div').children('div').animateCss('zoomIn');
}
