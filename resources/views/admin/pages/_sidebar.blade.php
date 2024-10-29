<div class="bg-primary d-flex flex-column flex-shrink-0 p-3 text-white js-height-fix">
    <a href="{{ route('admin.dashboard') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin.wells.index') }}" class="nav-link text-white">
                Quản lý giếng nước
            </a>
        </li>
        <li>
            <a href="{{ route('admin.water_quality.index') }}" class="nav-link text-white">
                Quản lý chất lượng nước
            </a>
        </li>
        <li>
            <a href="{{ route('admin.water_usage.index') }}" class="nav-link text-white">
                Quản lý sử dụng nước
            </a>
        </li>
        <li>
            <a href="{{ route('admin.reports.index') }}" class="nav-link text-white">
                Báo cáo thống kê
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                Thông tin người dùng
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>{{ Auth::user()->name ?? 'Khách' }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
