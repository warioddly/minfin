const dt = new DataTransfer();
$('#attachment-files').change(() => {
    let files = $('#attachment-files').prop("files")
    let fileType = '';
    $.map(files, file => {
        console.log(file);
        $('#uploadPreviewTemplate').append('<div class="col-12 col-md-3 mt-1 mb-0 preview_boxes">'+
            '<div class="p-2 shadow-none border">' +
            '<div class="row align-items-center">' +
            '<div class="col-auto">' +
            '<div class="avatar-sm">' +
            `<span class="avatar-title rounded text-uppercase">${file.name.split('.').pop()}</span>` +
            '</div>' +
            '</div>' +
            '<div class="col ps-0">' +
            `<a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name style="overflow:hidden; white-space:nowrap;display:inline-block; text-overflow:ellipsis; width: 150px">${file.name}</a>` +
            `<p class="mb-0" data-dz-size>${file.size/1000000 + 'mb' }</p>` +
            '</div>' +
            '<div class="col-auto">' +
            `<p class="btn btn-link btn-lg text-muted m-0 remove-button" data-dz-remove data-name="${file.name}">` +
            '<i class="dripicons-cross"></i>' +
            '</p>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
        dt.items.add(file);
    });

    $('.remove-button').click(function(){
        let name = $(this).data('name');
        $(this).parent().closest('.preview_boxes').remove();

        for(let i = 0; i < dt.files.length; i++){
            if(name === dt.files[i].name){
                dt.items.remove(i);
            }
        }
        document.getElementById('attachment-files').files = dt.files;
    });

})
