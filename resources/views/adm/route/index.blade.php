@extends('layouts.dashboard')
@section('title-page', ' | ADMINISTRATION')
@section('title-head', 'route')

@section('content')
    <h1>ROUTE MANAGEMENT</h1>
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
                    <input type="text" data-kt-route-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Route" />
                </div>
            </div>
            <!--end::Search-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-route-table-toolbar="base">
                    <!--begin::Filter-->
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
                                    data-kt-route-table-filter="request_method">
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
                                    data-kt-menu-dismiss="true" data-kt-route-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-route-table-filter="filter">Apply</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Filter-->
                    <!--begin::Add Route-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add_route"
                        data-bs-target="#modal_add_route">Add Route</button>
                    <!--end::Add Route-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="routes_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#routes_table .form-check-input" value="1" disabled hidden />
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
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($routes as $route)
                        @php
                            if ($route->is_active == 0 || Str::contains($route->uri, '')) {
                                $hrefUri = '#';
                            } else {
                                switch (Str::contains($route->uri, '/{')) {
                                    case true:
                                        $hrefUri = '#';
                                        break;
                                    default:
                                        $hrefUri = route($route->name);
                                        break;
                                }
                            }
                        @endphp
                        <tr id="route_{{ $route->id }}">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $route->id }}" disabled
                                        hidden />
                                </div>
                            </td>
                            <td data-filter = "{{ $route->http_req }}">
                                <a href="{{ $hrefUri }}" class="text-gray-800 text-hover-primary mb-1">
                                    {{ $route->name }}
                                    <br>
                                    : <span
                                        class="{{ $route->http_req == 'post' ? 'text-success' : 'text-primary' }}">{{ $route->http_req }}</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{ $hrefUri }}"
                                    class="text-gray-600 text-hover-primary mb-1">{{ $route->uri }}</a>
                            </td>
                            <td>
                                {{ $route->controller }}
                                <br>
                                : {{ $route->action }}
                            </td>
                            <td>{{ $route->updated_at }}</td>
                            <td>
                                <div class="col-xl-9">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input data-action="{{ Route('app.route.update', ['id' => $route->id]) }}"
                                            class="middleware-checkbox form-check-input" type="checkbox"
                                            value="{{ $route->id }}" id="routeStatus_{{ $route->id }}"
                                            name="is_auth" {{ $route->is_auth == 1 ? 'checked' : '' }}>
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
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input data-action="{{ Route('app.route.update', ['id' => $route->id]) }}"
                                            class="status-checkbox form-check-input" type="checkbox"
                                            value="{{ $route->id }}" id="routeStatus_{{ $route->id }}"
                                            name="is_active" {{ $route->is_active == 1 ? 'checked' : '' }}>
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
                            <td class="text-end">
                                <a href="{{ Route('app.route.update', ['id' => $route->id]) }}"
                                    class="edit-route-button btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                    data-bs-toggle="modal" id="edit_route" data-id="{{ $route->id }}"
                                    data-name="{{ $route->name }}" data-http_req="{{ $route->http_req }}"
                                    data-uri="{{ $route->uri }}" data-controller="{{ $route->controller }}"
                                    data-action="{{ $route->action }}" data-bs-target="#editRouteModal">Edit

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
    @include('adm.route.modal.add_route')
    <!--end::Add Route-->
    <!--begin::Modal Edit Route-->
    @include('adm.route.modal.edit_route')
    <!--end::Edit Route-->
@endsection

@section('JS by Content')
    <!--begin::Metronic JS-->
    <script src="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Metronic JS-->

    <!--begin::App JS -->
    <script src="{{ asset('app/js/adm/route/route.js') }}"></script>
    <script src="{{ asset('app/js/adm/route/edit_route.js') }}"></script>
    <script src="{{ asset('app/js/adm/route/add_route.js') }}"></script>
    <!--end::App JS -->
@endsection

@section('javascript')
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("add_route").click();
            });
        </script>
    @endif
@endsection
