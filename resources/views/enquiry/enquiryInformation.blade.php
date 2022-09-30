<div class="row">
    <div class="col-7">
        <div class="card-body bg-tramaSecond border shadow rounded">
            <div class="card-header bg-primary rounded">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Student Information</h5>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">First Name</p>
                <h6 class="font-size-16">{{$enquiry->first_name}}</h6>
            </div>

            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Last Name</p>
                <h6 class="font-size-16">{{$enquiry->last_name}}</h6>
            </div>

            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Home Phone</p>
                <h6 class="font-size-16">{{$enquiry->home_phone}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Address</p>
                <h6 class="font-size-16">{{$enquiry->adress}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Suburb</p>
                <h6 class="font-size-16">{{$enquiry->suburb}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Post Code</p>
                <h6 class="font-size-16">{{$enquiry->post_code}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Date of Birth</p>
                <h6 class="font-size-16">{{$enquiry->date_of_birth}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Language Spoken at Home</p>
                <h6 class="font-size-16">{{$enquiry->language_home}}</h6>
            </div>
            <div class="mt-4">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#enquiryStudenEdit">Edit Student Information</a>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card-body bg-tramaSecond border shadow rounded">
            <div class="card-header bg-primary rounded">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Parent Information</h5>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Parent Name</p>
                <h6 class="font-size-16">{{$enquiry->parent_name}}</h6>
            </div>

            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Mobile Phone</p>
                <h6 class="font-size-16">{{$enquiry->parent_mobile}}</h6>
            </div>

            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Email</p>
                <h6 class="font-size-16">{{$enquiry->parent_email}}</h6>
            </div>
            <div class="mt-3">
                <p class="font-size-12 text-muted mb-1">Address</p>
                <h6 class="font-size-16">{{$enquiry->parent_adress}}</h6>
            </div>
            <div class="mt-4">
                <a href="#" data-toggle="modal" data-target="#enquiryParentEdit" class="btn btn-primary">Edit Parent Information</a>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card-body bg-tramaSecond border shadow rounded">
            <div class="card-header bg-primary rounded">
                <h5 class="card-title mb-3 mt-3 text-white font-size-18">Questions</h5>
            </div>
            <div class="mt-4">
                <h6 class="font-size-16">{{$enquiry->questions}}</h6>
            </div>
        </div>
    </div>
</div>