
Dropzone.autoDiscover = false;
$(document).on("click", "#upload_files", function(event) {
    event.preventDefault();
    myDropzone.options.autoProcessQueue = true;
    myDropzone.processQueue();
})

$(document).ready(function() {
    $("[data-toggle=tooltip]").tooltip();
    $('#datatable').DataTable();

    
    $(document).on("click",".trigger_delete", function(e) {
        var confirm_delete = confirm("Are you sure you want to delete?");
        if(!confirm_delete) {
            e.preventDefault();
        }
    })


    try {
        myDropzone = new Dropzone('#file-dropzone', {
            //url: "upload/",
            maxFilesize: 100000,
            acceptedFiles: '.csv',
            paramName: "uploads",
            maxThumbnailFilesize: 500000,
            autoProcessQueue: false,
            addRemoveLinks: true,
            parallelUploads: 1,
            uploadfile:true,
            uploadMultiple:false,
            dictRemoveFile: 'X',
            thumbnailWidth: "175",
            thumbnailHeight: "150",

            init: function() {
                this.on('success', function(file, json) {
                    console.log(json);
                });
                this.on('addedfile', function(file) {
                });
                this.on('drop', function(file) {
                }); 
                this.on("queuecomplete", function (file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        //refresh page
                         //window.location.href=window.location
                    }
                });
            }
        });
    } catch (e) {}


});



