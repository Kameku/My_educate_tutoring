<form data-parsley-validate novalidate action="{{route('homework.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="homeworkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Homework</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Tutor</label>
                                    <input type="text" name="tutor_name"  class="form-control" value="{{$atten->tutor_name}}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="">Student</label>
                                    <input type="text" name="student_name" class="form-control" value="{{$atten->student_name}}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="">Due Date</label>
                                    <input type="text" name="delivery" data-provide="datepicker" data-date-format="dd-mm-yyyy"  class="form-control">
                                    @error('delivery') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <input type="hidden" name="atten_id" value="{{$atten->id}}">
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="observations" id="" cols="30" rows="10"></textarea> 
                                    @error('observations') <span class="text-danger">{{$message}}</span> @enderror   
                                </div>
                            </div>    
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="btn btn-primary btn-block file-attachment-btn my-3 py-3">Add Files
                                <input name="homeworks[]" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                    "textTarget": "#fileE1",
                                    "maxFileSize": "Infinity"
                                 }' multiple>
                            </div>
                            <span id="fileE1">No files uploaded</span>
                            @error('homeworks')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ 'Fallo' }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Homework</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>