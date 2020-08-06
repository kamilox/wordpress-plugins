$(document).ready(function(){
    var srcImage = "";
    $('.gallery-carusel img').click(function(){
        var srcImage = $(this).attr('src');
        $('.gallery-image-master img').attr('src', '');
        $('.gallery-image-master img').attr('srcset', '');
        $('.gallery-image-master img').attr('src', srcImage);
        $('.gallery-image-master img').attr('srcset', srcImage);
    });
});