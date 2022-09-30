<div class="mt-4 d-flex justify-content-end ">
    <a href="#" class="btn btn-primary px-4" data-toggle="modal" data-target="#enquiryComments">Create Note</a>
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
                        @foreach ($commentsEnquiry as $comment)
                            <li class="inbox-list-item my-3 px-3 py-3 bg-light rounded shadow-sm">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-16 mb-1">{{$comment->creator}}</h5>
                                        <p class="">{!!$comment->comment!!}</p>
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
                        {{-- {{ $commentsEnquiry->links() }} --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>




<!-- Modal Create Comments-->
<form data-parsley-validate novalidate action="{{ route('enquiry.commentStore', ['enquiry' => $enquiry->id]) }}"
    method="POST">
    <div class="modal fade " id="enquiryComments" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                    <input type="hidden" name="enquiry_id" value="{{$enquiry->id}}">
                    <input type="hidden" name="users_avatar" value="{{Auth::user()->avatar}}">
                    <div class="row">
                        <div class="col-6 col-sm-6">
                            <label for="">Creator</label>
                            <input type="text" name="creator" class="form-control mb-3"
                                value="{{ Auth::user()->name }}" readonly >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            {{-- <textarea rows="5" class="form-control"
                                name="comment" maxlength="700"></textarea> --}}
                            <textarea name="comment" id=""  class="form-control" cols="30" rows="10" placeholder="Write your comment"
                                x-data
                                x-init="
                                    ClassicEditor
                                        .create( $refs.private,{    
                                            toolbar: [ 'bold', 'italic', 'undo', 'redo', 'numberedList', 'bulletedList' ]
                                        }
                                        )
                                        
                                        .catch( error => {
                                            console.error( error );
                                        } );" 
                                        x-ref="private"
                                        ></textarea>
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