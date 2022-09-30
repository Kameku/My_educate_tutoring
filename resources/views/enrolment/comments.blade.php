<div class="row">
    <div class="col-auto mr-auto"></div>
    <div class="col-auto">
        <button class="btn btn-primary" data-toggle="modal" data-target="#createComments">Create Comments</button>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary rounded text-white">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Questions</h5> 
            </div>
            <div class="cardo-body p-4">
                <span class="justify"> 
                    @if (!empty($enquiry->questions))
                        <p class="font-size-15 text-justify mt-3"> {{ $enquiry->questions }}</p>
                    @else
                        <p class="font-size-15 text-center mt-3"> ¡ There are no questions available !</p>
                    @endif    
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Comments</h5>
            </div>
            <div class="card-body">
                @if (!empty($comentEmpty))
                    <ul class="inbox-wid list-unstyled">
                        @foreach ($comments as $comment)
                            <li class="inbox-list-item my-3 px-3 py-3 bg-light rounded shadow-sm">
                                <div class="media">
                                    {{-- <div class="mr-3 align-self-center">
                                        @if (strpos($comment->users_avatar, 'users') !== false )
                                            <img src="{{ URL::asset('images/'.$comment->users_avatar) }}" alt="" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{$comment->users_avatar}}" alt="" class="avatar-sm rounded-circle"> 
                                        @endif  
                                    </div> --}}
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-16 mb-1">{{$comment->creator}}</h5>
                                        <p class="">{{$comment->comment}}</p>
                                    </div>
                                    <div class="font-size-12 ml-2">
                                        {{$comment->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="font-size-15 text-center mt-3"> ¡ There are no comments available !</p>
                @endif
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{-- {{ $comments->links() }} --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- Modal Create Comments-->
    <form data-parsley-validate novalidate action="{{ route('enrolment.commentStore', ['enrolment' => $enrolments->id]) }}"
            method="POST">
            <div class="modal fade " id="createComments" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg  ">
                    <div class="modal-content border-primary p-3 rounded shadow-primary">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Create Comments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="enrolment_id" value="{{$enrolments->id}}">
                            <input type="hidden" name="users_avatar" value="{{Auth::user()->avatar}}">
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <label for="">Description</label>
                                    <select name="description" class="js-custom-select" data-hs-select2-options='{
                                        "placeholder": "Select Option"
                                         }' required>
                                         <option value="" selected disabled>Select Option</option>
                                         <option value="Enquiry Submitted">Enquiry Submitted</option>
                                         <option value="Enquiry Confirmation Email">Enquiry Confirmation Email</option>
                                         <option value="Phone Discussion Regarding Enquiry">Phone Discussion Regarding Enquiry</option>
                                         <option value="Enrolment Form">Enrolment Form</option>
                                         <option value="Class Time Selection">Class Time Selection</option>
                                         <option value="Verify Enrolment Information">Verify Enrolment Information</option>
                                         <option value="Letter of Engagement / Induction Email">Letter of Engagement / Induction Email</option>
                                         <option value="Admin Terms Accepted">Admin Terms Accepted</option>
                                         <option value="Program Terms Accepted">Program Terms Accepted</option>
                                         <option value="Financial Details Completed">Financial Details Completed</option>
                                         <option value="Housekeeping Terms Accepted">Housekeeping Terms Accepted</option>
                                         <option value="Final Agreement Accepted">Final Agreement Accepted</option>
                                         <option value="Invoice Generation / Payment Setup">Invoice Generation / Payment Setup</option>
                                         <option value="Enrolment Process Complete!">Enrolment Process Complete!</option>
                                         <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <label for="">Creator</label>
                                    <input type="text" name="creator" class="form-control mb-3"
                                        value="{{ Auth::user()->name }}" readonly >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <textarea rows="5" class="form-control"
                                        name="comment" maxlength="700"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Comments</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
<!-- Modal Create Comments END-->