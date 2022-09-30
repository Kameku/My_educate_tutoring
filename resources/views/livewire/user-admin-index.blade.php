<div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card rounded">
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                            viewBox="0 0 172 172" style=" fill:#000000;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#0b35e8">
                                    <path
                                        d="M65.32935,-0.06824c-26.59737,-0.35746 -50.68948,15.64032 -60.67959,40.29282c-9.99011,24.6525 -3.83149,52.909 15.51142,71.16825c19.3429,18.25924 47.90719,22.78035 71.94344,11.38708l42.86877,42.86877c8.50127,8.28742 22.08554,8.20032 30.47984,-0.19542c8.3943,-8.39574 8.47907,-21.98003 0.1902,-30.47988l-42.86353,-42.86877c9.41076,-19.85439 8.07375,-43.13265 -3.54836,-61.77899c-11.6221,-18.64634 -31.9324,-30.09872 -53.9022,-30.39386zM66.22693,5.40125c32.28944,0.96222 57.82937,27.66201 57.35755,59.96233c-0.47182,32.30032 -26.78072,58.24273 -59.08448,58.26143c-32.63861,-0.03673 -59.08827,-26.48639 -59.125,-59.125c0.00028,-15.98022 6.46911,-31.27981 17.93276,-42.41319c11.46365,-11.13338 26.94576,-17.15232 42.91917,-16.68556zM62.93054,10.771c-29.39461,0.82098 -52.67299,25.11091 -52.24364,54.51385c0.42935,29.40294 24.40704,53.00281 53.81309,52.96516c29.67118,-0.03406 53.71594,-24.07882 53.75,-53.75c0.00052,-14.52788 -5.87984,-28.43727 -16.30132,-38.55914c-10.42148,-10.12186 -24.49645,-15.59407 -39.01814,-15.16987zM65.91199,16.146c26.42488,0.77877 47.33066,22.62654 46.9448,49.06008c-0.38586,26.43354 -21.92043,47.66179 -48.35679,47.66893c-26.7045,-0.02962 -48.34538,-21.6705 -48.375,-48.375c0.0001,-13.07464 5.2926,-25.59246 14.67176,-34.70166c9.37916,-9.1092 22.04616,-14.03397 35.11523,-13.65234zM65.39233,24.2085c-5.85149,-0.24307 -11.54891,1.91144 -15.77541,5.96554c-4.22649,4.05411 -6.61625,9.65692 -6.61693,15.51346c0.01363,11.86847 9.63153,21.48637 21.5,21.5c11.6784,-0.0304 21.19699,-9.37771 21.43941,-21.05364c0.24242,-11.67592 -8.88,-21.41027 -20.54707,-21.92537zM64.5,29.5625c8.90559,0 16.125,7.21941 16.125,16.125c0,8.90559 -7.21941,16.125 -16.125,16.125c-8.90559,0 -16.125,-7.21941 -16.125,-16.125c0.00978,-8.90154 7.22346,-16.11522 16.125,-16.125zM64.15357,75.25c-12.09648,0.09184 -23.66186,4.98154 -32.15552,13.59497c-1.04073,1.05957 -1.02545,2.76219 0.03412,3.80292c1.05957,1.04073 2.76219,1.02545 3.80292,-0.03412c7.56648,-7.66977 17.89102,-11.98739 28.66492,-11.98739c10.7739,0 21.09844,4.31762 28.66492,11.98739c1.04073,1.05957 2.74335,1.07484 3.80292,0.03412c1.05957,-1.04073 1.07484,-2.74335 0.03412,-3.80292c-8.66236,-8.78451 -20.51164,-13.68858 -32.84839,-13.59497zM120.15015,97.07544l9.08081,9.08081l-23.07471,23.07471l-9.08081,-9.08081c0.08304,-0.04837 0.15841,-0.10882 0.24146,-0.15747c9.42544,-5.58678 17.28111,-13.47135 22.83325,-22.91724zM133.03125,109.95654l28.81714,28.81189c3.06162,3.06005 4.78175,7.21131 4.78175,11.53998c0,4.32867 -1.72013,8.47993 -4.78175,11.53998h-0.00525c-3.05984,3.06001 -7.20997,4.77912 -11.53735,4.77912c-4.32738,0 -8.47752,-1.71911 -11.53735,-4.77912l-28.81189,-28.81714z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <input wire:model="search" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-lg" placeholder="Search user">
                </div>
            </div>
            @if ($users->count())
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <table id="datatable"
                                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                    aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Status</th>

                                            @can('administrator.users.edit')
                                            <th></th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        
                                            <tr>
                                                <td>{{ $user->name}}</td>
                                                <td>
                                                    @foreach ($user->getRoleNames() as $roles)
                                                        <div class="bd-highlight mr-1" style="text-transform: capitalize; font-size: 12px;">{{$roles}}</div>
                                                    @endforeach
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->hasRole('dissabled'))
                                                       <span class="badge badge-danger p-1 mt-1">Dissabled</span>
                                                    @else
                                                        <span class="badge badge-success p-1 mt-1">Active</span>
                                                    @endif
                                                </td>
                                                @can('administrator.users.edit')
                                                    <td style="width: 50px">
                                                        <a href="{{route('administrator.users.edit', $user)}}" class="btn btn-primary btn-sm btn-block text-white">Edit</a>
                                                    </td>
                                                @endcan
                                                
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination pagination-sm">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
            @else
                <div class="d-inline-flex card rounded px-4 py-2 bg-warning text-white">
                    No records found, please try the email name or surname.
                </div>
                
            @endif
            
        </div>
    </div>
</div>
