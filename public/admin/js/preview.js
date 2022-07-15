$('.preview_btn').click(() => {
    let ru_title = $('form .ru_title').val();
    let kg_title = $('form .kg_title').val();
    let en_title = $('form .en_title').val();

    let ru_description = $('form .ru_description').val();
    let kg_description = $('form .kg_description').val();
    let en_description = $('form .en_description').val();

    let category = $("form .category option:selected").text();
    let publisher = $("form .publisher option:selected").text();

    var objEditor = CKEDITOR.instances["editor"];
    var objEditor2 = CKEDITOR.instances["editor2"];
    var objEditor3 = CKEDITOR.instances["editor3"];
    var ru_content = objEditor.getData();
    var kg_content = objEditor2.getData();
    var en_content = objEditor3.getData();

    if(window.location.href.indexOf("create") !== -1){
        try {
            const file = $('form .preview_image').prop("files")[0];
            $('.modal .preview_image').attr('src', URL.createObjectURL(file));
        }
        catch (e){
            //
        }
    }
    else{
        $('.modal .preview_image').attr('src', $('form .preview_image').val());
    }

    $('.modal .ru_title').text(ru_title);
    $('.modal .ru_description').text(ru_description);
    $('.modal .ru_content').empty().append(ru_content);

    $('.modal .kg_title').text(kg_title);
    $('.modal .kg_description').text(kg_description);
    $('.modal .kg_content').empty().append(kg_content);

    $('.modal .en_title').text(en_title);
    $('.modal .en_description').text(en_description);
    $('.modal .en_content').empty().append(en_content);

});

