@extends('layouts.dashboard')
@section('title-page', ' | ADMINISTRATION')
@section('title-head', 'menu')

@section('content')
    <h1>MENU MANAGEMENT</h1>
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Search-->
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <i class="fas fa-search fa-lg"></i>
                    </span>
                    <input type="text" data-kt-menu-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Menu" />
                </div>
            </div>
            <!--end::Search-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-menu-table-toolbar="base">
                    <!--begin::Add Route-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add_menu"
                        data-bs-target="#modal_add_menu">Add Menu</button>
                    <!--end::Add Route-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="menus_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#menus_table .form-check-input" value="1" disabled hidden />
                            </div>
                        </th>
                        <th class="min-w-125px">Menu Name</th>
                        <th class="min-w-125px">Path</th>
                        <th class="min-w-125px">Icon</th>
                        <th class="min-w-125px">Last Modified</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($menus as $menu)
                        <tr class="menu-row" id="menu_{{ $menu->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $menu->id }}" disabled
                                        hidden />
                                </div>
                            </td>
                            <td data-filter = "{{ $menu->menu_nm }}">
                                <span class="text-gray-800 mb-1">
                                    {{ $menu->menu_nm }}
                                </span>
                            </td>
                            <td>
                                <span class="text-gray-600 mb-1">{{ $menu->path }}</span>
                            </td>
                            <td>
                                <span class="text-gray-600 mb-1">{{ $menu->icon }}</span>
                            </td>
                            <td>
                                {{ $menu->updated_at }}
                            </td>
                            <td class="text-center">
                                <a href="#"
                                    class="detail-btn collapse-detail-btn btn btn-sm btn-light-success btn-active-light-primary"
                                    data-id="{{ $menu->id }}">
                                    <span class="svg-icon svg-icon-1 m-0">
                                        <i class="fas fa-caret-square-down"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex-lg-row-fluid ms-lg-15">
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_customer_view_overview_tab">Overview</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_customer_view_submenu_tab">Submenu</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card body-->
                            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                <!--begin::Option-->
                                <div class="py-5" data-kt-customer-payment-method="row">
                                    <!--begin::Header-->
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div id="kt_customer_view_payment_method_1"
                                        data-bs-parent="#kt_customer_view_payment_method">
                                        <div class="d-flex" style="justify-content: flex-end">
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                                data-bs-original-title="Edit customer details">
                                                <a href="#" class="btn btn-sm btn-light-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_customer">Edit</a>
                                            </span>
                                        </div>
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap py-5">
                                            <!--begin::Col-->
                                            <table class="table table-flush fw-bold gy-1">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-muted min-w-125px w-125px">Menu Name</th>
                                                        <td class="text-gray-800">
                                                            <div class="me-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="text-gray-800 fw-bolder">Administrator
                                                                    </div>
                                                                    <div class="badge badge-light-success ms-5">
                                                                        <a href="#"
                                                                            class="btn-active-light-primary w-30px h-30px"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-kt-menu-trigger="click"
                                                                            data-kt-menu-placement="bottom-start">
                                                                            <span class="svg-icon svg-icon-3">
                                                                                Active
                                                                            </span>
                                                                        </a>
                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                                            data-kt-menu="true">
                                                                            <div class="menu-item px-3">
                                                                                <a href="#" class="menu-link px-3"
                                                                                    data-kt-payment-mehtod-action="set_as_deactive">Deactive</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-muted min-w-125px w-125px">path</th>
                                                        <td class="text-gray-800">**** 8513</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-muted min-w-125px w-125px">Icon</th>
                                                        <td class="text-gray-800"> <span><i
                                                                    class="fas fa-fas fa-prescription"></i></span> 12/2024
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Option-->
                                <div class="separator separator-dashed"></div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade" id="kt_customer_view_submenu_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card body-->
                            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                <!--begin::Option-->
                                <div class="py-0" data-kt-customer-payment-method="row">
                                    <!--begin::Header-->
                                    <div class="py-3 d-flex flex-stack flex-wrap">
                                        <!--begin::Toggle-->
                                        <div class="d-flex align-items-center collapsible rotate collapsed"
                                            data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                            role="button" aria-expanded="false"
                                            aria-controls="kt_customer_view_payment_method_1">
                                            <!--begin::Arrow-->
                                            <div class="me-3 rotate-90">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <img src="{{ asset('metronic/media/icons/duotune/arrows/arr071.svg') }}"
                                                        alt="">
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Arrow-->
                                            <!--begin::Menu Icon-->
                                            <img src="{{ asset('fontawesome/svgs/solid/prescription.svg') }}"
                                                class="w-20px me-3" alt="">
                                            <!--end::Menu Icon-->
                                            <!--begin::Summary-->
                                            <div class="me-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="text-gray-800 fw-bolder">Parent : Submenu</div>
                                                    <div class="badge badge-light-success ms-5">Status</div>
                                                </div>
                                                <div class="text-muted">Last Modified : 2024-08-05 21:59:04</div>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Toggle-->
                                        <!--begin::Toolbar-->
                                        <div class="d-flex my-3 ms-9">
                                            <!--begin::Edit-->
                                            <a href="#"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                                    data-bs-original-title="Edit">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </a>
                                            <!--end::Edit-->
                                            <!--begin::More-->
                                            <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                data-bs-toggle="tooltip" title="" data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end" data-bs-original-title="More Options">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                            fill="black"></path>
                                                        <path opacity="0.3"
                                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-payment-mehtod-action="set_as_deactive">Deactive</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                            <!--end::More-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div id="kt_customer_view_payment_method_1" class="collapse fs-6 ps-10"
                                        data-bs-parent="#kt_customer_view_payment_method">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap py-5">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" />
                                                            </div>
                                                        </td>
                                                        <td class="text-muted min-w-125px w-125px">Name</td>
                                                        <td class="text-gray-800">Emma Smith</td>
                                                    </tr>
                                                    <tr colspan=3>
                                                        <a>add Submenu</a>
                                                        <a>delete</a>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Option-->
                                <div class="separator separator-dashed"></div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    <!--begin::Modal Add Route-->
    {{-- @include('adm.menu.modal.add_menu') --}}
    <!--end::Add Route-->
    <!--begin::Modal Edit Route-->
    {{-- @include('adm.menu.modal.edit_menu') --}}
    <!--end::Edit Route-->
@endsection

@section('JS by Content')
    <!--begin::Metronic JS-->
    <script src="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Metronic JS-->

    <!--begin::App JS -->
    <script src="{{ asset('app/js/adm/menu/menu.js') }}"></script>
    {{-- <script src="{{ asset('app/js/adm/menu/edit_menu.js') }}"></script>
    <script src="{{ asset('app/js/adm/menu/add_menu.js') }}"></script> --}}
    <!--end::App JS -->
@endsection

@section('javascript')
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("add_menu").click();
            });
        </script>
    @endif
@endsection
