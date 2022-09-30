<form data-parsley-validate novalidate action="{{route('atten.store')}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="attenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Booking - Student Attendance</h5>
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
                                    <label for="">Date Created</label>
                                    <input type="text" class="form-control" name="date_created" value="{{ $today }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="">Time</label>
                                    <input type="text" name="time" class="form-control" value="{{ $hour }}" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="">Term</label>
                                    <input type="text" name="term" class="form-control" value="{{ $term }}" readonly>
                                    {{-- <select name="term" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="0">0 - N/A</option>
                                        <option  value="1">1</option>
                                        <option  value="2">2</option>
                                        <option  value="3">3</option>
                                        <option  value="4">4</option>
                                    </select> --}}
                                    @error('term')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-2">
                                    <label for="">Lesson</label>
                                    <select name="lesson" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="0">N/A</option>
                                        <option  value="1">1</option>
                                        <option  value="2">2</option>
                                        <option  value="3">3</option>
                                        <option  value="4">4</option>
                                        <option  value="5">5</option>
                                        <option  value="6">6</option>
                                        <option  value="7">7</option>
                                        <option  value="8">8</option>
                                        <option  value="9">9</option>
                                        <option  value="10">10</option>
                                    </select>
                                    @error('lesson')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="">Student Name</label>
                                    {{-- <select name="term" class=" form-control" data-placeholder="Status ......"> --}}
                                    <select name="student_name" class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select Student</option>
                                        @foreach ($students as $student)
                                        <option value="{{$student->student_name}}">{{$student->student_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('student_name')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                                <div class="col-6">
                                    <label for="">Tutor</label>
                                    <input type="text" class="form-control" name="tutor_name" value="{{Auth::user()->name.' '.Auth::user()->last_name}}" readonly>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <label for="">Subjects</label>
                                    <select name="subject_name[]" class="js-custom-select" multiple data-hs-select2-options required>
                                        <option value="" disabled selected>Select Subject</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{$subject->name_sub}}">{{$subject->name_sub}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="">Student Attendance</label>
                                    <select name="student_attendance" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="Attended Ontime">Attended Ontime</option>
                                        <option  value="Attended Tardy">Attended Tardy</option>
                                        <option  value="Cancelled - No Show">Cancelled - No Show</option>
                                        <option  value="Rescheduled">Rescheduled</option>
                                        <option  value="N/A">N/A</option>
                                    </select>
                                    @error('student_attendance')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="">Student Homework Completed?</label>
                                    <select name="homework_completed" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="Yes">Yes</option>
                                        <option  value="No">No</option>
                                        <option  value="Not Returned">Not Returned</option>
                                        <option  value="N/A">N/A</option>
                                    </select>
                                    @error('homework_completed')
                                    <span class="text-danger font-size-6">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="row bg-primary px-2 py-2 rounded mt-3">
                                <span class="text-white">Service Provision</span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="">Weekly Lesson</label>
                                    <select name="weekly_lesson" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="Completed">Completed</option>
                                        <option  value="To Be Completed">To Be Completed</option>
                                        <option  value="Cancelled">Cancelled</option>
                                        <option  value="N/A">N/A</option>
                                    </select>
                                    @error('weekly_lesson')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Weekly Homework Assignment</label>
                                    <select name="homework_assignment" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="Assigned">Assigned</option>
                                        <option  value="To Be Assigned">To Be Assigned</option>
                                        <option  value="N/A">N/A</option>
                                    </select>
                                    @error('homework_assignment')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Email to School Teacher</label>
                                    <select name="email_school" class=" form-control" data-placeholder="Status ......">
                                        <option value="" disabled selected>Select</option>
                                        <option  value="Introductory">Introductory</option>
                                        <option  value="Followup">Followup</option>
                                        <option  value="N/A">N/A</option>
                                    </select>
                                    @error('email_school')
                                        <span class="text-danger font-size-6">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Attendances</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>