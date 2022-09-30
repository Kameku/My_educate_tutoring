{{-- <div class="row">
    <div class="col-6">
        @if (Auth::user()->roles->first()->name === 'parent') 
        @else
        <button class="btn btn-lg btn-secondary btn-block px-8 mr-3" data-toggle="modal" data-target="#commentsModal">Create Comment - Parent</button>
        @endif
    </div>
</div> --}}
<div class="row mt-3">
    <div class="col-12">
        <div class="card border shadow">
            {{-- <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Comments - Parent</h5>
            </div> --}}
            <div class="card-header bg-primary rounded-top">
                    <div class="col-9">
                        <h5 class="card-title mb-3 mt-3 font-size-18 text-white">Comments Parent</h5>
                    </div>
                    <div class="col-3">
                        @if (Auth::user()->roles->first()->name === 'parent') 
                        @else
                        <a class="btn btn-sm btn-light d-flex justify-content-center align-middle" data-toggle="modal" data-target="#commentsModal"><i class='bx bx-plus-medical mr-1 mt-1'></i>Add Comment - Parent</a>
                        {{-- <a data-toggle="modal" data-target="#addLearningPlansModal" class="btn btn-sm btn-light"><i class='bx bx-plus-medical mr-1'></i>Add Lesson Component</a> --}}
                        @endif
                    </div>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-12">
                        <div class=" bg-white rounded mb-1">
                            <span class=" text-primary">Comments</span>
                        </div>
                        <div class="bg-white border-bottom border-primary pb-1 ">
                            <span class="text-dark font-size-15">{!! $atten->comment !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>