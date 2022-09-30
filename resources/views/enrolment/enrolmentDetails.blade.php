<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">School Information</h5>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-8">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">School Attending</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->school}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Grade</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->grade}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-8">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Teacher Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->teacher_name}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Mobile Phone</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->teacher_mobile}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">I am happy for my child´s school teacher to contact or be contacted by Educate</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->teacher_contact}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" data-toggle="modal" data-target="#enrolmentDetailsEdit" class="btn btn-primary btn-block">Edit School Information</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Previous Interventions</h5>
            </div>
            <div class="card-body">
                <div class="row my-3 border-bottom border-primary">
                    <div class="col-9">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Has your child been assessed by school psychologist or equivalente?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e1}}</span>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="bg-white pb-1 ">
                            <a class="hideAtach" id="e1" href="{{URL::asset('reports/'.$enrolments->interventions_attachmen_e1)}}" target="_blank">
                                <i class='bx bxs-cloud-download font-size-30'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row my-3 border-bottom border-primary">
                    <div class="col-9">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Has your child been assessed by an optometrist or opthalmologist?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e2}}</span>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="bg-white pb-1 ">
                            <a class="hideAtach"  id="e2" href="{{URL::asset('reports/'.$enrolments->interventions_attachmen_e2)}}" target="_blank">
                                {{-- <span class="hideAtach">{{$enrolments->interventions_attachmen_e2}}</span>     --}}
                                <i class='bx bxs-cloud-download font-size-30'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-9">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Have you received any educational assistance prior to this time?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e3}}</span>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="bg-white pb-1 ">
                            <a class="hideAtach" id="e3" href="{{URL::asset('reports/'.$enrolments->interventions_attachmen_e3)}}" target="_blank">
                                {{-- <span class="hideAtach">{{$enrolments->interventions_attachmen_e3}}</span>     --}}
                                <i class='bx bxs-cloud-download font-size-30'></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- boton de editar  --}}
                <div class="mt-4">
                    <a href="#" data-toggle="modal" data-target="#enrolmentPrevius" class="btn btn-primary btn-block">Edit Previous Interventions</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Additional Information</h5>
            </div>
            <div class="card-body">
                
                {{-- seccion de intervencion sin archivos  --}}
                <div class="row my-3">
                    <div class="col-10">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Are there any legal issues regarding child custody that Educate Tutoring should be aware of?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e4}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3 pb-3 border-bottom border-primary">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class="text-dark font-size-15">{{$enrolments->interventions_details_e4}}</span>
                        </div>
                    </div>
                </div>
                {{-- END seccion de intervencion sin archivos  --}}

                {{-- seccion de intervencion sin archivos  --}}
                <div class="row my-3 pb-3 border-bottom border-primary">
                    <div class="col-10">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Do you give consent for you child to have their photo taken for internal purposes?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e5}}</span>
                        </div>
                    </div>
                </div>
                {{-- END seccion de intervencion sin archivos  --}}

                {{-- seccion de intervencion sin archivos  --}}
                <div class="row my-3 pb-3 border-bottom border-primary">
                    <div class="col-10">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Do you give consent for these images to be used for media related purposes?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e10}}</span>
                        </div>
                    </div>
                </div>
                {{-- END seccion de intervencion sin archivos  --}}
                
                {{-- seccion de intervencion sin archivos  --}}
                <div class="row my-3">
                    <div class="col-10">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Do your child have any allergies?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e6}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3 pb-3 border-bottom border-primary">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class="text-dark font-size-15">{{$enrolments->interventions_details_e6}}</span>
                        </div>
                    </div>
                </div>
                {{-- END seccion de intervencion sin archivos  --}}

                {{-- seccion de intervencion sin archivos  --}}
                <div class="row my-3 pb-3 border-bottom border-primary">
                    <div class="col-10">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Do you give consent for your child to be given occasional chocolate/sweets?</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="bg-white pb-1 ">
                            <span class="text-dark font-size-15 capita">{{$enrolments->interventions_e7}}</span>
                        </div>
                    </div>
                </div>
                {{-- END seccion de intervencion sin archivos  --}}

                {{-- boton de editar  --}}
                <div class="mt-4">
                    <a href="#" data-toggle="modal" data-target="#enrolmentAdditional" class="btn btn-primary btn-block">Edit Additional Information</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Information Validation</h5>
            </div>
            <div class="card-body">
                <div class="row bg-primary py-2 rounded">
                    <div class="col-12">
                        <div class="  rounded mb-1">
                            <span class=" text-white">Payment</span>
                        </div>
                        <div class=" border-bottom border-primary pb-1 ">
                            <span class="text-white font-size-15">{{$enrolments->payment}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-8">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Where did you hear about Educate Tutoring?</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->about}}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Terms & Conditions</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->terms}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Additional Form Notes</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$enrolments->notes}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
