$(document).on( 'ready', function() {

    var settings = {
        progress:  function( event ){
            var percentage = Math.round((event.position / event.total) * 100);
            console.log(percentage + '%');
        },
        load: function(event){
            console.log('complete');
        },
        data:{}
    };

    function uploadFiles( files ) {

        var fd = new FormData( $('#upload_form')[0] );

        $.ajax({
            url : '/uploads/save',
            type : 'POST',
            data : fd,
            processData: false,
            contentType: false,
            xhr: function() {
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress', function(event){
                        renderUploads(files)
                        var percentage = Math.round( event.loaded / event.total );

                    }, false);
                }
                return myXhr;
            }
        });
    }

    function renderUploads( files ){

        for(var i=0; i<files.length; i++ ) {

            var file = files[i];

            if( file.type.match(/image.*/) && file.size < 50000000 ) {

                var reader = new FileReader();

                reader.onload = function(e) {

                    var data = e.target.result;

                    $( "<img>", {src: data, class: 'upl_img'} ).appendTo( '#images_list ul' ).wrap('<li></li>');

                };

                reader.readAsDataURL( file );

            }
        }
    }

    $('#uploader').on( 'click', function( e ) {
        e.stopPropagation();

        $('#hidden_input_file')

            .click()

            .on('change', function() {

                var files = this.files;
                uploadFiles( files );


            });
    });

});
