
    <div class="modal fade "  id="dtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Attendance And Learning Plans</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-sm-12">
                        <table id="datatable-buttons" 
                        class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" 
                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" 
                        role="grid" 
                        aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>Student Name</th>
                                    <th>School Term</th>
                                    <th>Lesson No</th>
                                    <th>Scheduled Date</th>
                                    <th>Scheduled Time</th>
                                    <th>Student Attendance</th>
                                    <th>Student Homework Complted?</th>
                                    <th>Weekly Lesson</th>
                                    <th>Weekly Homework Assignment</th>
                                    <th>Email to School Teacher</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>{{ $atten->student_name }}</td>
                                    <td>{{$atten->term}}</td>   
                                    <td>{{$atten->lesson}}</td>   
                                    <td>{{$atten->date_created}}</td>   
                                    <td>{{$atten->time}}</td>   
                                    <td>{{$atten->student_attendance}}</td>   
                                    <td>{{$atten->homework_completed}}</td>   
                                    <td>{{$atten->weekly_lesson}}</td>   
                                    <td>{{$atten->homework_assignment}}</td>   
                                    <td>{{$atten->email_school}}</td>   
                                </tr>
                             
                            </tbody>
                        </table>
                    </div> 
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
