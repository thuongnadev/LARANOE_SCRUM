<div class="d-flex flex-stack mb-5">
    @include('config.admin.data-table.form-search')
    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
        @include('config.admin.data-table.toolbar.filter')
        @include('config.admin.data-table.toolbar.button_create')
    </div>
    @include('config.admin.data-table.action')
</div>

<table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1" />
                </div>
            </th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Payment Method</th>
            <th>Created Date</th>
            <th class="text-end min-w-100px">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
    </tbody>
</table>

@include('config.admin.script.data-table')