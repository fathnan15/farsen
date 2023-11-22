@extends('layouts.dashboard')
@section('title-page', ' | Account Setting')
@section('title-head', 'Account Setting')

@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Change Password</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <form class="card-body p-9" id="kt_change_password_form" action="{{ Route('account.setting') }}" method="POST">
            @csrf
            <div class="row mb-7 align-items-center">
                <label class="col-md-3 fw-bold text-muted" for="old_password">Old Password</label>
                <div class="col-md-9">
                    <input type="password" id="old_password" name="old_password"
                        class="form-control form-control-md mb-3 mb-lg-0" placeholder="Old Password" />
                    <div class="invalid-feedback">
                    </div>
                    @error('old_password')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-7 align-items-center">
                <label class="col-md-3 fw-bold text-muted" for="new_password">New Password</label>
                <div class="col-md-9">
                    <input type="password" id="new_password" name="new_password"
                        class="form-control form-control-md mb-3 mb-lg-0" placeholder="New Password" />
                    @error('new_password')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-7 align-items-center">
                <label class="col-md-3 fw-bold text-muted" for="new_password_confirmation">Confirm New Password</label>
                <div class="col-md-9">
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                        class="form-control form-control-md mb-3 mb-lg-0" placeholder="Confirm New Password" />
                    @error('new_password_confirmation')
                        <small class="text-danger pl-3">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
                <button type="submit" id="kt_change_password_submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection

@section('javascript')
    <script>
        "use strict";
        var KTChangePassword = (function() {
            var t, e, i;
            return {
                init: function() {
                    (t = document.querySelector("#kt_change_password_form")),
                    (e = document.querySelector("#kt_change_password_submit")),
                    (i = FormValidation.formValidation(t, {
                        fields: {
                            old_password: {
                                validators: {
                                    notEmpty: {
                                        message: "The old password is required.",
                                    },
                                    stringLength: {
                                        min: 6,
                                        message: "The length of the old password must be at least 6 characters."
                                    },
                                    regexp: {
                                        regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
                                        message: "The old password provided does not match any pattern.",
                                    },
                                },
                            },
                            new_password: {
                                validators: {
                                    notEmpty: {
                                        message: "The password is required.",
                                    },
                                    stringLength: {
                                        min: 6,
                                        message: "The length of the new password must be at least 6 characters."
                                    },
                                    regexp: {
                                        regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
                                        message: "The new password must be at least 6 characters long and include at least one digit.",
                                    },
                                },
                            },
                            new_password_confirmation: {
                                validators: {
                                    notEmpty: {
                                        message: "The password confirmation is required."
                                    },
                                    stringLength: {
                                        min: 6,
                                        message: "The length of the new password confirmation must be at least 6 characters."
                                    },
                                    regexp: {
                                        regexp: /^(?=.*\d)[A-Za-z\d]{6,}$/,
                                        message: "The new password confirmation must be at least 6 characters long and include at least one digit.",
                                    },
                                    identical: {
                                        compare: function() {
                                            return e.querySelector('[name="new_password"]').value
                                        },
                                        message: "The password and its confirm are not the same"
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
            KTChangePassword.init();
        });
    </script>
@endsection
