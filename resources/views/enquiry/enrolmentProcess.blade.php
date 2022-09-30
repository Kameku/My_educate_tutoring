<div class="card-body">
    <div class="table-responsive">
        <table class="table table-nowrap table-centered mb-0">
            <thead>
                <tr role="row">
                    <th>Description</th>
                    <th>Finish Date</th>
                    <th>Responsible</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr id="itemEnrolmentProcess-1">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0">Enquiry Submitted</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0">{{$enquiry->created_at->isoFormat('Y-M-D')}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-1">{{$enquiry->ep1_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm disabled" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a> -->
                        <!-- <a href="#" class="btn btn-sm disabled" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep1_state'>
                            <input type="hidden" value="{{$today}}" name="ep1_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep1_state'>
                            <input type="hidden" value="{{$today}}" name="ep1_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr id="itemEnrolmentProcess-2" >
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Enquiry Confirmation Email</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->created_at->isoFormat('Y-M-D')}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">System</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-2">{{$enquiry->ep2_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep2_state'>
                            <input type="hidden" value="{{$today}}" name="ep2_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep2_state'>
                            <input type="hidden" value="{{$today}}" name="ep2_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-3" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Phone Discussion Regarding Enquiry</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep3_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Administrator</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-3">{{$enquiry->ep3_state}}</span>
                    </td>
                    <td>
                        {{-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a> --}}
                        {{-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> --}}
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep3_state'>
                            <input type="hidden" value="{{$today}}" name="ep3_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep3_state'>
                            <input type="hidden" value="{{$today}}" name="ep3_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-4" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Enrolment Form</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->created_at->isoFormat('Y-M-D')}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-4">{{$enquiry->ep4_state}}</span>
                    </td>
                    <td>
                        <form method="GET" class="float-left"  action="{{route('enrolment.create', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            <button type="submit" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Fill in the enrolment form manually"><i class="bx bx-mail-send font-size-30" ></i></button>
                        </form>
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep4_state'>
                            <input type="hidden" value="{{$today}}" name="ep4_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep4_state'>
                            <input type="hidden" value="{{$today}}" name="ep4_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-5" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Class Time Selection</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep5_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-5">{{$enquiry->ep5_state}}</span>
                    </td>
                    <td>
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep5_state'>
                            <input type="hidden" value="{{$today}}" name="ep5_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep5_state'>
                            <input type="hidden" value="{{$today}}" name="ep5_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-6" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Verify Enrolment Information</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep6_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Administrator</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-6">{{$enquiry->ep6_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep6_state'>
                            <input type="hidden" value="{{$today}}" name="ep6_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep6_state'>
                            <input type="hidden" value="{{$today}}" name="ep6_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-7" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Letter of Engagement / Induction Email</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep7_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">System</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-7">{{$enquiry->ep7_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep7_state'>
                            <input type="hidden" value="{{$today}}" name="ep7_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep7_state'>
                            <input type="hidden" value="{{$today}}" name="ep7_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-8" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Admin Terms Accepted</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep8_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-8">{{$enquiry->ep8_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep8_state'>
                            <input type="hidden" value="{{$today}}" name="ep8_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep8_state'>
                            <input type="hidden" value="{{$today}}" name="ep8_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-9" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Program Terms Accepted</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep9_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-9">{{$enquiry->ep9_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep9_state'>
                            <input type="hidden" value="{{$today}}" name="ep9_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep9_state'>
                            <input type="hidden" value="{{$today}}" name="ep9_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-10" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Financial Details Completed</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep10_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-10">{{$enquiry->ep10_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep10_state'>
                            <input type="hidden" value="{{$today}}" name="ep10_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep10_state'>
                            <input type="hidden" value="{{$today}}" name="ep10_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-11" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Housekeeping Terms Accepted</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep11_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-11">{{$enquiry->ep11_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep11_state'>
                            <input type="hidden" value="{{$today}}" name="ep11_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep11_state'>
                            <input type="hidden" value="{{$today}}" name="ep11_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-12" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Final Agreement Accepted</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep12_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Student/Parent</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-12">{{$enquiry->ep12_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep12_state'>
                            <input type="hidden" value="{{$today}}" name="ep12_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep12_state'>
                            <input type="hidden" value="{{$today}}" name="ep12_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-13" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Invoice Generation / Payment Setup</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep13_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">Administrator</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-13">{{$enquiry->ep13_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep13_state'>
                            <input type="hidden" value="{{$today}}" name="ep13_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep13_state'>
                            <input type="hidden" value="{{$today}}" name="ep13_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                <tr  id="itemEnrolmentProcess-14" class="">
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">Enrolment Process Complete!</h5>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0 ">{{$enquiry->ep14_date}}</h5>
                    </td>
                    <td> 
                        <h5 class="text-truncate font-size-14 m-0 ">System</h5>
                    </td>
                    <td>
                        <span class="badge badge-pill badge-soft-danger font-size-11 text-center" id="statusEnrolmentProcess-14">{{$enquiry->ep14_state}}</span>
                    </td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="Send the enrollment form"><i class="bx bx-mail-send font-size-30" ></i></a>
                        <a href="#" class="btn btn-sm text-primary" data-toggle="tooltip" data-placement="top" title="fill out the enrollment form manually"><i class="bx bx-food-menu font-size-30" ></i></a> -->
                        <form method="POST" class="float-left" id="complete" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Complete" name='ep14_state'>
                            <input type="hidden" value="{{$today}}" name="ep14_date">
                            <button type="submit" class="btn btn-sm text-success" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="bx bx-check-square font-size-30"></i></button>
                        </form>
                        <form method="POST" class="float-left" id="pending" action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="Pending" name='ep14_state'>
                            <input type="hidden" value="{{$today}}" name="ep14_date">
                            <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as Pending"><i class="bx bx-check-square font-size-30 "></i></button>
                        </form>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>


