<form action="{{route('student.store')}}" method="POST">
    @csrf
    <input type="hidden" name="name_student" value="{{ $enrolment->first_name.' '.$enrolment->last_name }}" readonly> 
    <input type="hidden" name="last_name" value="{{ $enrolment->last_name }}" readonly> 
    <input type="hidden" name="enrolment_id" value="{{$enrolment->id}}" readonly>
    <input type="hidden" name="email" value="{{$enrolment->parent_email}}" readonly>
    <button type="submit" class="btn btn-sm btn-block btn-primary">Activate Student</button>
</form>