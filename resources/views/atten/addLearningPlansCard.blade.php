<div class="row mt-3">
    <div class="col-12">
        <div class="card border shadow">
            <div class="card-header bg-primary rounded-top">
                <div class="col-9">
                    <h5 class="card-title mb-3 mt-3 text-white font-size-18">Lesson Component</h5>
                </div>
                <div class="col-3">
                    @can('AddLessonComponent')
                    <a data-toggle="modal" data-target="#addLearningPlansModal" class="btn btn-sm btn-light d-flex justify-content-center"><i class='bx bx-plus-medical mr-1 mt-1'></i>Add Lesson Component</a>
                    @endcan 
                </div>
            </div>
            <div class="card-body">
                @foreach ($addLearningPlans as $learningPlan) 

                    <div class=" mt-4 border border-primary p-4 rounded">
                        <div class="font-size-18">
                            <span >Lesson Component</span>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class=" bg-white rounded mb-1">
                                    <span class=" text-primary">Subject</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1 ">
                                    @if ($learningPlan->subject_name)
                                        <span class="text-dark mt-2 font-size-15">{{ $learningPlan->subject_name }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=" bg-white rounded mb-1">
                                    <span class=" text-primary">Concept</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1 ">
                                    @if ($learningPlan->concept_name)
                                        <span class="text-dark mt-2 font-size-15">{{ $learningPlan->concept_name }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <div class=" bg-white rounded mb-1">
                                    <span class=" text-primary">Concept Detail</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1 ">
                                    @if ($learningPlan->conceptDetail)
                                        <span class="text-dark mt-2 font-size-15">{{ $learningPlan->conceptDetail }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=" bg-white rounded mb-1">
                                    <span class=" text-primary">Learning Activity</span>
                                </div>
                                <div class="bg-white border-bottom border-primary pb-1 ">
                                    @if ($learningPlan->learningActivity)
                                        <span class="text-dark mt-2 font-size-15">{{ $learningPlan->learningActivity }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 ">
                            <div class="col-auto mr-auto"></div>
                            {{-- <a href="#" class="btn btn-sm btn-primary" ><i class='bx bxs-edit'></i></a> --}}
                            <div class="col-auto align-self-end">
                                <form action="{{route('atten.addLearning.destroy', ['atten' => $learningPlan->id])}}" method="POST">
                                    @method('DELETE') 
                                    @csrf 
                                    <button class="btn btn-sm btn-danger" type="submit"><i class='bx bxs-trash'></i></button>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>