<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav" style="display:none;">
            <!--<li class="nav-title">
                <b>GENERAL</b>
                </li> -->
            <li class="nav-item">
                <!--  <a class="nav-link" href="{{-- {!! url('/admin'); !!} --}}">
                    <a class="nav-link " href="{{-- {!! url('/admin'); !!} --}}"> -->
                <a class="nav-link" href="{!! url('/admin'); !!}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard
                </a>
            </li>
            <li class="divider"></li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-user"></i>User Management
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/users'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/users'); !!}">
                        User Search
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/listalluser'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/listalluser'); !!}">
                        List Users By Roles
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/roles'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/roles'); !!}">User Roles Management</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-user"></i>Foundation
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/foundation'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/foundation'); !!}">
                        Foundation
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/foundation/exports'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/foundation/exports'); !!}">
                        Exports Books
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/foundation'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/foundation'); !!}">
                        Search Foundations
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Settings
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/Office'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/Office'); !!}">
                        Manage Offices
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/language'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/language'); !!}">
                        Manage Language 
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/paymentmood'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/paymentmood'); !!}">
                        Manage Payment Mood 
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/subscriptiontype'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/subscriptiontype'); !!}">
                        Manage Subscription Ttype
                        </a>
                    </li>
                    @endcan
                    <!--<li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/translation'); !!}">
                          Manage Translation
                        </a>
                        </li>-->
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Common Modules
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/modules/module'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/modules/module'); !!}">Manage Modules</a>
                    </li>
                    @endcan
                    @can(routeName('/admin/modules/field'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/modules/field'); !!}">Modules Fields</a>
                    </li>
                    @endcan
                    @can(routeName('/admin/modules/fieldvalue'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/modules/fieldvalue'); !!}">Modules Fields Value</a>
                    </li>
                    @endcan
                </ul>
            </li>
            {{-- @can(routeName('/admin/organization'))
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/organization'); !!}">
                <i class="nav-icon fas fa-language"></i>Organization
                </a>
            </li>
            @endcan --}}
            <!--<li class="nav-item">
                <a class="nav-link " href="{{-- {!! url('/admin/foundation'); !!} --}}">
                    <i class="nav-icon fas fa-language"></i>Foundation
                </a>
                </li> -->
            {{-- @can(routeName('/admin/individual'))
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/individual'); !!}">
                <i class="nav-icon fas fa-language"></i>Individual
                </a>
            </li>
            @endcan --}}
            {{-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Library
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/library'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/library'); !!}">
                        Library
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/librarygroup'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/librarygroup'); !!}">
                        Library Group
                        </a>
                    </li>
                    @endcan
                </ul>
            </li> --}}
            @can(routeName('/admin/librarygroup'))
                <li class="nav-item">
                    <a class="nav-link " href="{!! url('/admin/librarygroup'); !!}">
                        <i class="nav-icon fas fa-language"></i> Library Group
                    </a>
                </li>
            @endcan
            @can(routeName('/admin/subscription'))
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/subscription'); !!}">
                <i class="nav-icon fas fa-language"></i>Subscription
                </a>
            </li>
            @endcan
            @can(routeName('/admin/order'))
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/order'); !!}">
                <i class="nav-icon fas fa-language"></i>Order
                </a>
            </li>
            @endcan
            @can(routeName('/admin/pages'))
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>CMS
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/pages'); !!}"></i>Pages</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/menu/create'); !!}">
                        Menu
                        </a>
                        </li> -->
                </ul>
            </li>
            @endcan

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Menu
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/menu/create'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/menu/create'); !!}">
                        Header Menu
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/menu/createfooter'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/menu/createfooter'); !!}">
                        Footer Menu
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>

            @can(routeName('/admin/settings'))
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/settings'); !!}"><i class="nav-icon fas fa-language"></i>Default Settings</a>
            </li>
            @endcan
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Locations
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/location/countryblock'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/location/countryblock'); !!}">Country Block</a>
                    </li>
                    @endcan
                    @can(routeName('/admin/location/country'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/country'); !!}">Country</a>
                    </li>
                    @endcan
                    @can(routeName('/admin/location/region'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/region'); !!}">Regions</a>
                    </li>
                    @endcan
                    @can(routeName('/admin/location/city'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/city'); !!}">City</a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fas fa-language"></i>Manage Services
                </a>
                <ul class="nav-dropdown-items">
                    @can(routeName('/admin/transaction'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/transaction'); !!}">
                        Transaction Search
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/cash_flow'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/report/cash_flow'); !!}">
                        Sales By Amount
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/products'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/products'); !!}">
                        Manage List Type 
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/hitlist'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/hitlist'); !!}">
                        Manage Hitlist
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/purpose'))
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/purpose'); !!}">
                        Manage Forms & Purposes
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/translation'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/translation'); !!}">
                        Manage Translation
                        </a>
                    </li>
                    @endcan
                    @can(routeName('/admin/subject'))
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/subject'); !!}">
                        Manage Subjects
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<!--sidebar-->