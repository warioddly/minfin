@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Users"
        :breadcrumbs="['Users']"
    ></x-page-inform>
@endsection

@section('content')

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert alertType="danger" message="{{ $error }}"></x-alert>
        @endforeach
    @endif

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        @can('add-users')
                            <x-page-actions
                                create="Create user"
                                icon="uil-user-plus"
                                right-side="export"
                            ></x-page-actions>
                        @endcan
                    </div>
                    <x-data-table
                        :items="$users"
                        :excepts="['updated_at', 'about', 'email_verified_at', 'avatar', 'middle_name', 'last_name', 'id']"
                        :links="[null, null, null, null]"
                        :actions="$userCanActions"
                    ></x-data-table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('modal')
    @can('add-users')
        <div class="modal fade" id="create" aria-hidden="true" role="dialog"
         aria-labelledby="editModalLabel">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 1419px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }} {{ __('user-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-user') }}" method="POST" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-3">
                            <img src="{{ url('/storage/files/1/Аватар/default-avatar.jpg') }}" class="rounded" alt="" id="image-preview-1" style="width: 100%;object-fit: cover;">
                        </div>
                        <div class="col-12 col-md">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <label for="last_name" class="form-label">{{ __('Last name') }}</label>
                                    <input name="last_name" type="text" id="last_name" class="form-control mb-2" placeholder="{{ __('Input last name') }}" required>

                                    <label for="middle_name" class="form-label">{{ __('Middle name') }}</label>
                                    <input name="middle_name" type="text" id="middle_name" class="form-control" placeholder="{{ __('Input middle name') }}" >
                                    <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input name="name" type="text" id="name" class="form-control mb-2" placeholder="{{ __('Input user name') }}" required>

                                    <label for="user-email" class="form-label">Email</label>
                                    <input name="email" type="email" id="user-email" class="form-control" placeholder="{{ __('Input email') }}" >
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="user-image" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" name="password" class="form-control mb-2" >

                                    <label for="user-image" class="form-label">{{ __('Select image') }}</label>
                                    <input type="file" name="avatar" class="form-control user-image-1" >
                                    <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="roles-multiselect" class="form-label">{{ __('Roles') }}</label>
                            <select class="select2 form-control select2-multiple" name="roles[]" data-toggle="select2" id="multiselect-create"
                                    multiple="multiple" data-placeholder="Choose ..." required>
                                @foreach($roles as $role)
                                    @if($role->name == 'guest')
                                        <option value="{{ $role->id }}" selected>{{ __($role->name) }}</option>
                                        @continue
                                    @endif
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="about-textarea" class="form-label">{{ __('About') }}</label>
                            <textarea class="form-control" name="about" id="about-textarea" rows="4" maxlength="120" data-toggle="maxlength" data-threshold="12" required></textarea>
                            <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('edit-users')
        <div class="modal fade" id="edit" aria-hidden="true"
         aria-labelledby="editModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 1419px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Renaming') }} {{ __('user-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="edit-form" enctype="multipart/form-data" class="p-3">
                    @csrf
                    @method('PATCH')
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-3">
                            <img src="" alt="" class="user-img image-preview rounded" id="image-preview-2" style="width: 100%;object-fit: cover;">
                        </div>
                        <div class="col-12 col-md">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <label for="last_name" class="form-label">{{ __('Last name') }}</label>
                                    <input name="last_name" type="text" id="last_name" class="form-control mb-2" placeholder="{{ __('Input last name') }}" required>

                                    <label for="middle_name" class="form-label">{{ __('Middle name') }}</label>
                                    <input name="middle_name" type="text" id="middle_name" class="form-control" placeholder="{{ __('Input middle name') }}" >
                                    <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input name="name" type="text" id="name" class="form-control mb-2" placeholder="{{ __('Input user name') }}" required>

                                    <label for="user-email" class="form-label">Email</label>
                                    <input name="email" type="email" id="user-email" class="form-control" placeholder="{{ __('Input email') }}" >
                                </div>
                                <div class="mb-3 mt-2">
                                    <label for="user-image" class="form-label">{{ __('Select image') }}</label>
                                    <input type="file" name="avatar" class="form-control user-image-2" >
                                    <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="roles-multiselect" class="form-label">{{ __('Roles') }}</label>
                            <select class="select2 form-control select2-multiple" name="roles[]" data-toggle="select2" id="multiselect-edit"
                                    multiple="multiple" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ __($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="about-textarea" class="form-label">{{ __('About') }}</label>
                            <textarea class="form-control" name="about" id="about-textarea" rows="4" maxlength="120" data-toggle="maxlength" data-threshold="12" required></textarea>
                            <span class="font-13 text-muted">{{ __('Not necessary') }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('delete-users')
        <div class="modal fade" id="delete" aria-hidden="true"
         aria-labelledby="deleteModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }} {{ __('user-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>{{ __('Are you sure you want to delete this user?') }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger item-delete">{{ __('Remove') }}</button>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endpush

<x-scripts
    type="user"
    :urls="[route('get-users'), route('update-user', ''), route('delete-user'), '', '']"
></x-scripts>
