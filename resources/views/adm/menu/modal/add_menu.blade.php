<div class="modal fade" id="modal_add_menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ route('app.menu') }}" method="POST" id="modal_add_menu_form">
                @csrf
                <div class="modal-header" id="modal_add_menu_header">
                    <h2 class="fw-bolder">Add New Menu</h2>
                    <div id="modal_add_menu_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            {{-- path: icons/duotune/arrows/arr061.svg --}}
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
                                <span class="required">Menu Name</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Must Valid Menu Name"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="menu_nm"
                                value="{{ old('menu_nm') }}" />
                            @error('menu_nm')
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">Menu Path</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Must Valid Menu Path"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="path"
                                value="{{ old('path') }}" />
                            @error('path')
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required">Icon</span>
                                <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank"
                                    class="fas fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="hint for icons list"></a>
                            </label>
                            {{-- <input type="text" class="form-control form-control-solid" placeholder="" name="icon" value="{{ old('icon') }}" placeholder="ex:fas fa-yin-yang" /> --}}
                            {{-- @error('icon')  
                                <small class="text-danger pl-3">
                                    {{ $message }}
                                </small>
                            @enderror --}}
                            <div class="input-group mb-7">
                                <span class="input-group-text"><i id="icon_preview" class="fas fa-yin-yang"></i></span>
                                <input type="text" class="form-control" placeholder="ex:fas fa-yin-yang"
                                    aria-label="ex:fas fa-yin-yang" id="icon" name="icon"
                                    value="{{ old('icon') }}">
                                @error('icon')
                                    <small class="text-danger pl-3">
                                        {{ $message }}
                                    </small>
                                @enderror
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
