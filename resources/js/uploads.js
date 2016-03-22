$(document).ready( function() {

    $('#hidden_input_file').upload({
        browser: {
            render: function() {
                var button = document.createElement('button');
                $(button).text('Select file');
                $('#browser').html( button );
                return button;
            },
            onDrop: function(htmlElement, event) {},
            onClick: function(htmlElement, event) {},
            onDragOver: function(htmlElement, event) {},
            onDragEnter: function(htmlElement, event) {},
            onDragLeave: function(htmlElement, event) {}
        },
        preview: {
            render: function () {
                var ul = (new Uploader.Html()).getUl();
                var li = (new Uploader.Html()).getLi();
                var div = (new Uploader.Html()).getDiv();
                var upload = (new Uploader.Html()).getButton();
                var cancel = (new Uploader.Html()).getButton();
                var progress = (new Uploader.Html()).getProgress();

                $(upload).text('Upload file');
                $(cancel).text('Cancel');
                $('#preview').html(ul);

                return {
                    container: ul,
                    item: li,
                    preview: div,
                    progress: progress,
                    upload: upload,
                    cancel: cancel
                };
            },
            maxFiles: 10,
            minFileSize: '1KB',
            maxFileSize: '10MB',
            allowedMimeTypes: ['image/jpg', 'image/png', 'image/jpeg'],
            allowedExtensions: ['jpg', 'png','jpeg'],
            forbiddenMimeTypes: ['application/pdf'],
            forbiddenExtensions: ['pdf'],
            errorMessages: {
                forbidden: 'You cannot select forbidden file.',
                tooLargeFile: 'Your file is too large.',
                tooSmallFile: 'Your file is too small.',
                tooManyFiles: 'You cannot upload more files.'
            },
            error: function(message) {
                alert(message);
            },
            upload: {
                url: '/uploads/save',
                onLoad: function( event, file, upload ) {

                },
                onAbort: function(event, file, upload) {

                },
                onError: function(event, file, upload) {

                },
                onLoadEnd: function( event, file, upload ) {

                },
                onTimeout: function(event, file, upload) {

                },
                onProgress: function(event, file, upload) {

                },
                onLoadStart: function(event, file, upload) {

                }
            }
        }
    });

});