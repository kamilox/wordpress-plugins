$ = jQuery.noConflict();

$(document).ready(function(){
    //
    $('body').attr('oncontextmenu','return false');
    //localStorage.removeItem('age');
    //add div over each image sensitive
    if(localStorage.getItem('age' ) != '21'){
        $('.uabb-post-thumbnail').append(
            '<div class="image-protected">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        );

        $(
            '<div class="image-protected">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        ).insertBefore('.uagb-column__inner-wrap .wp-block-image figure img');
        
        $(
            '<div class="image-protected">'
            +'<div class="text-protected">'
            +'Welcome! Please verify <br>'
            +'your age to enter.<br>'
            +'Are you 21 years or older?'
            +'<br>'
            +'Some material on this site may be deemed inappropriate for those under 21 by Google, Facebook and other organizations'
            +'</div>' //text-protected
            +'<div class="button-protected">'
            +'<input type="button" class="button-yes" value="Yes" >'
            +'<input type="button" class="button-no" value="No" >'
            +'</div>' //button-protected
            +'</div>'//image-protected
        ).insertBefore('.uagb-post__inner-wrap .uagb-post__image a img');

        
            // if the user click in button yes remove de backgrund image & add a variable to local storage, to don´t show again the message
            $('.button-yes').click(function(){
                localStorage.setItem('age', '21');
                $('.image-protected').addClass('image-unprotected');
            });
            // if the user click in button no keep de backgrund image and clear the local storage 
            $('.button-no').click(function(){
                alert('You must be over 21 to access the content, Thank you!');
                localStorage.removeItem('age');
            });
    }else{
        $('.image-protected').css('display', 'none');
    }
    
});

$(function(){
    $(document).bind("contextmenu",function(e){
        return false;
    });
});

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});
