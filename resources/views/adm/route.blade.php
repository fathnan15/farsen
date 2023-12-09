@extends('layouts.dashboard')
@section('title-page', ' | ADMINISTRATION')
@section('title-head', 'route')

@section('content')
    <h1>APP. ROUTE</h1>
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <i class="fas fa-search fa-lg"></i>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-filter fa-lg"></i>
                        </span>
                        <!--end::Svg Icon-->Filter</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold mb-3">Request Method:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex flex-column flex-wrap fw-bold"
                                    data-kt-customer-table-filter="request_method">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="request_method" value="all"
                                            checked="checked" />
                                        <span class="form-check-label text-gray-600">All</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="request_method"
                                            value="get" />
                                        <span class="form-check-label text-gray-600">Get</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="request_method"
                                            value="post" />
                                        <span class="form-check-label text-gray-600">Post</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-customer-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    {{-- <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_customers_export_modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-file-export fa-lg"></i>
                        </span>
                        <!--end::Svg Icon-->Export</button>
                    <!--end::Export--> --}}
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">Add Customer</button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                        Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Req:Route Name</th>
                        <th class="min-w-125px">URI</th>
                        <th class="min-w-125px">Controller:Method</th>
                        <th class="min-w-125px">Last Modified</th>
                        <th class="min-w-50px">Status</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @foreach ($routes as $route)
                        <tr>
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $route->id }}" />
                                </div>
                            </td>
                            <!--end::Checkbox-->
                            <!--begin::Route Name=-->
                            <td data-filter = "{{ $route->http_req }}">
                                <a href="{{ Route($route->name) }}" class="text-gray-800 text-hover-primary mb-1">
                                    {{ $route->http_req }}
                                    <br>
                                    : {{ $route->name }}
                                </a>
                            </td>
                            <!--end::Route Name=-->
                            <!--begin::Route URI=-->
                            <td>
                                <a href="{{ Route($route->name) }}"
                                    class="text-gray-600 text-hover-primary mb-1">{{ $route->uri }}</a>
                            </td>
                            <!--end::Route URI=-->
                            <!--begin::Controller:Method=-->
                            <td>
                                {{ $route->controller }}
                                <br>
                                : {{ $route->action }}
                            </td>
                            <!--end::Controller:Method=-->
                            <!--begin::Date=-->
                            <td>{{ $route->updated_at }}</td>
                            <!--end::Date=-->
                            <!--begin::Is Active=-->
                            <td>
                                @switch($route->is_active)
                                    @case(1)
                                        Active
                                    @break

                                    @case(0)
                                        Inactive
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <!--end::Is Active=-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="view.html" class="menu-link px-3">View</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3"
                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                    @endforeach

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    <!--begin::Modal - Customers - Add-->
    <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="list.html">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Add a Route</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Request Method</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Route Request Method"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="http_req" aria-label="Select a Method" data-control="select2"
                                    data-placeholder="Select a Method..." data-dropdown-parent="#kt_modal_add_customer"
                                    class="form-select form-select-solid fw-bolder">
                                    <option value="">Select a Method...</option>
                                    <option value="get">Get</option>
                                    <option value="post">Post</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">URI</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Must Valid Route Name"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">URI</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Must Valid URI ex: adm/app/route"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="uri" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="row g-9 mb-7">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Controller Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="controller" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Controller Method</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="action" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold">Does the route require user authentication?</label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="is_auth" type="checkbox" value="1"
                                            id="kt_modal_add_customer_billing" checked="checked" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-bold text-muted"
                                            for="kt_modal_add_customer_billing">Yes</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--begin::Wrapper-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - Customers - Add-->
    <!--begin::Modal - Adjust Balance-->
    <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Export Customers</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_customers_export_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select data-control="select2" data-placeholder="Select a format" data-hide-search="true"
                                name="format" class="form-select form-select-solid">
                                <option value="excell">Excel</option>
                                <option value="pdf">PDF</option>
                                <option value="cvs">CVS</option>
                                <option value="zip">ZIP</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Row-->
                        <div class="row fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5">Payment Type:</label>
                            <!--end::Label-->
                            <!--begin::Radio group-->
                            <div class="d-flex flex-column">
                                <!--begin::Radio button-->
                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" checked="checked"
                                        name="request_method" />
                                    <span class="form-check-label text-gray-600 fw-bold">All</span>
                                </label>
                                <!--end::Radio button-->
                                <!--begin::Radio button-->
                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked"
                                        name="request_method" />
                                    <span class="form-check-label text-gray-600 fw-bold">Visa</span>
                                </label>
                                <!--end::Radio button-->
                                <!--begin::Radio button-->
                                <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                                    <input class="form-check-input" type="checkbox" value="3"
                                        name="request_method" />
                                    <span class="form-check-label text-gray-600 fw-bold">Mastercard</span>
                                </label>
                                <!--end::Radio button-->
                                <!--begin::Radio button-->
                                <label class="form-check form-check-custom form-check-sm form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="4"
                                        name="request_method" />
                                    <span class="form-check-label text-gray-600 fw-bold">American Express</span>
                                </label>
                                <!--end::Radio button-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_customers_export_cancel"
                                class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Card-->
    <!--end::Modals-->
