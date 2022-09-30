<form data-parsley-validate novalidate action="{{route('atten.update',['atten' => $atten->id])}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="learningPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Complete Learning Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8">
                                    <label for="">Student</label>
                                    <input type="text" class="form-control"  value="{{$atten->student_name}}" readonly disabled>
                                </div>
                                <div class="col-2">
                                    <label for="">Term</label>
                                    <input type="text"  class="form-control" value="{{$atten->term}}" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="">Lesson</label>
                                    <input type="text"  class="form-control" value="{{$atten->lesson}}" readonly>
                                </div>
                            </div>    
                        </div>
                    </div>
                    @livewire('attendance-library-select')
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Tutor Evaluation</label>
                                    <select name="tutor_evaluation"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        <option value="Achieved">Achieved</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Not Yet">Not Yet</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="">Student Self Assessment</label>
                                    <select name="student_self"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select..</option>
                                        <option value="Achieved">Achieved</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Not Yet">Not Yet</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Complete Learning Plan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>