    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-nowrap table-centered mb-0">
                            <tbody class="border-none">
                                <tr>
                                    <th>Priority</th>
                                    <th>From</th>
                                    <th>Title</th>
                                    <th>Progress</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($mytasks as $task)
                                <tr>
                                    <td>
                                        @if ( $task->priority === 'Low' )
                                            <span class="badge badge-info py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'Medium' )
                                            <span class="badge badge-warning py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                        @if ( $task->priority === 'High' )
                                            <span class="badge badge-danger py-1 px-3 ">{{$task->priority}}</span>
                                        @endif
                                    </td>
                                    <td>{{$task->from}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>
                                        @if ($task->status < 50)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status > 50 && $task->status < 100 )
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($task->status == 100)
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{$task->status}}%" aria-valuenow="100" aria-valuemin="2" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm float-left" data-toggle="modal" data-target="#modal{{$task->id}}"><i class='bx bxs-check-circle font-size-25 text-success'></i></button>
                                    </td>
                                </tr>
                                @include('tasks.taskViewModal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>     
        </div>
    </div>
    
