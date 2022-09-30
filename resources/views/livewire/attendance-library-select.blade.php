<div>
    <div class="row px-2 py-1">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <label for="">Subject</label>
                    <select name="subject_name" class="form-control" 
                        wire:model="selectedSubject"
                        required >
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name_sub}}</option>
                        @endforeach
                    </select>
                    @error('subject_name')
                        <span class="text-danger font-size-6">{{ $message }}</span>
                    @enderror
                </div>
            </div>  
            <div class="row mt-2">
                @if (!is_null($concepts))
                    <div class="col-12">
                        <label for="">Concept</label>
                        <select name="concept_name" class="form-control" 
                            wire:model="selectedConcept" required>
                            <option value="">Select Concept...</option>
                            @foreach ($concepts as $concept)
                            <option value="{{$concept->id}}">{{$concept->concept_name}}</option>
                            @endforeach
                        </select>
                        @error('concept_name')
                        <span class="text-danger font-size-6">{{ $message }}</span>
                        @enderror
                    </div> 
                @endif
            </div>  
        </div>
    </div>
    <div class="row px-2 py-1">
        <div class="col-12">
            <div class="row">
                @if (!is_null($conceptDetails))
                <div class="col-12">
                    <label for="">Concept Detail</label>
                    <select name="conceptDetail" id="conceptDetail" 
                        class="form-control"
                        wire:model="selectedConceptDetail">
                        <option value="">Select Concept Detail...</option>
                        @foreach ($conceptDetails as $conceptDetail)
                        <option value="{{$conceptDetail->id}}">{{$conceptDetail->concept_detail_name}}</option>
                        @endforeach
                    </select>
                    @error('conceptDetail')
                    <span class="text-danger font-size-6">{{ $message }}</span>
                    @enderror
                </div>
                @endif
            </div>
            <div class="row mt-2">
                @if (!is_null($learnings))
                <div class="col-12">
                    <label for="">Learning Activity</label>
                    <select name="learningActivity" id="learningActivity" class="form-control" 
                         wire:model="selectedlearningActivity">
                        <option value="">Select learning....</option>
                        @foreach ($learnings as $learning)
                        <option value="{{$learning->id}}">{{$learning->learning_name}}</option>
                        @endforeach
                    </select>
                    @error('learningActivity')
                    <span class="text-danger font-size-6">{{ $message }}</span>
                    @enderror
                </div>
                @endif
            </div>    
        </div>
    </div>
</div>
