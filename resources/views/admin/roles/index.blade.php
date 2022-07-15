@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('roles') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Roles"
        :breadcrumbs="['Roles']"
    ></x-page-inform>
@endsection

@section('content')
    @error('name')
        <x-alert alertType="danger" message="{{ $message }}"></x-alert>
    @enderror

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        @can('add-roles')
                            <x-page-actions
                                create="Create role"
                                icon="uil-user-plus"
                                rightSide="null"
                            ></x-page-actions>
                        @endcan
                    </div>
                    <x-data-table
                        :items="$roles"
                        :excepts="['updated_at', 'guard_name', 'id']"
                        :links="[null, null, null, null]"
                        :actions="$userCanActions"
                        orederable="false"
                        type="roles"
                    ></x-data-table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    @can('add-roles')
        <div class="modal fade" id="create" aria-hidden="true"
         aria-labelledby="createModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Creating') }} {{ __('role-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('role-store') }}" method="POST" class="p-3">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="roleName" class="form-label">{{ __('Input role name') }}</label>
                            <input type="text" name="name" id="roleName" class="form-control" placeholder="{{ __('Role name') }}" required>
                        </div>
                        <label for="multiselect-create" class="form-label">{{ __('Roles') }}</label>
                        <select class="select2 form-control select2-multiple p-3" name="permissions[]" data-toggle="select2" id="multiselect-create"
                                multiple="multiple" data-placeholder="Choose ..." required>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ __($permission->name) }}</option>
                            @endforeach
                        </select>
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

    @can('edit-roles')
    <div class="modal fade" id="edit" aria-hidden="true"
         aria-labelledby="editModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Renaming') }} {{ __('role-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" class="p-3" id="edit-modal-form">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-3">
                            <label for="editRoleName" class="form-label">{{ __('Input new role name') }}</label>
                            <input type="text" name="name" id="editRoleName" class="form-control" placeholder="{{ __('Role name') }}" required>
                        </div>
                        <label for="multiselect-edit" class="form-label">{{ __('Roles') }}</label>
                        <select class="select2 form-control select2-multiple p-3" name="permissions[]" data-toggle="select2" id="multiselect-edit"
                                multiple="multiple" data-placeholder="Choose ..." required>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ __($permission->name) }}</option>
                            @endforeach
                        </select>
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

    @can('delete-roles')
    <div class="modal fade" id="delete" aria-hidden="true"
         aria-labelledby="deleteModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Removing') }} {{ __('user-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>{{ __('Are you sure you want to delete this role?') }}</h5>
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
    type="role"
    :urls="[route('get-permissions'), route('role-update', ''), route('delete-role'), '', '']"
></x-scripts>
