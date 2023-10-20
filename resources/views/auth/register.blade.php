@extends('layouts.auth')
@section('title',' | Register')

@section('content')
<!--begin::Wrapper-->
<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form action="register" method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
        <!--begin::Heading-->
        <div class="mb-5 text-center">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Form Registration</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                <a href="/asc_ci2" class="link-primary fw-bolder">Login here</a>
            </div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->
        <!--begin::Separator-->
        <div class="d-flex align-items-center mb-5">
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            <!-- <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span> -->
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
        </div>
        <!--end::Separator-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Username</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
            <div class="invalid-feedback">
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Full Name</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off" />
            <div class="invalid-feedback">
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-5 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid " type="password" placeholder="" name="password" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye fs-2 d-none"></i>
                        <i class="bi bi-eye-slash fs-2"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">
                <div>
                    Use 6 or more characters with a mix of letters, numbers &amp; symbols.
                </div>
             </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirmPassword" autocomplete="off" />
            <div class="invalid-feedback">
            </div>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->

@endsection