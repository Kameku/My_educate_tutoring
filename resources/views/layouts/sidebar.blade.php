<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                @if (strpos(Auth::user()->profile_photo, 'users') !== false )
                    <img src="{{ URL::asset('storage/images/'.Auth::user()->profile_photo) }}" class="rounded-circle" style="object-fit: cover; object-position: center; " width="100" height="100">
                @else
                    <img src="{{Auth::user()->profile_photo}}" class="rounded-circle" style="object-fit: cover; object-position: center; " width="100" height="100"> 
                @endif
            </div>
            <div class="mt-3">
                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name.' '.Auth::user()->last_name}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{ Auth::user()->roles()->first()->description }} </p>
            </div>
        </div>

        <!--- Sidemenu -->     
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{route('dashboard.index')}}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('schedule.index')}}" class="waves-effect">
                        <i class='bx bxs-calendar-plus' ></i>
                        <span>Schedule</span>
                    </a>
                </li>

                @can('AdminMenu')                
                <li class="menu-title">Administrator</li>
                @can('notice.create')
                    <li>
                        <a href="{{route('notice.index')}}" class="waves-effect">
                            <i class='bx bx-collection'></i>
                            <span>Noticeboard</span>
                        </a>
                    </li>
                @endcan
                @can('tasks.index')
                    <li>
                        <a href="{{route('tasks.index')}}" class="waves-effect">
                            <i class='bx bx-food-menu'></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                @endcan
                @can('employees.index')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account-multiple"></i>
                            <span>Employees</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('employees.index')}}">Employees List</a></li>
                            <li><a href="/password/reset">Reset Password</a></li>
                        </ul>
                    </li>
                @endcan
                @can('appraisal.index')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class='bx bx-pulse'></i>
                                <span>Human Resources</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{route('appraisal.index')}}">Staff Appraisals</a></li>
                                <li><a href="#">Recruitment</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">KPIs</a></li>
                            </ul>
                        </li>
                @endcan
                @can('marketing')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxl-trello'></i>
                        <span>Marketing and Sales</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Customer Review</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Customer Feedback</a></li>
                                <li><a href="javascript: void(0);">Survey A</a></li>
                                <li><a href="javascript: void(0);">Survey B</a></li>
                                <li><a href="javascript: void(0);">Survey C</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Rewards</a></li>
                    </ul>
                </li>
                @endcan
                @can('TermDates')
                <li>
                    <a href="{{route('term.index')}}" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Term Dates</span>
                    </a>
                </li>
                @endcan
                @endcan
                @can('studentMenu')
                    
                
                <li class="menu-title">Students</li>
                @can('enquiry')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-notepad'></i>
                        <span>Enquiry</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('preenrollment.list')}}">Manual Enquiry</a></li>
                        <li><a href="{{route('enquiry.page')}}">Website Enquiry</a></li>
                    </ul>
                </li>
                @endcan
                @can('Preenrolment.index')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-receipt'></i>
                        <span>Enrolment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('enquiry.index')}}">Pre-enrolment List</a></li>
                        <li><a href="{{route('enrolment.index')}}">Enrolment List</a></li>
                    </ul>
                </li>
                @endcan

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxs-group'></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('student.list')
                        <li><a href="{{route('student.list')}}">Student List</a></li>
                        @endcan
                        @can('student.index')
                        <li><a href="{{route('student.index')}}">Active Student</a></li>
                        @endcan
                        @can('student.former')
                        <li><a href="{{route('student.former')}}">Former Student</a></li>
                        @endcan
                        @can('AssignTutors')
                        <li><a href="{{route('assign.index')}}">Assign Tutors</a></li>
                        @endcan
                        {{-- @can('student.former') --}}
                        <li><a href="{{route('atten.index')}}">Attendances & Learning</a></li>
                        {{-- @endcan --}}
                    </ul>
                </li>
                @endcan
                
                @can('TutorMenu')
                    <li class="menu-title">Tutors</li>
                    @can('assessmentsTool')
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
                    @endcan
                    @can('library')
                    <li>     
                        <a href="{{route('library.index')}}" class="waves-effect">
                            <i class='bx bx-food-menu'></i>
                            <span>Library</span>
                        </a>
                    </li>
                    @endcan
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->