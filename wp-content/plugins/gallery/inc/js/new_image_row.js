function addNewRow(id){
    var Nid = parseInt(id.split('-').pop());
    var NGalID = parseInt(Nid + 1);
    //console.log(NGalID);
    $('<div class="gallery-container" id="id-'+NGalID+'" >'
    +'<input type="button" class="close-div" value="x" onclick="closeDiv('+"'"+'close-div'+"'"+')"  id="close"/>'
    +'<div class="gallery-item gallery-before">'
    +'<H3>Before</H3>'
    +'<div class="image-container">'
    +'<img src="" id="image-before'+NGalID+'"  class="picture-before">'
    +'</div>'
    +'<div class="button-container">'
    +'<input type="button" class="button button-secondary button-load-before" id="button-before'+NGalID+'" value="Upload File" onclick="imageBefore('+"'"+'button-load-before'+"'"+' , '+"'"+'x'+"'"+' , '+"'"+0+"'"+' , '+"'"+'indexId'+"'"+'  )"/>'
    +'<input type="hidden" id="image_before_hidden'+NGalID+'" class="profile_picture_before" value = "" />'
    +'</div>'
    +'</div>'
    +'<div class="gallery-item gallery-after">'
    +'<H3>After</H3>'
    +'<div class="image-container">'
    +'<img src="" id="image-after'+NGalID+'" class="picture-after">'
    +'</div>'
    +'<div class="button-container">'
    +'<input type="button" class="button button-secondary button-load-after" id="button-after'+NGalID+'" name="button-after" value="Upload File" onclick="imageAfter('+"'"+'button-load-after'+"'"+','+"'"+'y'+"'"+' , '+"'"+0+"'"+', '+"'"+'indexId'+"'"+' )"/>'
    +'<input type="hidden" id="image_after_hidden'+NGalID+'" class="profile_picture_after" value = "" />'
    +'</div>'
    +'</div>'
    +'</div>').appendTo('.gallery');
}

 