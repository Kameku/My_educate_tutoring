<form data-parsley-validate novalidate action="{{ route('preenrollment.commentsStore') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="commentsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    {{-- <label for="">Creator</label> --}}
                                    <input type="hidden"  class="form-control" name="user_id" value="{{ Auth::user()->id }}" readonly>
                                    <input type="hidden" name="preenrolment_id" value="{{ $preenrolment->id }}">
                                </div>
                            </div>    
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Comment</label>
                                    <textarea name="comment" id=""  class="form-control" placeholder="Write your comment"
                                    x-data
                                    x-init="
                                        ClassicEditor
                                            .create( $refs.comment,{    
                                                toolbar: [ 'bold', 'italic', 'undo', 'redo', 'numberedList', 'bulletedList' ]
                                            }
                                            )
                                            
                                            .catch( error => {
                                                console.error( error );
                                            } );" 
                                            x-ref="comment"
                                            ></textarea>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Comment</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>