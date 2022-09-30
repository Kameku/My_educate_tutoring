<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <div class="col-9">
                    <h5 class="card-title mb-3 mt-3 text-white font-size-18">Student Attendance</h5>
                </div>
                <div class="col-3">
                    @can('UpdateStudentAttendance')
                    <a data-toggle="modal" data-target="#updateStudentAttendace" class="btn btn-light btn-sm d-flex justify-content-center">Update Student Attendance</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-5">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->student_name}}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Scheduled Date</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->date_created}}</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Scheduled Time</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->time}}</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">School Term</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->term}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Attendance</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->student_attendance}}</span>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Homework Completed?</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->homework_completed}}</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Lesson No</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->lesson}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Service Provision</h5>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Weekly Lesson</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->weekly_lesson}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Weekly Homework Assignment</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->homework_assignment}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Email to School Teacher</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->email_school}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>