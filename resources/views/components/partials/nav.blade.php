<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
        <a href="/dashboard" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">License Registration</div>
        </a>

        @if(auth()->check())
            <ul class="menu-sub">
                <li class="menu-item">
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/show/application/form/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Add License Application</div>
                    </a>
                </li>
            </ul>
            <!-- Display user information -->
{{--            <p>Hello, {{ auth()->user()->name }}!</p>--}}
        @endif
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="/show/submitted/applications" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Submitted Applications</div>
                </a>
            </li>
        </ul>

        @if(auth()->check())
            <ul class="menu-sub">
                <li class="menu-item">
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/application/finance/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Finance Pending Applications</div>
                    </a>
                </li>
            </ul>
            <!-- Display user information -->
            {{--            <p>Hello, {{ auth()->user()->name }}!</p>--}}
        @endif

        @if(auth()->check())
            <ul class="menu-sub">
                <li class="menu-item">
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/application/license/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">License Pending Applications</div>
                    </a>
                </li>
            </ul>
            <!-- Display user information -->
            {{--            <p>Hello, {{ auth()->user()->name }}!</p>--}}
        @endif

        @if(auth()->check())
            <ul class="menu-sub">
                <li class="menu-item">
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/show/applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Pending Applications</div>
                    </a>
                </li>
            </ul>
            <!-- Display user information -->
            {{--            <p>Hello, {{ auth()->user()->name }}!</p>--}}
        @endif

        @if(auth()->check())
            <ul class="menu-sub">
                <li class="menu-item">
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/show/print_ready_applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Print Ready Applications</div>
                    </a>
                </li>
            </ul>
            <!-- Display user information -->
            {{--            <p>Hello, {{ auth()->user()->name }}!</p>--}}
        @endif

    </li>

    <!-- Salary -->
    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Extended UI">Product Registration</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="/salary/chart" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Add Product Application</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Account Settings</div>
        </a>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
    <li class="menu-item">
        <a
            href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
            target="_blank"
            class="menu-link"
        >
            <i class="menu-icon tf-icons bx bx-support"></i>
            <div data-i18n="Support">Support</div>
        </a>
    </li>
    <li class="menu-item">
        <a
            href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
            target="_blank"
            class="menu-link"
        >
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="Documentation">Documentation</div>
        </a>
    </li>
</ul>
