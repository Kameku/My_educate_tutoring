<div class="card">
    <div class="card-header bg-primary text-white">
        <span>Documents</span>
    </div>
    <div class="card-body">
        {{-- <form class="needs-validation" novalidate=""
            action="{{ route('employees.update', $user) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') --}}
            {!! Form::model($user, ['route' => ['employees.update', $user], 'method' => 'put', 'files' => true]) !!}
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Document name</th>
                                <th scope="col" class="sort" data-sort="budget">Upload</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>CV / Resume</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="cv_resumen" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->cv_resumen)
                                                <a href="{{Storage::url($user->cv_resumen)}}" id="fileE" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                            @error('cv_resumen')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ 'Fallo' }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>Statement of teaching practice</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                        <input name="statement_practice" type="file"
                                            class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                    "textTarget": "#fileE2",
                                    "maxFileSize": "Infinity"
                                }' multiple>
                                    </div>
                                    @if ($user->statement_practice)
                                        <a href="{{Storage::url($user->statement_practice)}}" id="fileE2" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                        @else
                                            <span id="fileE2" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                    @endif
                                    {{-- <span class="font-size-15" id="fileE2">No files uploaded</span> --}}
                                    @error('statement_practice')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Fallo' }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>Qualification(s)</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="qualification" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE3",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->qualification)
                                                <a href="{{Storage::url($user->qualification)}}" id="fileE3" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE3" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>Teachers Registration</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="teacher_registration" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE4",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->teacher_registration)
                                                <a href="{{Storage::url($user->teacher_registration)}}" id="fileE4" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE4" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>Registration to work with vulnerable people</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="registration_people" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE5",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->registration_people)
                                            <a href="{{Storage::url($user->registration_people)}}" id="fileE5" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE5" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>ATA accreditation</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="ata_acreditation" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE6",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->ata_acreditation)
                                            <a href="{{Storage::url($user->ata_acreditation)}}" id="fileE6" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE6" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body pt-2">
                                            <span>Additional qualification(s)</span>
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <div class="row align-items-center">
                                        <div class="col pt-2">
                                            <div class="btn btn-primary btn-sm file-attachment-btn">Upload File
                                                <input name="subject_specialized" type="file"
                                                    class="js-file-attach file-attachment-btn-label"
                                                    data-hs-file-attach-options='{
                                            "textTarget": "#fileE7",
                                            "maxFileSize": "Infinity"
                                        }' multiple>
                                            </div>
                                            @if ($user->subject_specialized)
                                                <a href="{{Storage::url($user->subject_specialized)}}" id="fileE7" class="badge badge-success p-1 mt-1" style="text-transform: capitalize; text-size: 10px;" target="_blank">Loaded, see file.</a>
                                            @else
                                                <span id="fileE7" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span>
                                                
                                            @endif
                                          
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
            {!! Form::close() !!}



    </div>
</div>
