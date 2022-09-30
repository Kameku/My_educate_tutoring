<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">
                {{-- Link users --}}
                @can('administrator.users.index')
                    <a href="{{ route('administrator.users.index') }}">
                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                        text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path
                                                d="M57.33333,17.91667c-13.78948,0 -25.08333,11.29386 -25.08333,25.08333c0,13.78947 11.29385,25.08333 25.08333,25.08333c13.78948,0 25.08333,-11.29386 25.08333,-25.08333c0,-13.78947 -11.29385,-25.08333 -25.08333,-25.08333zM114.66667,17.91667c-13.85314,0 -25.08333,11.23019 -25.08333,25.08333c0,13.85314 11.23019,25.08333 25.08333,25.08333c13.85314,0 25.08333,-11.23019 25.08333,-25.08333c0,-13.85314 -11.23019,-25.08333 -25.08333,-25.08333zM57.33333,28.66667c7.97976,0 14.33333,6.35358 14.33333,14.33333c0,7.97975 -6.35358,14.33333 -14.33333,14.33333c-7.97976,0 -14.33333,-6.35358 -14.33333,-14.33333c0,-7.97975 6.35358,-14.33333 14.33333,-14.33333zM34.04167,75.25c-6.91583,0 -12.54167,5.62583 -12.54167,12.54167v26.875c0,19.7585 16.07483,35.83333 35.83333,35.83333c7.64325,0 14.71826,-2.42703 20.54118,-6.52278c-1.892,-3.13184 -3.40826,-6.50879 -4.45817,-10.09213c-4.36092,3.655 -9.96626,5.86491 -16.08301,5.86491c-13.82808,0 -25.08333,-11.25525 -25.08333,-25.08333v-26.875c0,-0.98542 0.80625,-1.79167 1.79167,-1.79167h37.71598c0.36908,-4.05992 1.96484,-7.77225 4.43018,-10.75zM91.375,75.25c-6.91583,0 -12.54167,5.62583 -12.54167,12.54167v34.04167c0,19.7585 16.07483,35.83333 35.83333,35.83333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333v-34.04167c0,-6.91583 -5.62583,-12.54167 -12.54167,-12.54167z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>

                    </a>

                @endcan

                {{-- Link roles --}}
                @can('administrator.roles.index')
                    <a href="{{ route('administrator.roles.index') }}">
                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                    viewBox="0 0 172 172" style=" fill:#000000;">
                                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                        stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                        text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path
                                                d="M34.04167,7.16667c-2.967,0 -5.375,2.408 -5.375,5.375v17.91667c0,2.967 2.408,5.375 5.375,5.375h17.91667c2.967,0 5.375,-2.408 5.375,-5.375c0,-2.30947 -1.48141,-4.23699 -3.52734,-4.99707c9.9877,-4.89135 20.99443,-7.5446 32.19401,-7.5446c17.931,0 35.28441,6.5519 48.85091,18.44857c1.01767,0.89583 2.28718,1.32975 3.54134,1.32975c1.49067,0 2.97058,-0.61566 4.03125,-1.81966c1.9565,-2.236 1.73892,-5.64409 -0.48991,-7.60059c-15.53017,-13.61667 -35.39393,-21.10807 -55.9336,-21.10807c-16.57577,0 -32.81948,5.00419 -46.58333,14.16536v-8.79036c0,-2.967 -2.408,-5.375 -5.375,-5.375zM35.83333,50.16667c-9.87567,0 -17.91667,8.041 -17.91667,17.91667c0,9.87567 8.041,17.91667 17.91667,17.91667c9.87567,0 17.91667,-8.041 17.91667,-17.91667c0,-9.87567 -8.041,-17.91667 -17.91667,-17.91667zM136.16667,50.16667c-9.87567,0 -17.91667,8.041 -17.91667,17.91667c0,9.87567 8.041,17.91667 17.91667,17.91667c9.87567,0 17.91667,-8.041 17.91667,-17.91667c0,-9.87567 -8.041,-17.91667 -17.91667,-17.91667zM35.83333,60.91667c3.94883,0 7.16667,3.21783 7.16667,7.16667c0,3.94883 -3.21783,7.16667 -7.16667,7.16667c-3.94883,0 -7.16667,-3.21783 -7.16667,-7.16667c0,-3.94883 3.21783,-7.16667 7.16667,-7.16667zM136.16667,60.91667c3.94883,0 7.16667,3.21783 7.16667,7.16667c0,3.94883 -3.21783,7.16667 -7.16667,7.16667c-3.94883,0 -7.16667,-3.21783 -7.16667,-7.16667c0,-3.94883 3.21783,-7.16667 7.16667,-7.16667zM19.70833,93.16667c-10.87183,0 -19.70833,8.8365 -19.70833,19.70833v3.58333c0,2.967 2.408,5.375 5.375,5.375c2.967,0 5.375,-2.408 5.375,-5.375v-3.58333c0,-4.93783 4.0205,-8.95833 8.95833,-8.95833h32.25c4.93783,0 8.95833,4.0205 8.95833,8.95833v3.58333c0,2.967 2.408,5.375 5.375,5.375c2.967,0 5.375,-2.408 5.375,-5.375v-3.58333c0,-10.87183 -8.8365,-19.70833 -19.70833,-19.70833zM120.04167,93.16667c-10.87183,0 -19.70833,8.8365 -19.70833,19.70833v3.58333c0,2.967 2.408,5.375 5.375,5.375c2.967,0 5.375,-2.408 5.375,-5.375v-3.58333c0,-4.93783 4.0205,-8.95833 8.95833,-8.95833h32.25c4.93783,0 8.95833,4.0205 8.95833,8.95833v3.58333c0,2.967 2.408,5.375 5.375,5.375c2.967,0 5.375,-2.408 5.375,-5.375v-3.58333c0,-10.87183 -8.8365,-19.70833 -19.70833,-19.70833zM34.12565,134.31901c-1.37331,0.08958 -2.71706,0.69125 -3.69531,1.80566c-1.9565,2.236 -1.74609,5.64409 0.48991,7.60059c15.523,13.61667 35.38676,21.10807 55.9336,21.10807c16.23291,0 32.14986,-4.81788 45.72949,-13.61947v8.24447c0,2.967 2.408,5.375 5.375,5.375c2.967,0 5.375,-2.408 5.375,-5.375v-17.91667c0,-2.967 -2.408,-5.375 -5.375,-5.375h-17.91667c-2.967,0 -5.375,2.408 -5.375,5.375c0,2.52865 1.78975,4.55104 4.14323,5.12305c-9.92174,4.81277 -20.84979,7.41862 -31.95605,7.41862c-17.93817,0 -35.27758,-6.5519 -48.83692,-18.44857c-1.118,-0.97825 -2.51796,-1.40534 -3.89128,-1.31575z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>

                    </a>

                @endcan


                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" onclick="sidebarClose()">
                        <i class="mdi mdi-menu-open"></i>
                    </button>
                </div>



                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button data-toggle="modal" data-target="#messagesModal"
                        class="btn header-item noti-icon waves-effect">
                        <i class='bx bx-mail-send'></i>
                    </button>
                    {{-- <a data-toggle="modal" data-target="#homeworkModal" class="btn btn-primary mb-2 p-2 text-white">Create Homework</a> --}}

                </div>
                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        {{-- @if ($count = Auth::user()->unreadnotifications->count())
                            <span class="badge badge-warning badge-pill text-dark">{{ $count }}</span>
                        @endif --}}

                        <span class="badge badge-warning badge-pill text-dark">5</span>

                    </button>
                    {{-- @if (Auth::user()->unreadnotifications->count())
                        <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" style="height:400px; overflow-y:scroll;" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0">Unread Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{route('notifications.index')}}" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            @foreach (Auth::user()->unreadnotifications as $item)
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="{{ $item->data['link'] }}" class="text-reset notification-item">
                                        <div class="media">
                                            @if (strpos($item->data['avatar'], 'users') !== false)
                                            <img src="{{ URL::asset('storage/images/'.$item->data["avatar"] ) }}" alt="" class="mr-3 rounded-circle avatar-xs" alt="Header Avatar">
                                            @else
                                            <img src="{{$item->data['avatar']}}" alt="" class="mr-3 rounded-circle avatar-xs" alt="Header Avatar"> 
                                            @endif
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">{{ $item->data['title'] }}</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">{{ $item->data['text'] }}</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i>  {{ $item->data['time'] }}</p>
                                                </div>
                                                <form method="POST" action="{{ route('notifications.read', $item->id)}}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-secondary badge badge-pill badge-secondary px-4 py-1">Mark Read</button>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div> 
                            @endforeach
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="{{route('notifications.index')}}">
                                    <i class="mdi mdi-arrow-right-circle mr-1"></i> View All
                                </a>
                            </div>
                        </div>
                    @endif --}}
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (strpos(Auth::user()->profile_photo, 'users') !== false)
                            <img src="{{Storage::url(Auth::user()->profile_photo)}}"
                            class="rounded-circle" style="object-fit: cover; object-position: center; " width="35" height="35">
                        @else
                            <img src="{{ Auth::user()->profile_photo }}"
                            class="rounded-circle" style="object-fit: cover; object-position: center; " width="35" height="35">
                        @endif
                        <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('employees.show', Auth::user()->id)}}"><i class="bx bx-user font-size-16 align-middle mr-1"></i>My
                            Profile</a>
                            @can('appraisal.myappraisal')
                                
                                <a class="dropdown-item" href="{{route('appraisal.myappraisal', Auth::user()->id)}}">
                                    <i class='mdi mdi-file-document-edit-outline font-size-16 align-middle mr-1'></i>
                                    My Appraisals
                                </a>
                            @endcan


                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a> --}}

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ URL::asset('images/site-icon-white.png') }}" alt="" height="20">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ URL::asset('images/site-icon-white.png') }}" alt="" height="40">
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

        </div>
    </div>
</header>
