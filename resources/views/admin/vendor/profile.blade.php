@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Profile"
        :breadcrumbs="['Profile']"
    ></x-page-inform>
@endsection

@section('content')

    @error('email')
        <x-alert alertType="danger" message="{{ $message }}"></x-alert>
    @enderror

    @if(session('status'))
        <x-alert alertType="success" message="{{ session('status') }}"></x-alert>
    @endif

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ auth()->user()['avatar'] }}" class="rounded-circle avatar-lg img-thumbnail" style="object-fit: cover"
                         alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ auth()->user()['last_name'] }} {{ auth()->user()['name'] }}</h4>
                    <p class="text-muted font-14">{{ $roles[0] }}</p>

                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">{{ __('About') }} : </h4>
                        <p class="text-muted font-13 mb-3">
                            {{ auth()->user()['about'] }}
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong>
                            <span class="ms-2">
                                {{ auth()->user()['last_name'] }} {{ auth()->user()['name'] }} {{ auth()->user()['middle_name'] }}
                            </span>
                        </p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ auth()->user()['email'] }}</span></p>

                        <p class="text-muted mb-1 font-13"><strong>{{ __('Roles') }} :</strong>
                            @foreach($roles as $role)
                                <span class="ms-2">{{ $role }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#notes" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                {{ __('Notes') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                {{ __('Profile settings') }}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active show" id="notes">
                            <div class="rounded mt-2 mb-3">
                                <form action="{{ route('store-notes') }}" method="POST" class="comment-area-box">
                                    @csrf
                                    <label for="note">{{ __('Note') }}</label>
                                    <textarea maxlength="255" rows="4" id="note" name="note"
                                              class="form-control mb-2"
                                              placeholder="{{ __('Write something....') }}" required></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-sm btn-dark waves-effect">{{ __('Create') }}</button>
                                    </div>
                                </form>
                            </div>
                            <h5 class="text-uppercase">
                                <i class="mdi mdi-briefcase me-1"></i>
                                {{ __('Notes') }}
                            </h5>

                            <div class="timeline-alt pb-0">
                                @foreach($notes as $note)
                                    <div class="timeline-item">
                                    <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <div class="d-flex justify-content-between align-items-baseline ">
                                            <h5 class="mt-0 mb-1 text-break">{{ \Illuminate\Support\Str::limit($note->note, $limit = 60, $end = '...') }}</h5>
                                            <form action="{{ route('delete-notes', $note->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0 text-muted">
                                                    <i class="uil-trash-alt h4"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                        <p class="font-14">{{ auth()->user()['name'] }}<span class="ms-2 font-12">{{ Carbon\Carbon::parse($note->created_at) }}</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-3">{{ $note->note }}</p>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form action="{{ route('update-profile', auth()->user()['id']) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PATCH')
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> {{ __('Personal Info') }}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">{{ __('Last Name') }}</label>
                                            <input type="text" class="form-control"
                                                   name="last_name" id="lastname"
                                                   value="{{ auth()->user()['last_name'] }}"
                                                   placeholder="{{ __('Enter last name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" id="firstname"
                                                   name="name" value="{{ auth()->user()['name'] }}" placeholder="{{ __('Enter name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="middlename" class="form-label">{{ __('Middle Name') }}</label>
                                            <input type="text" class="form-control" name="middle_name"
                                                   id="middlename" value="{{ auth()->user()['middle_name'] }}"
                                                   placeholder="{{ __('Enter middle name') }}">
                                            <span class="form-text text-muted"><small>{{ __('Not necessary') }}</small></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="avatar" class="form-label">{{ __('About') }}</label>
                                            <input type="file" class="form-control" name="avatar" id="avatar" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="userbio" class="form-label">{{ __('About') }}</label>
                                            <textarea class="form-control" id="userbio"
                                                      name="about" rows="4"
                                                      placeholder="{{ __('Write something...') }}">{{ auth()->user()['about'] }}</textarea>
                                            <span class="form-text text-muted"><small>{{ __('Not necessary') }}</small></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control"
                                                   name="email" id="useremail" value="{{ auth()->user()['email'] }}"
                                                   placeholder="{{ __('Enter email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">{{ __('Password') }}</label>
                                            <input type="password" class="form-control" name="password" autocomplete="new-password"
                                                   id="userpassword" placeholder="{{ __('Enter password') }}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary mt-2"><i class="mdi mdi-content-save"></i> {{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
