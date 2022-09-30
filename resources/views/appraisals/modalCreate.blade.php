<form data-parsley-validate novalidate action="{{route('appraisal.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade"  id="createAppraisals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Appraisal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Creator Name</label>
                            <input name="creator_name" type="text" class="form-control"
                                value="{{Auth::user()->name}}" required readonly>
                            <input name="employe_id" type="hidden" value="{{$user->id}}">
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Assigned</label>
                            <input name="assigned" type="text" class="form-control"
                                value="{{$user->name}}" required readonly>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Delivery Date</label>
                            <input name="delivery_date" type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy"  class="form-control validate" placeholder="Delivery Date" value="{{ old('delivery_date')}}">
                            {{-- {!! Form::text('delivery_date', null, ['class' => 'form-control validate', 'placeholder' => 'Delivery Date']) !!} --}}
                            @error('delivery_date')
                                <span class="small text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                    </div>
                    {{-- <div class="row mt-2">
                        <div class="col-12 col-sm-12">
                            <label for="">Appraisal Name</label>
                            <input name="appraisal_name" type="text" class="form-control"
                                value="{{Auth::user()->name}}" required readonly>
                        </div>
                    </div> --}}
                    <div class="row mt-2">
                        <div class="col-12 col-sm-12">
                            <label for="">Observations</label>
                            <textarea rows="5" class="form-control" id="inputBio"
                             placeholder="Write your observations......" name="observations" maxlength="2500" value="">{{ old('observations')}}</textarea>
                             @error('observations')
                                <span class="small text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="btn btn-primary btn-block file-attachment-btn my-3 py-3">Add Appraisal Files
                                <input name="appraisals" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                    "textTarget": "#fileE1",
                                    "maxFileSize": "Infinity"
                                 }' multiple value="{{ old('appraisals')}}">
                            </div>
                            <span id="fileE1"  class="badge badge-soft-warning px-2 py-1" style="font-size: 10px">No files uploaded. (Max. 10.240kb)</span><br>
                            @error('appraisals')
                                <span class="small text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Appraisal</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>