<form data-parsley-validate novalidate action="{{route('preenrollment.edit', $preenrolment)}}" method="POST">
    <div class="modal fade "  id="preenrolmentModalEdit{{ $preenrolment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 title-form p-2">
                            <h2>Student Information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="first_name" value="{{ $preenrolment->first_name}}" class="form-control" placeholder="Student first name" required>
                        </div>
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="last_name" value="{{ $preenrolment->last_name}}"  class="form-control" placeholder="Student last name" required >
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" name="school_year" value="{{ $preenrolment->school_year}}"  class="form-control" placeholder="School Year" required>
                        </div>
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" name="school_name" value="{{ $preenrolment->school_name}}"  class="form-control" placeholder="School Name" required>
                        </div>
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" value="{{ $preenrolment->date_of_birth}}"  name="date_of_birth" class="form-control " placeholder="Date of Birth" required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-12 title-form p-2 mt-5" >
                            <h2>Parent/Guardian information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-2">
                            <input type="text" name="parent_name" value="{{ $preenrolment->parent_name}}"  class="form-control" placeholder="Parent/Guardian Full Name" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="parent_mobile" value="{{ $preenrolment->parent_mobile}}"  class="form-control" placeholder="Mobile Phone" required>
                        </div>
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="email" name="parent_email" value="{{ $preenrolment->parent_email}}"  class="form-control" placeholder="Email" required>
                        </div>
                        {{-- <div class="col-12 col-sm-6">
                            <input type="text" name="parent_adress" value="{{ old('parent_adress')}}"  class="form-control" placeholder="Address">
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2 ">
                            <textarea name="questions" id="" class="form-control" cols="5" rows="5" placeholder="Questions?">{{$preenrolment->questions}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

