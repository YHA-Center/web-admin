
<style>
    .menu-item:hover{
        background: rgb(241, 241, 241);
   }
    .dropdown-menu a:hover{
        background-color: #ff6c0f;
        color: white;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('Logo-png-.png') }}" width="70" alt="" class="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2 text-uppercase">YHA</span>
        </a> 

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
         <li class="menu-item">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div data-i18n="userInterface">Dashboard</div>
            </a>
        </li>
        <!-- User Interface -->
        <li class="menu-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-color-fill"></i>
                <div data-i18n="userInterface">User Interface</div>
            </a>
        </li>
        <!-- TimeTable -->
        <li class="menu-item {{ request()->routeIs('admin.timetable') ? 'active' : '' }}">
            <a href="{{ route('admin.timetable') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Dashboards">TimeTable</div>
            </a>
        </li>
        <!-- Attendance -->
        <li class="menu-item">
            <a href="{{ route('admin.timetable') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="Dashboards">Attendance</div>
            </a>
        </li>
        <!-- Course -->
        <li class="menu-item {{ request()->routeIs('admin.course') ? 'active' : '' }}">
            <a href="{{ route('admin.course') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">Course</div>
            </a>
        </li>
        <!-- Section -->
        <li class="menu-item {{ request()->routeIs('admin.section') ? 'active' : '' }}">
            <a href="{{ route('admin.section') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-hourglass"></i>
                <div data-i18n="Dashboards">Section</div>
            </a>
        </li>
        <!-- Teacher -->
        <li class="menu-item {{ request()->routeIs('admin.teacher') ? 'active' : '' }}">
            <a href="{{ route('admin.teacher') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Dashboards">Instructor</div>
            </a>
        </li>
        <!-- Student -->
        <li class="menu-item {{ request()->routeIs('admin.student') ? 'active' : '' }}">
            <a href="{{ route('admin.student') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Dashboards">Student</div>
            </a>
        </li>
        <!-- Project -->
        <li class="menu-item {{ request()->routeIs('admin.project') ? 'active' : '' }}">
            <a href="{{ route('admin.project') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-folder"></i>
                <div data-i18n="Dashboards">Project</div>
            </a>
        </li>
        <!-- Project -->
        <li class="menu-item {{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
            <a href="{{ route('admin.gallery') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Dashboards">Gallery</div>
            </a>
        </li>
        <!-- Admin List  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Dashboards">Staff</div>
            </a>
        </li>
        {{-- POS List --}}
        <li class="menu-item dropdown">
            <a href="#" class="menu-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-file-invoice-dollar mr-4"></i>
                <div data-i18n="Dashboards">POS</div>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('pos') }}">Invoice</a>
                <a class="dropdown-item" href="{{ route('income_list') }}">Income List</a>
                <a class="dropdown-item" href="{{ route('final_pay') }}">Final Payment</a>
            </div>
        </li>
        

    </ul>
</aside> 

<!-- / Menu -->