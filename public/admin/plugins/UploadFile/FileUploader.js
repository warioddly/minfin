const dt = new DataTransfer();
$('#attachment-files').change(() => {
    let files = $('#attachment-files').prop("files")
    let fileType = '';
    $.map(files, file => {
        if(file.type.match('image.*')){
            fileType = `<img data-dz-thumbnail src="${URL.createObjectURL(file)}" class="avatar-sm rounded bg-light " style="object-fit: cover" alt="">`
        }
        else{
            fileType = `<i class="mdi mdi-file-document-outline font-24 px-2" ></i>`
        }
        $('#uploadPreviewTemplate').append('<div class="card mt-1 mb-0 shadow-none border">'+
            '<div class="p-2">' +
            '<div class="row align-items-center">' +
            '<div class="col-auto">' +
            fileType +
            '</div>' +
            '<div class="col ps-0">' +
            `<a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name>${file.name}</a>` +
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
        $(this).parent().closest('div.card.shadow-none').remove();

        for(let i = 0; i < dt.files.length; i++){
            if(name === dt.files[i].name){
                dt.items.remove(i);
            }
        }
        document.getElementById('attachment-files').files = dt.files;
    });
})
