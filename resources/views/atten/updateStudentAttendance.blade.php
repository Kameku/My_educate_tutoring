<form data-parsley-validate novalidate action="{{route('atten.update',['atten' => $atten->id])}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="updateStudentAttendace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Student Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mt-3">
                        <div class="col-2">
                            <label for="">Term</label>
                            <input type="text" name="term"  class="form-control" value="{{$atten->term}}">
                        </div>
                        <div class="col-2">
                            <label for="">Lesson</label>
                            <input type="text" name="lesson"  class="form-control" value="{{$atten->lesson}}">
                        </div>
                        <div class="col-4">
                            <label for="">Student Attendance</label>
                            <select name="student_attendance" class=" form-control" data-placeholder="Status ......">
                                {{-- <option value="" disabled selected>Select</option> --}}
                                <option {{ $atten->student_attendance == 'Attended Ontime' ? 'selected' : '' }}  value="Attended Ontime">Attended Ontime</option>
                                <option {{ $atten->student_attendance == 'Attended Tardy' ? 'selected' : '' }}  value="Attended Tardy">Attended Tardy</option>
                                <option {{ $atten->student_attendance == 'Cancelled - No Show' ? 'selected' : '' }}  value="Cancelled - No Show">Cancelled - No Show</option>
                                <option {{ $atten->student_attendance == 'Rescheduled' ? 'selected' : '' }}  value="Rescheduled">Rescheduled</option>
                                <option {{ $atten->student_attendance == 'N/A' ? 'selected' : '' }}  value="N/A">N/A</option>
                            </select>
                            @error('student_attendance')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Student Homework Completed?</label>
                            <select name="homework_completed" class=" form-control" data-placeholder="Status ......">
                                {{-- <option  value="" disabled selected>Select</option> --}}
                                <option {{ $atten->homework_completed == 'Yes' ? 'selected' : '' }}  value="Yes">Yes</option>
                                <option {{ $atten->homework_completed == 'No' ? 'selected' : '' }}  value="No">No</option>
                                <option {{ $atten->homework_completed == 'Not Returned' ? 'selected' : '' }}  value="Not Returned">Not Returned</option>
                                <option {{ $atten->homework_completed == 'N/A' ? 'selected' : '' }}  value="N/A">N/A</option>
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
                                {{-- <option  value="" disabled selected>Select</option> --}}
                                <option {{ $atten->weekly_lesson == 'Completed' ? 'selected' : '' }}  value="Completed">Completed</option>
                                <option {{ $atten->weekly_lesson == 'To Be Completed' ? 'selected' : '' }}  value="To Be Completed">To Be Completed</option>
                                <option {{ $atten->weekly_lesson == 'Cancelled' ? 'selected' : '' }}  value="Cancelled">Cancelled</option>
                                <option {{ $atten->weekly_lesson == 'N/A' ? 'selected' : '' }}  value="N/A">N/A</option>
                            </select>
                            @error('weekly_lesson')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Weekly Homework Assignment</label>
                            <select name="homework_assignment" class=" form-control" data-placeholder="Status ......">
                                {{-- <option value="" disabled selected>Select</option> --}}
                                <option {{ $atten->homework_assignment == 'Assigned' ? 'selected' : '' }}  value="Assigned">Assigned</option>
                                <option {{ $atten->homework_assignment == 'To Be Assigned' ? 'selected' : '' }}  value="To Be Assigned">To Be Assigned</option>
                                <option {{ $atten->homework_assignment == 'N/A' ? 'selected' : '' }}  value="N/A">N/A</option>
                            </select>
                            @error('homework_assignment')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="">Email to School Teacher</label>
                            <select name="email_school" class=" form-control" data-placeholder="Status ......">
                                {{-- <option value="" disabled selected>Select</option> --}}
                                <option {{ $atten->email_school == 'Introductory' ? 'selected' : '' }}  value="Introductory">Introductory</option>
                                <option {{ $atten->email_school == 'Followup' ? 'selected' : '' }}  value="Followup">Followup</option>
                                <option {{ $atten->email_school == 'N/A' ? 'selected' : '' }}  value="N/A">N/A</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Student Attendance</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>