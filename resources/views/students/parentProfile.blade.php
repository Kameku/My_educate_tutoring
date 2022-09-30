<div class="col-4">
    <div class="card text-center py-4">
        <div class="card-body">
            <img src="https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name={{$enrolmentForParent->first_name ." ". $enrolmentForParent->last_name}}" alt="" class="rounded-circle img-responsive mt-2" width="128" height="128"> 
            <h4 class="mb-0 mt-2">{{$enrolmentForParent->parent_name}}</h4>
            <p class="text-muted font-14 capita">Parent</p>
            <div class="text-left mt-3">
                
                <div class=" bg-white rounded mt-1">
                    <span class=" text-primary">Mobile</span>
                </div>
                <div class="bg-white border-bottom border-primary pb-1 ">
                    <span class="text-dark font-size-15">{{$enrolmentForParent->parent_mobile}}</span>
                </div>

                <div class=" bg-white rounded mt-1">
                    <span class=" text-primary">Email</span>
                </div>
                <div class="bg-white border-bottom border-primary pb-1 ">
                    <span class="text-dark font-size-15">{{$enrolmentForParent->parent_email}}</span>
                </div>

                <div class=" bg-white rounded mt-1">
                    <span class=" text-primary">Address</span>
                </div>
                <div class="bg-white border-bottom border-primary pb-1 ">
                    <span class="text-dark font-size-15">{{$enrolmentForParent->parent_adress}}</span>
                </div>
            </div>
        </div> <!-- end card-body -->
    </div>
</div>
<div class="col-8">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Student Information</h4>
            <p class="card-title-desc">In this section you can view all the information of the student enrollment</p>
            <div id="accordion">
                <div class="card mb-1 shadow-none">
                    <a href="#collapseFour" class="text-white collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card-header bg-primary text-white" id="headingOne">
                            <i class='bx bx-user align-middle font-size-25'></i><span class="align-middle font-size-15">Student Information</span> 
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-8">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Student Name</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->first_name.' '.$enrolmentForParent->last_name}}</span>
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
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->home_phone}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Date of Birth</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->date_of_birth}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-5">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Address</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->adress}}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Suburb</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->suburb}}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Post Code</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->post_code}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Language Spoken at Home</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->language_home}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-1 shadow-none">
                    <a href="#collapseOne" class="text-white collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card-header bg-primary text-white" id="headingOne">
                            <i class='bx bx-user align-middle font-size-25'></i><span class="align-middle font-size-15">In Case of Emergency</span> 
                        </div>
                    </a>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-3">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Name</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->emergency_name}}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Relationship to Student</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->emergency_relation}}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Phone Number</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->emergency_mobile}}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Home Phone</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->emergency_phone}}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card mb-1 shadow-none">
                    <a href="#collapseTwo" class="text-white collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card-header bg-primary text-white" id="headingOne">
                            <i class='bx bx-file align-middle font-size-25'></i><span class="align-middle font-size-15">School Information</span> 
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row my-3">
                                <div class="col-8">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">School Attending</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->school}}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Grade</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->grade}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-8">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Teacher Name</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->teacher_name}}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">Mobile Phone</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15">{{$enrolmentForParent->teacher_mobile}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12">
                                    <div class=" bg-white rounded mb-1">
                                        <span class=" text-primary">I am happy for my child´s school teacher to contact or be contacted by Educate</span>
                                    </div>
                                    <div class="bg-white border-bottom border-primary pb-1 ">
                                        <span class="text-dark font-size-15 capita">{{$enrolmentForParent->teacher_contact}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-0 shadow-none">
                    <a href="#collapseThree" class="text-white collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                        <div class="card-header bg-primary text-white" id="headingOne">
                            <i class='bx bx-money align-middle font-size-25'></i><span class="align-middle font-size-15">Payment</span> 
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row bg-primary py-2 rounded">
                                <div class="col-12">
                                    <div class="  rounded mb-1">
                                        <span class=" text-white">Payment</span>
                                    </div>
                                    <div class=" border-bottom border-primary pb-1 ">
                                        <span class="text-white font-size-15">{{$enrolmentForParent->payment}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <span>Log In Details - Student</span>
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-6">
                    <div class=" bg-white rounded mb-1">
                        <span class=" text-primary">Login Email</span>
                    </div>
                    <div class="bg-white border-bottom border-primary pb-1 ">
                        <span class="text-dark font-size-15">{{$user->code_id}}@myeducatetutoring.com </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" bg-white rounded mb-1">
                        <span class=" text-primary">Login Password</span>
                    </div>
                    <div class="bg-white border-bottom border-primary pb-1 ">
                        <span class="text-dark font-size-15">{{$user->code_id}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <span>Log In Details - Parent</span>
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-6">
                    <div class=" bg-white rounded mb-1">
                        <span class=" text-primary">Login Email</span>
                    </div>
                    <div class="bg-white border-bottom border-primary pb-1 ">
                        <span class="text-dark font-size-15">{{$enrolmentForParent->parent_email}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" bg-white rounded mb-1">
                        <span class=" text-primary">Login Password</span>
                    </div>
                    <div class="bg-white border-bottom border-primary pb-1 ">
                        <span class="text-dark font-size-15">{{$user->code_id}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>