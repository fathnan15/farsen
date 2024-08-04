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
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Route" />
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="kt_add_customer"
                        data-bs-target="#modal_add_route">Add Route</button>
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
                                    data-kt-check-target="#kt_customers_table .form-check-input" value="1" disabled
                                    hidden />
                            </div>
                        </th>
                        <th class="min-w-125px">Req:Route Name</th>
                        <th class="min-w-125px">URI</th>
                        <th class="min-w-125px">Controller:Method</th>
                        <th class="min-w-125px">Last Modified</th>
                        <th class="min-w-50px">Middleware</th>
                        <th class="min-w-50px">Status</th>
                        <th class="text-end min-w-70px">Actions</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @foreach ($routes as $route)
                        @php
                            if ($route->is_active == 0 || Str::contains($route->uri, '{')) {
                                $hrefUri = '#';
                            } else {
                                $hrefUri = route($route->name);
                            }
                        @endphp
                        <tr id="route_{{ $route->id }}">
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $route->id }}" disabled
                                        hidden />
                                </div>
                            </td>
                            <!--end::Checkbox-->
                            <!--begin::Route Name=-->
                            <td data-filter = "{{ $route->http_req }}">
                                <a href="{{ $hrefUri }}" class="text-gray-800 text-hover-primary mb-1">
                                    {{ $route->name }}
                                    <br>
                                    : <span
                                        class="{{ $route->http_req == 'post' ? 'text-success' : 'text-primary' }}">{{ $route->http_req }}</span>
                                </a>
                            </td>
                            <!--end::Route Name=-->
                            <!--begin::Route URI=-->
                            <td>
                                <a href="{{ $hrefUri }}"
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
                                <div class="col-xl-9">
                                    <div class="middleware form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="{{ $route->id }}"
                                            id="routeStatus_{{ $route->id }}" name="is_auth"
                                            {{ $route->is_auth == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-gray-400 ms-3"
                                            for="routeStatus_{{ $route->id }}">
                                            @switch($route->is_auth)
                                                @case(1)
                                                    Auth
                                                @break

                                                @case(0)
                                                    Guest
                                                @break

                                                @default
                                            @endswitch
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col-xl-9">
                                    <div class="status form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="{{ $route->id }}"
                                            id="routeStatus_{{ $route->id }}" name="is_active"
                                            {{ $route->is_active == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-gray-400 ms-3"
                                            for="routeStatus_{{ $route->id }}">
                                            @switch($route->is_active)
                                                @case(1)
                                                    Active
                                                @break

                                                @case(0)
                                                    Inactive
                                                @break

                                                @default
                                            @endswitch
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <!--end::Is Active=-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-bs-toggle="modal" id="edit_route" data-id="{{ $route->id }}"
                                    data-name="{{ $route->name }}" data-http_req="{{ $route->http_req }}"
                                    data-uri="{{ $route->uri }}" data-controller="{{ $route->controller }}"
                                    data-action="{{ $route->action }}" data-url ="{{ Route('app.route.update') }}"
                                    data-bs-target="#kt_customers_export_modal">Edit
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
                                {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ Route('app.route.details', ['id' => $route->id]) }}"
                                            class="menu-link px-3">edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ Route('app.route') . '?del=' . $route->id }}" class="menu-link px-3"
                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div> --}}
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
    <!--begin::Add Route-->
    @include('adm.modal.add_route')
    <!--end::Add Route-->
    <!--begin::Edit Route-->
    @include('adm.modal.edit_route')
    <!--end::Edit Route-->
    <!--end::Modals-->
@endsection

@section('JS by Content')
    <!--begin::Metronic JS-->
    <script src="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{-- <script src="{{ asset('metronic/js/custom/apps/customers/list/list.js') }}"></script> --}}
    {{-- <script src="{{ asset('metronic/js/custom/apps/customers/list/export.js') }}"></script> --}}
    {{-- <script src="{{ asset('metronic/js/custom/apps/customers/add.js') }}"></script> --}}
    <!--end::Metronic JS-->

    <!--begin::App JS -->
    <script src="{{ asset('app/js/adm/edit_route.js') }}"></script>
    <script src="{{ asset('app/js/adm/add_route.js') }}"></script>
    <!--end::App JS -->
@endsection

@section('javascript')
    <script>
        "use strict";

        var KTCustomersList = (function() {
            var t, e, o, n;

            const initTable = () => {
                n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td"),
                        o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
                    e[5].setAttribute("data-order", o);
                });

                t = $(n).DataTable({
                    info: !1,
                    order: [],
                    columnDefs: [{
                            orderable: !1,
                            targets: 0
                        },
                        {
                            orderable: !1,
                            targets: 6
                        },
                    ],
                });
            };

            const handleSearch = () => {
                document
                    .querySelector('[data-kt-customer-table-filter="search"]')
                    .addEventListener("keyup", function(e) {
                        t.search(e.target.value).draw();
                    });
            };

            const handleFilters = () => {
                e = $('[data-kt-customer-table-filter="month"]');
                o = document.querySelectorAll(
                    '[data-kt-customer-table-filter="request_method"] [name="request_method"]'
                );

                document
                    .querySelector('[data-kt-customer-table-filter="filter"]')
                    .addEventListener("click", function() {
                        const n = e.val();
                        let c = "";
                        o.forEach((t) => {
                            t.checked && (c = t.value), "all" === c && (c = "");
                        });
                        const r = c;
                        t.search(r).draw();
                    });

                document
                    .querySelector('[data-kt-customer-table-filter="reset"]')
                    .addEventListener("click", function() {
                        e.val(null).trigger("change");
                        (o[0].checked = !0);
                        t.search("").draw();
                    });
            };

            return {
                init: function() {
                    n = document.querySelector("#kt_customers_table");

                    if (n) {
                        initTable();
                        handleSearch();
                        handleFilters();
                    }
                },
            };
        })();

        KTUtil.onDOMContentLoaded(function() {
            KTCustomersList.init();
        });
    </script>

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("kt_add_customer").click();
            });
        </script>
    @endif
@endsection
