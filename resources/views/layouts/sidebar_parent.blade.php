<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                @if (strpos(Auth::user()->avatar, 'users') !== false )
                    <img src="{{ URL::asset('storage/images/'.Auth::user()->avatar) }}" alt="" class="avatar-md mx-auto rounded-circle">
                @else
                    <img src="{{Auth::user()->avatar}}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle"> 
                @endif
            </div>
            
            
            <div class="mt-3">
                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name }}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{ Auth::user()->roles()->first()->description}}</p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('events.index')}}" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.profile')}}" class="waves-effect">
                        <i class='bx bxs-user-badge'></i>
                        <span>Student profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('homework.index')}}" class="waves-effect">
                        <i class='bx bx-food-menu'></i>
                        <span>Homework</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->