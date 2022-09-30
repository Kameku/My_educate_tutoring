{{-- <form data-parsley-validate novalidate action="{{route('tasks.update', ['task' => $task->id])}}" method="POST"> --}}
    {!! Form::model($task, ['route' => ['tasks.update', $task], 'autocomplete' => 'off', 'method' => 'put']) !!}
    <div class="modal fade "  id="modal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row px-2 py-1">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    
                                    <label for="">Priority</label>
                                    <br>
                                    @if ( $task->priority === 'Low' )
                                    <span class="badge badge-info py-1 px-3 ">{{$task->priority}}</span>
                                    @endif
                                    @if ( $task->priority === 'Medium' )
                                        <span class="badge badge-warning py-1 px-3 ">{{$task->priority}}</span>
                                    @endif
                                    @if ( $task->priority === 'High' )
                                        <span class="badge badge-danger py-1 px-3 ">{{$task->priority}}</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label for="">Title</label>
                                    <br>
                                    <span class="text-primary">{{$task->title}}</span>
                                </div>
                                <div class="col-4">
                                    <label for="">Status {{ $task->status.'%' }}</label>
                                    <br>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Content</label>
                                    <p class="text-primary">{{$task->content}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <label for="">Group</label>
                                    <br>
                                    <span class="text-primary">{{$task->group}}</span>
                                </div>
                                <div class="col-3">
                                    <label for="">From</label>
                                    <br>
                                    <span class="text-primary">{{$task->from}}</span>
                                </div>
                                <div class="col-3">
                                    <label for="">Sign To</label>
                                    <br>
                                    <span class="text-primary">{{$task->sing_to}}</span>
                                </div>
                                <div class="col-3">
                                    <label for="">Due Date</label>
                                    <br>
                                    <span class="text-primary">{{$task->due_date}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 border border-primary px-4 py-4 rounded bg-dark" >
                                    <label for="" class="text-white">Update Status</label>
                                    <br>
                                    <input type="range" class="form-control-range" name="status" value="{{$task->status}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update status</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}