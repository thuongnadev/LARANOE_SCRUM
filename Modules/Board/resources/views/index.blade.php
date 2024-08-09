@extends('layouts.dashboard.default')

@section('content')
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
		<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
				<h1 class="text-dark fw-bold my-0 fs-2">Dashboard</h1>
                <x-breadcrumb></x-breadcrumb>
			</div>
            @include('config.admin.aside.button.button_mobile_toggle')
		</div>
	</div>
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<div class="container-xxl" id="kt_content_container">
            <div class="container mx-auto p-4">
                <div class="dark antialiased bg-gray-50 dark:bg-gray-950 text-gray-950 dark:text-white font-normal min-h-screen">
                    <div class="flex flex-col md:flex-row h-screen">
                        <x-admin.board.layout.kanban-layout >
                        <livewire:board.kanban.board class="flex-1" />
                        <livewire:board.edit-task class="w-full md:w-1/3" />
                        </x-admin.board.layout.kanban-layout>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
