<div class="modal fade" id="modal_add_menu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ Route('app.route') }}" method="POST" id="modal_add_menu_form">
                @csrf
                <div class="modal-header" id="modal_add_menu_header">
                    <h2 class="fw-bolder">Add New Route</h2>
                    <div id="modal_add_menu_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="modal_add_menu_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#modal_add_menu_header"
                        data-kt-scroll-wrappers="#modal_add_menu_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">HTTP Request Method</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="HTTP Request Method"></i>
                            </label>
                            <select name="http_req" aria-label="Select a Http Request Method" data-control="select2"
                                data-placeholder="Select a Http Request Method..."
                                data-dropdown-parent="#modal_add_menu" class="form-select form-select-solid fw-bolder">
                                <option value="">Select a Method...</option>
                                <option value="get">Get</option>
                                <option value="post">Post</option>
                            </select>
                            @error('http_req')
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">Route Name</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Must Valid Route Name"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">URI</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Must Valid URI ex: adm/app/route"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                name="uri" />
                        </div>
                        <div class="row g-9 mb-7">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Controller Name</label>
                                <input class="form-control form-control-solid" placeholder="" name="controller" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Controller Method</label>
                                <input class="form-control form-control-solid" placeholder="" name="action" />
                            </div>
                        </div>
                        <div class="fv-row mb-7">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-6 fw-bold">Does the route require user authentication?</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="is_auth" type="checkbox" value="1"
                                        id="modal_add_menu_is_auth" checked="checked" />
                                    <span class="form-check-label fw-bold text-muted"
                                        for="modal_add_menu_is_auth">Yes</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="modal_add_menu_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="modal_add_menu_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