@endsection

@section('JS by Content')
    <script src="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/custom/apps/customers/list/export.js') }}"></script>
    <script src="{{ asset('metronic/js/custom/apps/customers/list/list.js') }}"></script>
    <script src="{{ asset('metronic/js/custom/apps/customers/add.js') }}"></script>
@endsection

@section('javascript')
    <script>
        // "use strict";
        // var KTChangePassword = (function() {
        //     var t, e, i;
        //     return {
        //         init: function() {
        //             (t = document.querySelector("#kt_change_password_form")),
        //             (e = document.querySelector("#kt_change_password_submit")),
        //             (i = FormValidation.formValidation(t, {
        //                 fields: {
        //                     old_password: {
        //                         validators: {
        //                             notEmpty: {
        //                                 message: "The old password is required.",
        //                             },
        //                             stringLength: {
        //                                 min: 6,
        //                                 message: "The length of the old password must be at least 6 characters."
        //                             },
        //                             regexp: {
        //                                 regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
        //                                 message: "The old password provided does not match any pattern.",
        //                             },
        //                         },
        //                     },
        //                     new_password: {
        //                         validators: {
        //                             notEmpty: {
        //                                 message: "The password is required.",
        //                             },
        //                             stringLength: {
        //                                 min: 6,
        //                                 message: "The length of the new password must be at least 6 characters."
        //                             },
        //                             regexp: {
        //                                 regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
        //                                 message: "The new password must be at least 6 characters long and include at least one digit.",
        //                             },
        //                         },
        //                     },
        //                     new_password_confirmation: {
        //                         validators: {
        //                             notEmpty: {
        //                                 message: "The password confirmation is required."
        //                             },
        //                             stringLength: {
        //                                 min: 6,
        //                                 message: "The length of the new password confirmation must be at least 6 characters."
        //                             },
        //                             regexp: {
        //                                 regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
        //                                 message: "The new password confirmation must be at least 6 characters long and include at least one digit.",
        //                             },
        //                             identical: {
        //                                 compare: function() {
        //                                     return e.querySelector('[name="new_password"]').value
        //                                 },
        //                                 message: "The password and its confirm are not the same"
        //                             },
        //                         },
        //                     },
        //                 },
        //                 plugins: {
        //                     trigger: new FormValidation.plugins.Trigger(),
        //                     bootstrap: new FormValidation.plugins.Bootstrap5({
        //                         rowSelector: ".row",
        //                     }),
        //                 },
        //             })),
        //             e.addEventListener("click", function(n) {
        //                 n.preventDefault(),
        //                     i.validate().then(function(i) {
        //                         "Invalid" == i
        //                             ?
        //                             Swal.fire({
        //                                 text: "Sorry, looks like there are some errors detected, please try again.",
        //                                 icon: "error",
        //                                 buttonsStyling: !1,
        //                                 confirmButtonText: "Ok, got it!",
        //                                 customClass: {
        //                                     confirmButton: "btn btn-primary",
        //                                 },
        //                             }) :
        //                             t.submit();
        //                     });
        //             });
        //         },
        //     };
        // })();
        // KTUtil.onDOMContentLoaded(function() {
        //     KTChangePassword.init();
        // });
    </script>
@endsection
