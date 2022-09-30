<form data-parsley-validate novalidate action="{{route('tasks.store')}}" method="POST">
    <div class="modal fade "  id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Created Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    
                                    <label for="">Priority</label>
                                        {!!Form::select('priority', ['Low' => 'Low', 'Medium' => 'Medium', 'High' => 'High'], null, ['class' => 'js-custom-select','placeholder' => 'Select ...'])!!}
                                    @error('priority')
                                        <span class="text-danger" style="font-size: 10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-9">
                                    <label for="">Title</label>
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    @error('title')
                                        <span class="text-danger "style="font-size: 10px;">{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Content</label>
                                    {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Describe the task']) !!}
                                    @error('content')
                                        <span class="text-danger "style="font-size: 10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <label for="">Group</label>
                                    {!!Form::select('group', ['General' => 'General', 'Student' => 'Student', 'Employee' => 'Employee', 'Financial' => 'Financial' ], null, ['class' => 'js-custom-select','placeholder' => 'Select ...'])!!}
                                    @error('group')
                                        <span class="text-danger " style="font-size: 10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <label for="">Asign To</label>
                                    {{-- <select name="sing_to"  class="js-custom-select" data-hs-select2-options required>
                                        <option value="" disabled selected>Select ...</option>
                                        <option value="{{Auth::user()->id}}">Myself</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name.' '.$employee->last_name}}</option>
                                        @endforeach
                                    </select> --}}
                                    {!! Form::select('sing_to', $employees, null, ['class' => 'js-custom-select','placeholder' => 'Select ...']) !!}
                                    @error('sing_to')
                                        <span class="text-danger "style="font-size: 10px;">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <div class="col-4">
                                    <label for="">Due Date</label>
                                    <input name="due_date" type="text" data-provide="datepicker" data-date-format="dd-mm-yyyy" class="form-control" id="inputAddress2"
                                    placeholder="Due Date" value="{{old('due_date')}}">
                                    @error('due_date')
                                        <span class="text-danger "style="font-size: 10px;">{{ $message }}</span>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <input type="hidden" name="status" class="form-control" value="10" readonly>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>