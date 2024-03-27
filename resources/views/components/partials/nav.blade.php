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


        <ul class="menu-sub">

            <li class="menu-item">
                @can('license_district', auth()->user())
                    <a href="/show/application/form/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Add License Application</div>
                    </a>
                @endcan
            </li>

        </ul>


        <ul class="menu-sub">

            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/show/submitted/applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">License Submitted Applications</div>
                    </a>
                @endcan
            </li>

        </ul>


        <ul class="menu-sub">

            <li class="menu-item">
                @can('finance', auth()->user())
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/application/finance/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">License Finance Pending Applications</div>
                    </a>
                @else
                    @can('license', auth()->user())
                        <a href="/application/finance/verification/{{ auth()->id() }}" class="menu-link">
                            <div data-i18n="Without menu">License Finance Pending Applications</div>
                        </a>
                    @endcan
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">
            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/application/license/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">License Approval Pending Applications</div>
                    </a>
                @endcan
            </li>
        </ul>
        <ul class="menu-sub">
            <li class="menu-item">
                @can('license_issue_print_draft', auth()->user())
                    <a href="/show/applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">License NotIssued Pending Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license_issue_print_draft', auth()->user())
                    <!-- Pass the authenticated user's ID in the URL -->
                    <a href="/show/print_ready_applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Print Ready Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

    </li>

    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Extended UI">Product Registration</div>
        </a>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license_district', auth()->user())
                    <a href="/show/product/application/form/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Add Product Application</div>
                    </a>
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/show/product/submitted/applications" class="menu-link">
                        <div data-i18n="Without menu">Product Submitted Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('finance', auth()->user())
                    <a href="/product/application/finance/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Product Finance Pending Applications</div>
                    </a>
                @else
                    @can('license', auth()->user())
                        <a href="/product/application/finance/verification/{{ auth()->id() }}" class="menu-link">
                            <div data-i18n="Without menu">Product Finance Pending Applications</div>
                        </a>
                    @endcan
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/application/product/verification/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Product Approval Pending Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license_issue_print_draft', auth()->user())
                    <a href="/show/product/applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Product NotIssued Pending Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license_issue_print_draft', auth()->user())
                    <a href="/show/product/print_ready_applications/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Print Ready Applications</div>
                    </a>
                @endcan
            </li>

        </ul>

    </li>
    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Extended UI">Licensee Details</div>
        </a>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/show/licensee/details/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Licensee Information</div>
                    </a>
                @endcan
            </li>

        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="Extended UI">Modifications in license</div>
        </a>

        <ul class="menu-sub">

            <li class="menu-item">
                @can('license', auth()->user())
                    <a href="/show/license/category/{{ auth()->id() }}" class="menu-link">
                        <div data-i18n="Without menu">Update License Category</div>
                    </a>
                @endcan
            </li>

        </ul>
    </li>
    <li class="menu-item">
        @can('complete_access', auth()->user())
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Assign Roles and Permissions</div>
            </a>
        @endcan

        <ul class="menu-sub">

            <li class="menu-item">

                <!-- Pass the authenticated user's ID in the URL -->
                <a href="/show/users/{{ auth()->id() }}" class="menu-link">
                    <div data-i18n="Without menu">Create Users</div>
                </a>
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">

                <!-- Pass the authenticated user's ID in the URL -->
                <a href="/show/roles/{{ auth()->id() }}" class="menu-link">
                    <div data-i18n="Without menu">Create Roles</div>
                </a>
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">

                <!-- Pass the authenticated user's ID in the URL -->
                <a href="show/permissions/{{ auth()->id() }}" class="menu-link">
                    <div data-i18n="Without menu">Create Permissions</div>
                </a>
            </li>

        </ul>

        <ul class="menu-sub">

            <li class="menu-item">

                <!-- Pass the authenticated user's ID in the URL -->
                <a href="show/roles/permissions/{{ auth()->id() }}" class="menu-link">
                    <div data-i18n="Without menu">Assign Roles and Permissions</div>
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
