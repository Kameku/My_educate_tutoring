<form data-parsley-validate novalidate action="{{route('assign.edit')}}" method="POST">
    <div class="modal fade "  id="assignModalEdit{{ $assign->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Assignment Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row d-none">
                                <div class="col-12 ">
                                    <label for="">id</label>
                                    <input type="text" name="assign_id" class="form-control" value="{{ $assign->id }}" readonly>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label for="">Student</label>
                                    <input type="text" name="student_name" class="form-control" value="{{ $assign->student_name }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="">Tutors</label> <br>

                                    <select name="tutor_name"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="{{$assign->tutor_name}}">{{$assign->tutor_name}}</option>
                                        @foreach ($employessTutors as $tutor)
                                            <option value="{{$tutor->first_name.' '.$tutor->last_name}}">{{$tutor->first_name.' '.$tutor->last_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tutor_name')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror

                                    {{-- <select name="tutor_name"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        @foreach ($employessTutors as $tutor)
                                            <option value="{{$tutor->first_name.' '.$tutor->last_name}}">{{$tutor->first_name.' '.$tutor->last_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tutor_name')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror --}}


                                </div>
                                <div class="col-4">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject" class="form-control" value="{{ $assign->subject }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Assignment Tutor</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>