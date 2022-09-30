<form data-parsley-validate novalidate action="{{route('notice.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade"  id="createNotice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Advertisement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <input name="creator" type="hidden" value="{{Auth::user()->name}}">
                        {{-- <div class="col-12 col-sm-4"></div> --}}
                        <div class="col-12 col-sm-6">
                            <label for="">Student Advertisement</label><br>
                            {{-- <input type="checkbox" name="studen_notice" id="switch3" switch="bool" checked="" value="Yes">
                            <label class="mt-2" for="switch3" data-on-label="Yes" data-off-label="No"></label> --}}

                            <label class="card py-2 px-3 mx-2 my-1 bg-success text-white" style="cursor: pointer;">
                                <span class="form-check mt-1">
                                
                                {!! Form::radio('studen_notice', 'Yes', null, ['class' => 'form-check-input mr-1']) !!}
                                    Yes
                                </span>
                            </label>
                            <label class="card py-2 px-3 mx-2 my-1 bg-success text-white" style="cursor: pointer;">
                                <span class="form-check mt-1">
                                
                                {!! Form::radio('studen_notice', 'No', null, ['class' => 'form-check-input mr-1']) !!}
                                    No
                                </span>
                            </label>
                            @error('studen_notice')
                                <span class="small text-danger">{{$message}}</span>
                            @enderror 

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="btn btn-primary btn-block file-attachment-btn my-3 py-3">Add Images
                                <input name="image" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                    "textTarget": "#fileE1",
                                    "maxFileSize": "Infinity"
                                 }' multiple>
                            </div>
                            {{-- <span id="fileE1">No files uploaded</span> --}}
                            <span id="fileE1" class="badge badge-warning p-1 mt-1" style="text-transform: capitalize">No files uploaded</span><br>
                            @error('image')
                                <span class="small text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Advertisement</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>