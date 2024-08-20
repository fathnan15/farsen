<div class="modal fade" id="editRouteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Route: <span id="routeName"></span></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <button id="closeEditRouteModal" class="btn btn-icon btn-sm btn-active-icon-primary" type="button">
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
                </button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="editRouteForm" class="form">
                    @csrf
                    <input type="hidden" name="id" id="routeId" value="">
                    <div class="fv-row mb-7">
                        <label class="fs-5 fw-bold form-label mb-5">HTTP Request Method:</label>
                        <select data-control="select2" data-placeholder="Select a Method..." data-hide-search="true"
                            name="http_req" id="routeHttpMethod" class="form-select form-select-solid">
                            <option value="get">Get</option>
                            <option value="post">Post</option>
                        </select>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">
                            <span class="required">Route Name</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Must be a valid Route Name"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="name" id="routeNameInput"
                            value="">
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">
                            <span class="required">URI</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="uri" id="routeUriInput"
                            value="">
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">
                            <span class="required">Controller</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="controller"
                            id="routeControllerInput" value="">
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">
                            <span class="required">Action</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="action"
                            id="routeActionInput" value="">
                    </div>
                    <div class="text-center">
                        <button type="reset" id="cancelEditRoute" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Discard</button>
                        <button type="submit" id="submitEditRoute" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
