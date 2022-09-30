<form data-parsley-validate novalidate action="{{route('learning.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-sm"  id="createLearning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Learning Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="concept_detail_id" value="{{$conceptDetail->id}}">
                        <div class="col-4">
                            <label for="">Subject Name</label>
                            <input type="text" class="form-control" value="{{$subject->name_sub}}" readonly required>
                        </div>
                        <div class="col-4">
                            <label for="">Concept Name</label>
                            <input type="text" class="form-control" value="{{$concept->concept_name}}" readonly required>
                        </div>
                        <div class="col-4">
                            <label for="">Concept Detail</label>
                            <input type="text" class="form-control" value="{{$conceptDetail->concept_detail_name}}" readonly required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="">Learning Activity</label>
                            <input name="learning_name" type="text" class="form-control" required>
                            @error('learning_name')
                             <span class="text-danger font-size-6">The name of the learning is required</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Learning Activity</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>