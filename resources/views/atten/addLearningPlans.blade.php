<form data-parsley-validate novalidate action="{{route('atten.addLearning')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="addLearningPlansModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Lesson Component</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @livewire('attendance-library-select')
                    <input type="hidden" name="atten_id" id="atten_id" value="{{ $atten->id }}" readonly>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Lesson Component</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>