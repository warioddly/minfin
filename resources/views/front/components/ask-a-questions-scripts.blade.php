<script>
    $('#region').change(function(){
        $('#district option').hide();
        $('#district option[data-region="'+$(this).val()+'"]').show()
    });

    $(() => {
        $('#district option').hide();
    })
</script>
