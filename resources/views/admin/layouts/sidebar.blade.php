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
                    <a href="{{route('admin.port.index')}}">
                        <i class="bx bx-calculator"></i>
                        <span>Port List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.vehicle.rate')}}">
                        <i class="bx bx-bitcoin"></i>
                        <span>Rate</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-car"></i>
                        <span>Vehicle Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.vehicle.index')}}" >Vehicle List</a></li>
                        <li><a href="{{route('admin.vehicle.create')}}" >Add Vehicle</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Customer Voice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.customer.index')}}" >Review List</a></li>
                        <li><a href="{{route('admin.customer.add')}}" >Add Review</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span>News</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.news.index')}}" >News List</a></li>
                        <li><a href="{{route('admin.news.add')}}" >Add News</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-video-recording"></i>
                        <span>Video</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.video.index')}}" >Video List</a></li>
                        <li><a href="{{route('admin.video.add')}}" >Add Video</a></li>
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
                <li>
                    <a href="{{route('admin.inquiry.index')}}">
                        <i class="bx bx-envelope"></i>
                        <span>Inquiry List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.shipping.index')}}">
                        <i class="bx bx-store"></i>
                        <span>Shipping</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
