
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <!-- <h3>Live On</h3> -->
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-gears"></i> {{__('general.management')}}<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('getListLanguages')}}"> {{__('general.languages')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-users"></i> {{__('general.users')}}<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('getListUserGroup')}}"> {{__('general.userGroup')}}</a></li>
                            <li><a href="{{route('getListUsers')}}"> {{__('general.users')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-barcode"></i> {{__('general.products')}}<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('getListProductsAdmin')}}"> {{__('general.products')}}</a></li>
                            <li><a href="{{route('getListCategoriesAdmin')}}"> {{__('general.categories')}}</a></li>
                            <li><a href="{{route('getListProducersAdmin')}}"> {{__('general.producers')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('getListPermisssions')}}"><i class="fa fa-lock"></i> {{__('general.roles')}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('getLogoutAdmin')}}">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>