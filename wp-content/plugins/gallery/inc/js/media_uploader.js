$ = jQuery.noConflict();

$(document).ready(function(){
    $('#new-row').attr('disabled', true);
    // checkbox values
    $('#hide_from_live').click(function(){
        if($('#hide_from_live_hidden').val() == 0){
            $('#hide_from_live_hidden').val(1)
        }else{
            $('#hide_from_live_hidden').val(0)
        }
    });

    
    $('#feature_category').click(function(){
        if($('#feature_category_hidden').val() == 0){
            $('#feature_category_hidden').val(1)
        }else{
            $('#feature_category_hidden').val(0)
        }
    });

    if($('#hide_from_live_hidden').val() == 1 ){
        $('#hide_from_live').attr('checked', true);
    }else{
        $('#hide_from_live').attr('checked', false);
    }

    if($('#feature_category_hidden').val() == 1 ){
        $('#feature_category').attr('checked', true);
    }else{
        $('#feature_category').attr('checked', false);
    }


});// end document ready

    //delete rows
    function closeDiv(className){

        var close = $('.'+className).parents().eq(0).attr('id');
        if($('#'+close).attr('id') != "id-1"){
            $('#'+close).remove();
        }else{
            $('.messages').addClass('error').html('Sorry you can´t delete this row');
            setTimeout(function(){ 
                $('.error').css({
                    'height': '0',
                    'padding': '0',
                    'margin' : '0',
                    'visibility' : 'hidden',
                    'opacity' : '0',
                });
             }, 3000);
        }
    }
    
  

    function imageBefore(rowId, colId, itemId, indexId){
        var idItem = 0;
        if(itemId == 0){
            idItem == 0;
            console.log(idItem);
        }else{
            idItem = itemId;
            console.log(idItem);
        }
        
        if(rowId == "button-load-before"){
            rowFather =  $('.'+rowId).parents().eq(2).attr('id');
        }else{
            rowFather = rowId
        }
     

        var mediaUploaderBefore;
            if(mediaUploaderBefore){
                mediaUploaderBefore.open();
                return;
            }

            mediaUploaderBefore = wp.media.frames.file_frames = wp.media({
                title: 'Upload picture',
                button: {
                    text: 'Choose picture'
                },
                multiple: false
            });

            mediaUploaderBefore.on('select', function(){
                    attachment = mediaUploaderBefore.state().get('selection').first().toJSON();
                    $('#'+rowFather+' .gallery-before .image-container .picture-before').attr('src', attachment.url);
                    $('#'+rowFather+' .gallery-before .button-container .profile_picture_before').val(attachment.url);
                    var index = attachment.url+'*' +'gallery-before*' + rowFather;
                    $('#'+rowFather+' .gallery-before .button-container .button-load-before').attr({
                                                                                                    value:'Update image',
                                                                                                    class: 'button update_image_before',
                                                                                                    onclick: 'updateImage('+"'"+rowFather+"'"+' , '+"'"+colId+"'"+' , '+"'"+idItem+"'"+','+'"'+index+'"'+' ,'+'"'+indexId+'"'+')'
                                                                                                });
                   
                    saveUrl(index, itemId, indexId);
                });
                mediaUploaderBefore.open();
    }

    var idItemArray = 0;
    function imageAfter(rowId, colId, itemId, indexId){
        if(itemId == 0){
            itemId == 0;
        }else{
            itemId = itemId;
        }
        if(rowId == "button-load-after"){
            rowFather =  $('.'+rowId).parents().eq(2).attr('id');
        }else{
            rowFather = rowId;
        }
        
        var mediaUploaderAfter;
            if(mediaUploaderAfter){
                mediaUploaderAfter.open();
                return;
            }
            mediaUploaderAfter = wp.media.frames.file_frames = wp.media({
                title: 'Upload picture',
                button: {
                    text: 'Choose picture'
                },
                multiple: false
            });
            
            var acum = $('#images').val();
            mediaUploaderAfter.on('select', function(){
                attachment = mediaUploaderAfter.state().get('selection').first().toJSON();
                $('#'+rowFather+' .gallery-after .image-container .picture-after').attr('src', attachment.url);
                $('#'+rowFather+' .gallery-after .button-container .profile_picture_after').val(attachment.url);              
                var index = attachment.url+'*' + 'gallery-after*' + rowFather;
                $('#'+rowFather+' .gallery-after .button-container .button-load-after').attr({
                                                                                                value:'Update image',
                                                                                                class: 'button update_image_after',
                                                                                                onclick: 'updateImage('+"'"+rowFather+"'"+' , '+"'"+colId+"'"+' , '+"'"+itemId+"'"+','+'"'+index+'"'+','+'"'+indexId+'"'+')'
                                                                                            });
                $('#new-row').attr('disabled', false);                                                                                            
                saveUrl(index, itemId, indexId);
    
            });
            mediaUploaderAfter.open();
    }
    var acum = "";
    function saveUrl(url, itemId, indexId){
            if(indexId = "indexId"){
                acum = acum + url + ',';
                $('#images').val(acum);
            }else{
                acum.split(',').splice(indexId, 0, url+',');
            }
    }

    function updateImage(rowId, colId, itemId, index){
        console.log(index);
        arrayData = acum.split(',');
        indexId = arrayData.indexOf(index);
        arrayData.splice(indexId, 1);
        acum = arrayData;
        $('#images').val(acum);
        updateItem = index.split('*');
        colItem = updateItem[1].split('-');
        if(colItem[1] == "before"){
            imageBefore(rowId , colId , itemId, indexId  );
        }else{
            imageAfter(rowId , colId , itemId, indexId );
        }
    }
    