var image_preview_clone;
var image_poll_add_totaldiv;

function clearFileInput(){

    var input = $("#poll_image");
    input.replaceWith(input.val('').clone(true));
    $("#image-preview").replaceWith(image_preview_clone.clone());
}


function fileSelected() {
    image_preview_clone = $('#image-preview').clone();

    // hide different warnings
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';

    // get selected file element
    var oFile = document.getElementById('poll_image').files[0];

    // filter for image files
    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    if (! rFilter.test(oFile.type)) {
        document.getElementById('error').style.display = 'inline';
        clearFileInput();
        return;
    }


    // get preview element
    var oImage = document.getElementById('preview');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
        oReader.onload = function(e){

        // e.target.result contains the DataURL which we will use as a source of the image
        oImage.src = e.target.result;

        oImage.onload = function () { // binding onload event

            // we are going to display some custom image information here
            sResultFileSize = bytesToSize(oFile.size);
            document.getElementById('fileinfo').style.display = 'block';
            document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
            document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
            document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
            document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };
 
    document.getElementById('preview-icon').style.display='none';
    document.getElementById('image-preview-inbox').style.opacity='1';
    document.getElementById('image-preview-inbox').style.padding='2%';


    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}


