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
                    <a href="{{route('tasks.index')}}" class="waves-effect">
                        <i class='bx bx-food-menu'></i>
                        <span>Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-spreadsheet'></i>
                        <span>Assessments Tool</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Burt word decoding</a></li>
                        <li><a href="#">Holborn Reading Scale</a></li>
                        <li><a href="#">Morrison McCall Spelling Scale</a></li>
                        <li><a href="#">Nonword decoding</a></li>
                        <li><a href="#">Nonword stimulus set</a></li>
                        <li><a href="#">South_Asutralia_use_this</a></li>
                        <li><a href="#">Waddington Reading Test</a></li>
                        <li><a href="#">Waddington Spelling Test</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="{{route('student.index')}}" class="waves-effect">
                        <i class='bx bx-receipt'></i>
                        <span>Active Students</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{route('atten.index')}}" class="waves-effect">
                        <i class='bx bxs-user-badge'></i>
                        <span>Attendances & Learning</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('homework.index')}}" class="waves-effect">
                        <i class='bx bxs-user-badge'></i>
                        <span>Homework</span>
                    </a>
                </li>
                <li>    
                    <a href="{{route('library.index')}}" class="waves-effect">
                        <i class='bx bx-photo-album'></i>
                        <span>Library</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->