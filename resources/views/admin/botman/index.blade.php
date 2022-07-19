@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('botman') }}
            </ol>
        </div>
    </div>
    <x-page-inform
        title="Botman"
        :breadcrumbs="['Botman']"
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
                                create="Create list"
                                icon="uil-user-plus"
                                right-side="export"
                            ></x-page-actions>
                        @endcan
                    </div>
                    <x-data-table
                                :items="$messages"
                                :excepts="['updated_at', 'parent_message_id', 'id']"
                                :links="['', 'show-botman-message', null, null]"
                                :actions="$userCanActions"
                                type="pages"
                            ></x-data-table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('modal')
    @can('add-botman-messages')
        <div class="modal fade" id="create" aria-hidden="true" role="dialog"
         aria-labelledby="editModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Creating') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-botman-message') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="create-input" class="form-label" >{{ __('Enter message') }}</label>
                            <textarea type="text" name="message" class="form-control" rows="10" maxlength="700" data-toggle="maxlength" data-threshold="700"></textarea>
                            <input type="hidden" name="parent_message_id" value="null">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <strong class="me-2" style="margin-top: -6px;">{{__('As an answer')}}:</strong>
                            <span>
                                <input type="checkbox" id="switch" name="is_answer" data-switch="primary"/>
                                <label for="switch" data-on-label="{{ __('Yes') }}" data-off-label="{{ __('No') }}"></label>
                            </span>
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

    @can('edit-botman-messages')
        <div class="modal fade" id="edit" aria-hidden="true"
         aria-labelledby="editModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Renaming') }} {{ __('user-2') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="edit-modal-form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="create-input" class="form-label" >{{ __('Enter message') }}</label>
                            <textarea type="text" id="botman_message" name="message" class="form-control" rows="10" maxlength="700" data-toggle="maxlength" data-threshold="700"></textarea>
                            <input type="hidden" name="parent_message_id" value="null">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <strong class="me-2" style="margin-top: -6px;">{{__('As an answer')}}:</strong>
                            <span>
                                <input type="checkbox" id="switch_edit" name="is_answer" data-switch="primary"/>
                                <label for="switch_edit" data-on-label="{{ __('Yes') }}" data-off-label="{{ __('No') }}"></label>
                            </span>
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

    @can('delete-botman-messages')
        <div class="modal fade" id="delete" aria-hidden="true"
         aria-labelledby="deleteModalLabel"
         tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('Removing') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>{{ __('Are you sure you want to delete this?') }}</h5>
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
    type="botman"
    :urls="[route('get-botman-message'), route('update-botman-message', ''), route('delete-botman-message'), '', '']"
></x-scripts>

