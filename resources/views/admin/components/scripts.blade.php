@push('footer-scripts')
    <script>
        let id = null;
        let restoreUrl = null;

        function bridge(url, id, typeResponse = false) {
            return $.ajax({
                url: url,
                type: "POST",
                data: {id: id},
                success: res => {
                    if(typeResponse === true){
                        return res;
                    }
                    else{
                        location.reload();
                    }
                },
            });
        }

        $(".view-button").click(function() {

            id = $(this).data('id');

            @if($type == 'user')
                let user_status = $(this).data('status');

                getUser()

                async function getUser() {
                    try {
                        let user = await bridge('{{ $urls[0] }}', id, true)
                        user = user['user'];
                        let middle_name = user.middle_name ? user.middle_name : '';

                        $('#view .img-thumbnail').attr('src', user.avatar);

                        $('#view .user-name').text(user.last_name + " " + user.name);
                        $('#view .user-full-name').text(user.last_name + " " + user.name + " " + middle_name);
                        $('#view .created-date').text(user.created_at.substring(0, 10));
                        $('#view .user-email').text(user.email);
                        $('#view .user-status').text(user_status);
                        $('#view .about-user').text(user.about);

                    } catch(err) {
                        console.log(err);
                    }
                }
            @endif
        });

        $(".edit-button").click(function() {
            id = $(this).data('id');
            let url = '';

            @if($type == 'user')
                url = "{{ $urls[1] }}" + "/" + id;
                $("#edit-form").attr('action', url);

                getUser()

                async function getUser() {
                    try {
                        let user = await bridge('{{ $urls[0] }}', id, true)
                        let user_roles = user['roles'];
                        user = user['user'];

                        $('#edit .user-img').attr('src', user.avatar);
                        $('#edit #user-id').val(id);
                        $('#edit #last_name').val(user.last_name);
                        $('#edit #name').val(user.name);
                        $('#edit #middle_name').val(user.middle_name);
                        $('#edit #user-email').val(user.email);
                        $('#edit #about-textarea').val(user.about);

                        $("#multiselect-edit").select2({
                            dropdownParent: $('#edit .modal-content'),
                        });

                        $("#multiselect-edit").val(user_roles).trigger("change");

                    } catch(err) {
                        console.log(err);
                    }
                }

            @elseif($type == 'category' || $type == 'settings' )
                let title = $(this).data('title');
                let type = $(this).data('type');

                if(type != null && type === 'social'){
                    url = "{{ $urls[3] }}" + "/" + id;

                    $("#edit-modal-social-form").attr('action', url);
                    $("#edit-modal-social-form #title").attr('value', $(this).data('title'));
                    $("#edit-modal-social-form #page-icon").attr('value', $(this).data('icon-name'));
                    $("#edit-modal-social-form #create-link-input").attr('value', $(this).data('url'));
                    $("#edit-modal-social-form #delete-button").attr('data-id', id);
                    $("#edit-modal-social-form #open-link").attr('href', $(this).data('url'));
                }
                else{
                    url = "{{ $urls[1] }}" + "/" + id;
                    $("#edit-modal-form").attr('action', url);
                    $("#edit-input").attr('value', title);
                }


            @elseif($type == 'pages')

                url = "{{ $urls[1] }}" + "/" + id;

                getPage()

                async function getPage() {
                    let data = await bridge('{{ $urls[0] }}', id, true)

                    $("#edit-modal-form").attr('action', url);
                    $("#edit-modal-form #create-input").val(data['page'].title);
                    $("#edit-modal-form #description").val(data['page'].description);

                    if(data['page'].icon.substring(0, 4).includes('mdi-')){
                        $("#edit-modal-form #page-icon").val(data['page'].icon);
                    }

                    $("#select-edit").select2({
                        dropdownParent: $('#edit .modal-content'),
                    });

                    $("#select-edit").val({{ $pageParentId }}).trigger("change");
                }

            @elseif($type == 'role')

                url = "{{ $urls[1] }}" + "/" + id;

                getPermissions()

                async function getPermissions() {
                    let data = await bridge('{{ $urls[0] }}', id, true)

                    $("#edit-modal-form").attr('action', url);
                    $("#editRoleName").val(data['role']);

                    $("#multiselect-edit").select2({
                        dropdownParent: $('#edit .modal-content'),
                    });

                    $("#multiselect-edit").val(data['permissions']).trigger("change");
                }

            @endif

        });

        $(".delete-button").click(function() {
            id = $(this).data('id');
        });

        $(".restore-button").click(function() {
            id = $(this).data('id');
            restoreUrl = $(this).data('restore-url');
        });

        $(".restore-item").click(() => {
            bridge(restoreUrl, id, false);

        });

        $(".item-delete").click((event) => {
            let type = $(event.currentTarget).data('type');
            if(type != null && type === 'social') {
                bridge('{{ $urls[4] }}', id, false);
            }
            else{
                bridge('{{ $urls[2] }}', id, false);
            }
        });

        $('.user-image-1').change(function(event) {
            let image = window.URL.createObjectURL(event.target.files[0]);
            $('#image-preview-1').attr('src', image)
        });

        $('.user-image-2').change(function(event) {
            let image = window.URL.createObjectURL(event.target.files[0]);
            $('#image-preview-2').attr('src', image)
        });

        $("#multiselect-create").select2({
            dropdownParent: $('#create .modal-content'),
        });

        $("#multiselect-change").select2({
            dropdownParent: $('#changeMainPageBlocks .modal-content'),
            maximumSelectionLength: 15
        });

        $(".delete-modal-button").click(function() {
            $("#delete-input-id[value]").val($(this).data('id'));
        });

        $(".change-button").click(() => {

            getSelectedPages()

            async function getSelectedPages() {
                let data = await bridge('{{ route('get-selected-page') }}', false, true)
                $("#multiselect-change").select2({
                    dropdownParent: $('#changeMainPageBlocks .modal-content'),
                    maximumSelectionLength: 15
                });

                $("#multiselect-change").val(data['pages']).trigger("change");
            }
        })

    </script>
@endpush
