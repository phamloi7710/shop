<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="pull-right">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{url('')}}/{{Auth::user()->avatar}}" alt=""> {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('getLogoutAdmin')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=""> {{__('general.languages')}}
                    <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        @if(isset($languages))
                        @foreach($languages as $value)
                        <li><a href="{{route('setLanguage',[$value->code])}}"> <span><img width="20" src="{{$value->image}}" alt=""></span> {{$value->name}}</a></li>

                        @endforeach
                        @else
                        <li><a href="javascript:;"> {{__("general.noLanguage")}}</a></li>
                        @endif
                    </ul>
                </li>
                <!-- <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                            <span class="image"><img src="{{url('')}}/{{Auth::user()->avatar}}" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                            </a>
                        </li>
                        <li>
                            <a>
                            <span class="image"><img src="{{url('')}}/{{Auth::user()->avatar}}" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                            </a>
                        </li>
                        <li>
                            <a>
                            <span class="image"><img src="{{url('')}}/{{Auth::user()->avatar}}" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                            </a>
                        </li>
                        <li>
                            <a>
                            <span class="image"><img src="{{url('')}}/{{Auth::user()->avatar}}" alt="Profile Image" /></span>
                            <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </div>
</div>