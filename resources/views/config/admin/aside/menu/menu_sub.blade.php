<div class="aside-secondary d-flex flex-row-fluid">
    <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
        <div class="d-flex h-100 flex-column">
            <div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
                @php
                $currentRoute = trim(Request::path(), '/');
                $routeSegments = explode('/', $currentRoute);
                $lastRouteSegment = array_pop($routeSegments);
                $viewPath = 'config.admin.aside.menu.menu_sub_item.' . $lastRouteSegment;
                @endphp

                @if(view()->exists($viewPath))
                    @include($viewPath)
                @else
                <div class="h3">Update soon...</div>
                @endif
            </div>
        </div>
    </div>
</div>
