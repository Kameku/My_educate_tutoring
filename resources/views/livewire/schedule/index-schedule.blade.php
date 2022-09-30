<div class="col-12">
    <div class="col-12 border bg-primary text-light rounded-top box-select">
        <select class="days_select" name="day" id="day" wire:model="day">
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
            <option value="6">Saturday</option>
        </select>
    </div>
    <div class="table-responsive bg-light">
        <table class="table align-middle table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th scope="col" style="width:130px;" class="bg-secondary text-light text-center">H</th>
                    <th scope="col" class="bg-primary text-light text-center">Alicia Rd T1</th>
                    <th scope="col" class="bg-info text-light text-center">Alicia Rd T2</th>
                    <th scope="col" class="bg-primary text-light text-center">Alicia Rd T3</th>
                    <th scope="col" class="bg-info text-light text-center">Magnet Ct M1</th>
                    <th scope="col" class="bg-primary text-light text-center">Magnet Ct M2</th>
                    <th scope="col" class="bg-info text-light text-center">Magnet Ct M3</th>
                    <th scope="col" class="bg-primary text-light text-center">Magnet Ct M4</th>
                    <th scope="col" class="bg-info text-light text-center">Magnet Ct M5</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timezones as $time)
                    <tr>
                        <th scope="row" class="bg-secondary text-light pt-2">
                            <a href="#" class="text-light bg-danger py-1 pl-1 mr-1" data-toggle="modal" data-target="#deleteModal{{$time->id}}">
                                <i class='bx bxs-trash-alt' ></i>
                            </a>
                            {{ $time->timezone }}
                            <div class="modal fade" id="deleteModal{{ $time->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="POST" action="{{route('time.destroy',['time' => $time->id ])}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content red-danger border-red-danger">
                                            <div class="modal-body border-danger text-white text-center">
                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                you want to delete {{ $time->timezone }} <br>this process cannot be reversed<br>
                                                <input type="text" value="{{ $time->id }}" name="id" style="display:none;" >
                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </th>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 1 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 2 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 3 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 4 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 5 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 6 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 7 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($events as $event)
                                @if ($event->timezone_id == $time->id and $event->room_id == 8 )
                                    <div class="card text-center mb-0 border rounded">
                                        <div class="card-header text-light rounded"
                                            style="background-color: rgb({{ $event->color }})">
                                            {{ $event->type }}
                                        </div>
                                        <div class="card-body rounded"
                                            style="background-color:rgba({{ $event->color }},.2)">
                                            <h5 class="card-title">{{ $event->tutor }}</h5>
                                            <p class="card-text">{{ $event->student }}</p>
                                        </div>
                                        <div class="card-footer text-muted rounded">
                                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#deleteModal{{$event->id}}">Delete</a>
                                            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form method="POST" action="{{route('schedule.destroy',['schedule' => $event->id ])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content red-danger border-red-danger">
                                                            <div class="modal-body border-danger text-white text-center">
                                                                <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                                <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                                you want to delete {{ $event->tutor }} <br>this process cannot be reversed<br>
                                                                <input type="text" value="{{ $event->id }}" name="id" style="display:none;" >
                                                                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
