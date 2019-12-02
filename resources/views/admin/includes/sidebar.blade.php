<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                <b>GENERAL</b>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="{!! url('/admin'); !!}">

                <a class="nav-link " href="{!! url('/admin'); !!}">
                <a class="nav-link" href="{!! url('/admin'); !!}">


                    <i class="nav-icon fas fa-tachometer-alt"></i>
                  Dashboard
                </a>
            </li>
            <li class="divider"></li>
             <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/roles'); !!}"><i class="nav-icon fas fa-user" aria-hidden="true"></i>User Roles</a>
            </li>
            <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-language"></i>Languages
                </a>

                <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link " href="{!! url('/admin/language'); !!}">
                               Manage Language 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{!! url('/admin/translation'); !!}">
                              Manage Translation
                            </a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-language"></i>Common Modules
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/modules/module'); !!}">Manage Modules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/modules/field'); !!}">Modules Fields</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/modules/fieldvalue'); !!}">Modules Fields Value</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/foundation'); !!}">
                    <i class="nav-icon fas fa-language"></i>Foundation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/pages'); !!}"><i class="nav-icon fas fa-language"></i>Pages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{!! url('/admin/settings'); !!}"><i class="nav-icon fas fa-language"></i>Default Settings</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-language"></i>Locations
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link " href="{!! url('/admin/location/countryblock'); !!}">Country Block</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/country'); !!}">Country</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/region'); !!}">Regions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!! url('/admin/location/city'); !!}">City</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->

