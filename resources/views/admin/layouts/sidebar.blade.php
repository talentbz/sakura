<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar-check"></i>
                        <span>Booking Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="#" >Commisssion</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Hotel Booking</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#" >Booking History</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">Flight Booking</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="#">Commisssion</a>
                                </li>
                                <li><a href="#">Booking History</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.user')}}">Registered User</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
