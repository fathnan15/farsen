@extends('layouts.dashboard')
@section('title-page', ' | Settings')
@section('title-head', 'Settings')

@section('content')
    <!--begin::details View-->
    <div class="card card-flush mb-5 mb-xl-10" id="account_settings">
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0 ">
                <h3 class="fw-bolder m-0">Profile Setting</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <form id="kt_profile_setting_form" action="{{ Route('profile.setting') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-7 align-items-center">
                    <label class="col-md-3 fw-bold text-muted" for="avatar">Avatar</label>
                    <div class="col-md-9">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url(@if ($profile->gender == 'f') {{ asset('app/images/avatars/f_default.jpg') }}
                            @else
                            {{ asset('app/images/avatars/m_default.jpg') }} @endif
                                )">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{ asset('app/images/avatars' . '/' . $profile->avatar) }})">
                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg. Max: 1024Kb</div>
                        @error('avatar')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                        <!--end::Hint-->
                    </div>
                </div>
                <!--begin::Row-->
                <div class="row mb-7 align-items-center">
                    <label class="col-md-3 fw-bold text-muted" for="name">Full Name</label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control form-control-md mb-3 mb-lg-0"
                            autocomplete="off" placeholder="First name" value="{{ Str::title($profile->name) }}" />
                        @error('name')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="row mb-7 align-items-center">
                    <!--begin::Label-->
                    <label class="col-md-3 fw-bold text-muted" for="gender">Gender</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-md-9 fv-row">
                        <select name="gender" aria-label="Select a Gender" data-control="select2"
                            data-placeholder="Select a gender..."
                            class="form-select form-select-solid form-select-lg fw-bold">
                            <option value="">Select a Gender...</option>
                            @foreach ($gender as $gender)
                                <option value="{{ $gender }}"
                                    @if ($profile->gender == $gender) @selected(true) @endif>
                                    @switch($gender)
                                        @case('u')
                                            Prefer Not to Say
                                        @break

                                        @case('m')
                                            Male
                                        @break

                                        @case('f')
                                            Female
                                        @break

                                        @default
                                    @endswitch
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-7 align-items-center">
                    <label class="col-md-3 fw-bold text-muted" for="email">Email</label>
                    <div class="col-md-9">
                        <input type="text" name="email" class="form-control form-control-md mb-3 mb-lg-0"
                            autocomplete="off" placeholder="First name"
                            @if (old('email')) value="{{ old('email') }}"
                            @else
                            value="{{ $profile->email }}" @endif />
                        @error('email')
                            <small class="text-danger pl-3">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row mb-7 align-items-center">
                    <label class="col-md-3 fw-bold text-muted" for="birth_dttm">Date of Birth</label>
                    <div class="col-md-9">
                        <input type="date" id="birth_dttm" name="birth_dttm"
                            class="form-control form-control-md mb-3 mb-lg-0" placeholder="First name"
                            value="{{ $profile->date_birth }}" />
                    </div>
                </div> --}}
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary" id="kt_profile_setting_submit">Save Changes</button>
                </div>
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection
@section('JS by Content')
    <script>
        "use strict";
        var KTSigninGeneral = (function() {
            var t, e, i;
            return {
                init: function() {
                    (t = document.querySelector("#kt_profile_setting_form")),
                    (e = document.querySelector("#kt_profile_setting_submit")),
                    (i = FormValidation.formValidation(t, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "The username is required",
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z]+(?:[\'\s][a-zA-Z]+)*$/,
                                        message: "The username can only consist of alphabetical, whitespace and apostrophe",
                                    },
                                    stringLength: {
                                        min: 6,
                                        message: 'The name must be more than 6'
                                    },

                                },
                            },
                            gender: {
                                validators: {
                                    notEmpty: {
                                        message: "Please select a gender",
                                    },
                                },
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "Email is required"
                                    },
                                    emailAddress: {
                                        message: "The value is not a valid email address",
                                    },
                                },
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".row",
                            }),
                        },
                    })),
                    $(e.querySelector('[name="country"]')).on(
                            "change",
                            function() {
                                t.revalidateField("country");
                            }
                        ),
                        e.addEventListener("click", function(n) {
                            n.preventDefault(),
                                i.validate().then(function(i) {
                                    "Invalid" == i
                                        ?
                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary",
                                            },
                                        }) :
                                        t.submit();
                                });
                        });
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function() {
            KTSigninGeneral.init();
        });
    </script>
@endsection
