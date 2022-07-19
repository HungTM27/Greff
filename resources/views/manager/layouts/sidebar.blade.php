<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (auth()->user()->level == 0)
            <li class="nav-item
                {{ (request()->is('admin/company')) ? 'active' : '' }}
                {{ (request()->is('admin/addCompany')) ? 'active' : '' }}
                {{ (request()->is('admin/editCompany/{id}')) ? 'active' : '' }}
                {{ (request()->is('admin/listAccounts')) ? 'active' : '' }}
                {{ (request()->is('admin/registerUser')) ? 'active' : '' }}
            ">
                <a class="nav-link" href="{{ route('formManagementCompany') }}" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> Company </span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('job-category')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('formManagementJobCategory') }}" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> Job-Category </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('skills.index') }}" aria-expanded="false" aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title"> Skills </span>
                </a>
            </li>
        @endif

        @if (auth()->user()->level == 1)
            <li class="nav-item
                {{ (request()->is('company/stores')) ? 'active' : '' }}
                {{ (request()->is('company/addStore')) ? 'active' : '' }}
                {{ (request()->is('company/editStore/')) ? 'active' : '' }}
                {{ (request()->is('company/listAccounts')) ? 'active' : '' }}
            ">
                <a class="nav-link" href="{{ route('formManagementStore') }}" aria-expanded="false" aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> Store </span>
                </a>
            </li>
        @endif

        @if (auth()->user()->level == 2)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('RecruitJobs') }}" aria-expanded="false" aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title"> Recruit Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('occupation.show') }}" aria-expanded="false" aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title"> Occupation </span>
                </a>
            </li>

        @endif

        <li class="nav-item">
            <a class="nav-link"  href="{{route('logout')}}" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title"> Logout </span>
            </a>
        </li>
    </ul>
</nav>
