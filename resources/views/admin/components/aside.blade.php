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
        {{-- <!-- Dashboards -->
        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <div class="badge bg-danger rounded-pill ms-auto">5</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-without-menu.html" class="menu-link">
                        <div data-i18n="Without menu">Statictisc one</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <!-- User Interface -->
        <li class="menu-item">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-color-fill"></i>
                <div data-i18n="userInterface">User Interface</div>
            </a>
        </li>
        <!-- TimeTable -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Dashboards">TimeTable</div>
            </a>
        </li>
        <!-- Course -->
        <li class="menu-item">
            <a href="{{ route('admin.course') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Dashboards">Course</div>
            </a>
        </li>
        <!-- Section -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-hourglass"></i>
                <div data-i18n="Dashboards">Section</div>
            </a>
        </li>
        <!-- Teacher -->
        <li class="menu-item">
            <a href="{{ route('admin.teacher') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Dashboards">Instructor</div>
            </a>
        </li>
        <!-- Student -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Dashboards">Student</div>
            </a>
        </li>
        <!-- Admin List  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Dashboards">Staff</div>
            </a>
        </li>


    </ul>
</aside>
<!-- / Menu -->
