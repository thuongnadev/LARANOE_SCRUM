@php
$modules = [];
$modulePath = base_path('Modules');

if (File::exists($modulePath)) {
$directories = File::directories($modulePath);

foreach ($directories as $directory) {
$moduleName = basename($directory);
$modules[] = $moduleName;
}
}

$navItems = [];

$navItems[] = [
'id' => 'kt_aside_nav_tab_admin',
'title' => 'Dashboard',
'link' => '',
'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
</svg>',
];

// Thêm các module vào danh sách
if (!empty($modules)) {
foreach ($modules as $module) {
$navItems[] = [
'id' => 'kt_aside_nav_tab_' . strtolower($module),
'title' => ucfirst($module),
'link' => $module,
'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="black" />
    <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="black" />
</svg>',
];
}
} else {
$navItems[] = [
'id' => 'no_modules',
'title' => 'No Modules Available',
'link' => '',
'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM12 20C7.4 20 4 16.6 4 12C4 7.4 7.4 4 12 4C16.6 4 20 7.4 20 12C20 16.6 16.6 20 12 20ZM13 7H11V12.1L15.3 14.9L16 14.2L12 12.1V7Z" fill="black" />
</svg>',
];
}
@endphp

<ul class="nav flex-column">
    @foreach ($navItems as $item)
    @php
    $currentRoute = trim(Request::path(), '/');
    $routeName = trim('admin/' . strtolower($item['link']), '/');
    $isActive = $currentRoute === $routeName;
    $itemRoute = trim('admin/' . strtolower($item['link']), '/');
    $isActive = ($currentRoute === $itemRoute);
    @endphp
    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="{{ $item['title'] }}">
        <a class="nav-link btn btn-custom btn-icon{{ $isActive ? ' active' : '' }}" href="/{{ $routeName }}">
            <div class="d-flex flex-column">
                <span class="svg-icon svg-icon-2x">
                    {!! $item['icon'] !!}
                </span>
            </div>
        </a>
    </li>
    @endforeach
</ul>