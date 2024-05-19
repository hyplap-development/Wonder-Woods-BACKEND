"use strict";
// Class definition

var KTDropzoneDemo = function () {
    // Private functions
    var demo1 = function () {

        // file type validation
        $('#kt_dropzone_3').dropzone({
            url: "/admin/product/addImages",
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            dictDefaultMessage: "Drop files here or click to upload.",
            dictRemoveFile: "Remove",
            dictFileTooBig: "Image is bigger than 10MB",
            dictInvalidFileType: "You can't upload files of this type.",
            dictMaxFilesExceeded: "You can not upload any more files.",
            
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

KTUtil.ready(function() {
    KTDropzoneDemo.init();
});
