<div class="row">
    <div class="col-7">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Student Information</h5>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-8">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->first_name.' '.$enrolments->last_name}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Age</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$age}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Home Phone</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->home_phone}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Date of Birth</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->date_of_birth}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-5">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Address</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->adress}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Suburb</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->suburb}}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Post Code</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->post_code}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Language Spoken at Home</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->language_home}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#enquiryStudenEdit">Edit Student Information</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Parent Information</h5>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Parent Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->parent_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">I Am</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->parent_iam}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Parent Mobile</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->parent_mobile}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Parent Address</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->parent_adress}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Parent Email</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->parent_email}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" data-toggle="modal" data-target="#enquiryParentEdit" class="btn btn-primary btn-block">Edit Parent Information</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">In Case of Emergency</h5>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->emergency_name}}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Relationship to Student</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->emergency_relation}}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Phone Number</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->emergency_mobile}}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Home Phone</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->emergency_phone}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" data-toggle="modal" data-target="#enrolmentEmergencyEdit" class="btn btn-primary btn-block">Edit Emergency Information</a>
                </div>
            </div>
        </div>
    </div>
</div>

