<form data-parsley-validate novalidate action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade"  id="createEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-4"></div>
                        <div class="col-4 center">
                            <div class="form-group file_e1 mb-8 text-center">
                                <img src="https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=New-User" alt="" width="150" class="rounded-circle">
                                {{-- <img src="{{URL::asset('images/users/myAvatar.png')}}" alt="" width="150" class="rounded-circle"> --}}
                                {{-- <br>
                                <div class="btn btn-primary file-attachment-btn mt-3">Profile Picture
                                    <input name="profile_photo" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                        "textTarget": "#fileE1",
                                        "maxFileSize": "Infinity"
                                     }'>
                                </div>
                                <span id="fileE1"></span> --}}
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="useremail">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="useremail" placeholder="Enter email" autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" class="form-control @error('name') is-invalid @enderror" autofocus id="name" placeholder="Enter name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Last Name') }}</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" class="form-control @error('last_name') is-invalid @enderror" autofocus id="last_name" placeholder="Enter last name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="userpassword">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="userpassword" placeholder="Enter password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="userpassword">{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" id="userconfirmpassword" placeholder="Confirm password">
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
                <label class="ml-3">Employee Type</label>
                <div class="row mx-2">
                    
                @foreach ($roles as $role)
                    
                        <div class="col-4">
    
                            <label class="card-header bg-info text-white rounded mt-2 pr-6" style="cursor: pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                                    style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                        style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <circle cx="12" cy="7" transform="scale(7.16667,7.16667)" r="5" opacity="0.35"></circle>
                                            <path
                                                d="M129,107.5h-86c-11.87517,0 -21.5,9.62483 -21.5,21.5c0,11.87517 9.62483,21.5 21.5,21.5h86c11.87517,0 21.5,-9.62483 21.5,-21.5c0,-11.87517 -9.62483,-21.5 -21.5,-21.5z"
                                                opacity="0.35"></path>
                                            <path
                                                d="M121.83333,129h-14.33333c-3.956,0 -7.16667,3.21067 -7.16667,7.16667v14.33333h28.66667v-14.33333c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <span class="form-check">
                                    {{ $role->description }}
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input ml-1']) !!}
                                </span>
                            </label>
                        </div>

                    
                    @endforeach
                </div>
                <div class="modal-footer">
                    @can('employees.create')
                        <button type="submit" class="btn btn-primary">Create Employee</button>
                    @endcan
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>