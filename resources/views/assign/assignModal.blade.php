<form data-parsley-validate novalidate action="{{route('assign.store')}}" method="POST">
    <div class="modal fade "  id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Assignment</h5>
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
                                    <label for="">Student</label>
                                    <select name="student_name"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        @foreach ($students as $student)
                                            <option value="{{$student->first_name.' '.$student->last_name}}">{{$student->first_name.' '.$student->last_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('student_name')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Tutors</label>
                                    <select name="tutor_name"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        @foreach ($employessTutors as $tutor)
                                            <option value="{{$tutor->name.' '.$tutor->last_name}}">{{$tutor->name.' '.$tutor->last_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tutor_name')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Subject</label>
                                    <select name="subject"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{$subject->name_sub}}">{{$subject->name_sub}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Assign Tutor</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>