
<div class="row mt-3">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <div class="col-9">
                    <h5 class="card-title mb-3 mt-3 text-white font-size-18">Learning Plan</h5>
                </div>
                <div class="col-3">
                    @can('CompleteLearningPlan')
                    <a class="btn btn-sm btn-light d-flex justify-content-center" data-toggle="modal" data-target="#learningPlanModal"><i class='bx bx-plus-medical mr-1 mt-1'></i>Complete Learning Plan</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Name</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->student_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Subject</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark mt-2 font-size-15">{{ $atten->subject_name }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Concept</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark mt-2 font-size-15">{{ $atten->concept_name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Concept Detail</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark mt-2 font-size-15">{{ $atten->conceptDetail }}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Learning Activity</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark mt-2 font-size-15">{{ $atten->learningActivity }}</span>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Tutor Evaluation</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->tutor_evaluation}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Student Self</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{{$atten->student_self}}</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
