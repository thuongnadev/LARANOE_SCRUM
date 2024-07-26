<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <div class="menu-item px-5 my-1">
        <a href="#" class="menu-link px-5">Account Settings</a>
    </div>
    <div class="menu-item px-5">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="menu-link px-5 bg-transparent border-0">Sign Out</button>
        </form>
    </div>
    <div class="separator my-2"></div>
    <div class="menu-item px-5">
        <div class="menu-content px-5">
            <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="../dist/index.html" />
                <span class="pulse-ring ms-n1"></span>
                <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
            </label>
        </div>
    </div>
</div>