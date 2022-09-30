<form data-parsley-validate novalidate action="{{route('preenrollment.store')}}" method="POST">
    <div class="modal fade "  id="preenrolmentModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Create Enquiry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    {{-- @method('put') --}}
                    <div class="row">
                        <div class="col-12 title-form p-2">
                            <h2>Student Information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="first_name"  class="form-control" placeholder="Student first name" required>
                            @error('first_name')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                                    
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="last_name"  class="form-control" placeholder="Student last name" required >
                            @error('last_name')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" name="school_year"   class="form-control" placeholder="School Year" required>
                            @error('school_year')
                                <span class="text-danger font-size-6">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" name="school_name"   class="form-control" placeholder="School Name" required>
                            @error('school_name')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-12 col-sm-4 mb-2">
                            <input type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy"  name="date_of_birth" class="form-control " placeholder="Date of Birth" required>
                            @error('date_of_birth')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-12 title-form p-2 mt-5" >
                            <h2>Parent/Guardian information</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-2">
                            <input type="text" name="parent_name"  class="form-control" placeholder="Parent/Guardian Full Name" required>
                            @error('parent_name')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="text" name="parent_mobile"   class="form-control" placeholder="Mobile Phone" required>
                            @error('parent_mobile')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-12 col-sm-6 mb-2">
                            <input type="email" name="parent_email"   class="form-control" placeholder="Email" required>
                            @error('parent_email')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                        {{-- <div class="col-12 col-sm-6">
                            <input type="text" name="parent_adress" value="{{ old('parent_adress')}}"  class="form-control" placeholder="Address">
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2 ">
                            <textarea name="questions" id="" class="form-control" cols="5" rows="5" placeholder="Questions?"></textarea>
                            @error('questions')
                            <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

