<div class="row mt-3">
    <div class="col-12">
        <div class="card border shadow">
            {{-- <div class="card-header bg-primary rounded-top">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Comments - Parent</h5>
            </div> --}}
            <div class="card-header bg-info rounded-top">
                    <div class="col-9">
                        <h5 class="card-title mb-3 mt-3 font-size-18 text-white">Attendance Notes</h5>
                    </div>
                    <div class="col-3">
                        @can('AttendanceNotesCreate')
                        <a class="btn btn-sm btn-light d-flex justify-content-center align-middle" data-toggle="modal" data-target="#notesAttendance"><i class='bx bx-plus-medical mr-1 mt-1'></i>Add Note</a>
                        @endcan
                    </div>
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-12 m-0">
                        @if ($atten->notesAttendance == '')
                            <div class="alert alert-info m-0">
                                There are no notes available
                            </div>
                        @else
                            <div class="bg-white pb-1 ">
                                <span class="text-dark font-size-15">{!! $atten->notesAttendance !!}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form data-parsley-validate novalidate action="{{route('atten.update',['atten' => $atten->id])}}" method="POST" enctype="multipart/form-data">
    <div class="modal fade "  id="notesAttendance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-info p-3 rounded shadow-primary">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Attendance Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Tutor</label>
                                    <input type="text"  class="form-control" value="{{$atten->tutor_name}}" readonly>
                                </div>
                            </div>    
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Notes</label>
                                    <textarea name="notesAttendance" id=""  class="form-control" cols="30" rows="10" placeholder="Write your notes"
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
                                            >{{$atten->notesAttendance}}</textarea>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Create Note</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>