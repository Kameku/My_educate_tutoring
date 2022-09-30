<div>
   
    @if (session('create'))

            <div class="col-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('create') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

        @endif
        @if (session('delete'))

            <div class="col-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

        @endif
    {{-- {{ $search }} --}}
    <input 
        wire:model="search"
        class="form-control form-control-lg mt-3"  
        type="text" 
        placeholder="Search employee for name, lasta name and email ">
 
    <div class="row mt-4">
    @if ($employees->count())
    @foreach ($employees as $employe)
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="profile-widgets py-3">
        
                    <div class="text-center">
                        <div class="">
                            <img src="{{$employe->profile_photo}}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle" style="object-fit: cover; object-position: center;"> 
                            
                            <div class="online-circle">
                                @if ($employe->hasRole('dissabled'))
                                    <i class="fas fa-circle text-danger"></i>
                                @else
                                    <i class="fas fa-circle text-success"></i>
                                @endif
                            </div>
                        </div>
                        <div class="mt-2">
                            <span class="text-primary font-size-18"> {{$employe->name.' '.$employe->last_name}}</span>
                            <div class="d-flex bd-highlight justify-content-center mb-1">
                            @foreach ($employe->getRoleNames() as $roles)
                                <div class="badge badge-secondary p-1 mt-1 mr-1" style="text-transform: capitalize; font-size: 11px;">{{$roles}}</div>
                            @endforeach
                            </div>
                            <span class="text-secondary font-size-13">{{ $employe->email }}</span>
                            <br>
                            <span class="text-secondary font-size-13">{{ $employe->phone_number }}</span>
                        </div>
                        <div class="mt-3">
                            @if (Auth::user()->id == $employe->id)
                            <a href="{{route('employees.show', $employe)}}" class="btn btn-primary btn-sm">View Profile</a>
                            @else
                                @can('employees.show')
                                <a href="{{route('employees.show', $employe)}}" class="btn btn-primary btn-sm">View Profile</a>
                                @endcan
                            <span href="#" class="btn btn-success btn-sm">Send Message</span>  
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col-12">
        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <i class="mdi mdi-alert-outline mr-2"></i> No results for the search "{{ $search }}"
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="cerrar()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    @endif
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            {{ $employees->links() }}
        </ul>
    </nav>
</div>
