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
                    {{-- <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-filter fa-lg"></i>
                        </span>
                        Filter
                    </button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <label class="form-label fs-5 fw-bold mb-3">Request Method:</label>
                                <div class="d-flex flex-column flex-wrap fw-bold"
                                    data-kt-menu-table-filter="request_method">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="request_method" value="all"
                                            checked="checked" />
                                        <span class="form-check-label text-gray-600">All</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="request_method"
                                            value="get" />
                                        <span class="form-check-label text-gray-600">Get</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="request_method"
                                            value="post" />
                                        <span class="form-check-label text-gray-600">Post</span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-menu-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-menu-table-filter="filter">Apply</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Filter--> --}}
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
                        <tr id="menu_{{ $menu->id }}">
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
                            <td>{{ $menu->updated_at }}</td>
                            {{-- <td>
                                <div class="col-xl-9">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="middleware-checkbox form-check-input" type="checkbox"
                                            value="{{ $menu->id }}" id="menuStatus_{{ $menu->id }}" name="is_auth"
                                            {{ $menu->is_auth == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-gray-400 ms-3"
                                            for="menuStatus_{{ $menu->id }}">
                                            @switch($menu->is_auth)
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
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="status-checkbox form-check-input" type="checkbox"
                                            value="{{ $menu->id }}" id="menuStatus_{{ $menu->id }}"
                                            name="is_active" {{ $menu->is_active == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-gray-400 ms-3"
                                            for="menuStatus_{{ $menu->id }}">
                                            @switch($menu->is_active)
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
                            </td> --}}
                            <td class="text-center">
                                <a href="#" class="edit-menu-button btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="modal"
                                    id="edit_menu" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}"
                                    data-http_req="{{ $menu->http_req }}" data-uri="{{ $menu->uri }}"
                                    data-controller="{{ $menu->controller }}" data-action="{{ $menu->action }}"
                                    data-url ="" data-bs-target="#editRouteModal">Edit

                                    <span class="svg-icon svg-icon-5 m-0">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    <script src="{{ asset('app/js/adm/menu/edit_menu.js') }}"></script>
    <script src="{{ asset('app/js/adm/menu/add_menu.js') }}"></script>
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
