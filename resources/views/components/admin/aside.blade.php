<div id="kt_aside" class="aside aside-extended bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <div class="aside-primary bg-main d-flex flex-column align-items-lg-center flex-row-auto">
        <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">
            @include('config.admin.aside.logo.logo_favicon')
        </div>
        <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
            <div class="hover-scroll-y mb-10" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="0px">
                @include('config.admin.aside.menu.menu_item')
            </div>
        </div>
        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
            <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
                @include('config.admin.aside.user.avatar')
                @include('config.admin.aside.user.menu')
            </div>
        </div>
    </div>
    @include('config.admin.aside.menu.menu_sub')
    @include('config.admin.aside.button.button_toggle')
</div>