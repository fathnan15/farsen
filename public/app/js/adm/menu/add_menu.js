"use strict";

var ModalMenuAdd = (function () {
    var m, f, s, c, x, i, p, v;

    var handleIconPreview = function () {
        i.addEventListener("change", function () {
            var iconValue = i.value.split(" ");
            p.className = "";
            if (iconValue) {
                p.classList.add(iconValue[0], iconValue[1]);
            } else {
                p.classList.add("fas", "fa-yin-yang");
            }
        });
    };

    return {
        init: function () {
            (m = new bootstrap.Modal(
                document.querySelector("#modal_add_menu")
            )),
                (f = document.querySelector("#modal_add_menu_form")),
                (s = f.querySelector("#modal_add_menu_submit")),
                (c = f.querySelector("#modal_add_menu_cancel")),
                (x = f.querySelector("#modal_add_menu_close")),
                (i = f.querySelector("#icon")),
                (p = document.querySelector("#icon_preview")),
                (v = FormValidation.formValidation(f, {
                    fields: {
                        menu_nm: {
                            validators: {
                                notEmpty: {
                                    message: "Menu Name is required",
                                },
                                stringLength: {
                                    min: 5,
                                    max: 32,
                                    message:
                                        "Menu Name has to be between 5 and 32 characters long",
                                },
                            },
                        },
                        path: {
                            validators: {
                                notEmpty: {
                                    message: "Menu Path is required",
                                },
                                regexp: {
                                    regexp: /^[a-z-]+$/,
                                    message:
                                        "Menu Path can only consist of lower-case alphabetical and dash-separated",
                                },
                                stringLength: {
                                    max: 16,
                                    message:
                                        "Menu Path has to be less than 16 characters long",
                                },
                            },
                        },
                        icon: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "FontAwesome icon class is required",
                                },
                                regexp: {
                                    regexp: /^(fas|far)\sfa-[\w-]+$/,
                                    message:
                                        "The icon must start with 'fas' or 'far' and be a valid FontAwesome icon class.",
                                },
                            },
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                }));

            s.addEventListener("click", function (e) {
                e.preventDefault();
                v &&
                    v.validate().then((status) => {
                        "Invalid" === status
                            ? Swal.fire({
                                  text: "Sorry, it seems that there are some errors detected, please try again.",
                                  icon: "error",
                                  buttonsStyling: false,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn btn-primary",
                                  },
                              })
                            : s.setAttribute("data-kt-indicator", "on"),
                            (s.disabled = true),
                            f.submit();
                    });
            });

            c.addEventListener("click", function (e) {
                e.preventDefault();
                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then(function (t) {
                    t.value
                        ? (f.reset(), m.hide())
                        : "cancel" === t.dismiss &&
                          Swal.fire({
                              text: "Your form has not been cancelled!.",
                              icon: "error",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn btn-primary",
                              },
                          });
                });
            });

            x.addEventListener("click", function (e) {
                e.preventDefault();
                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light",
                    },
                }).then(function (t) {
                    t.value
                        ? (f.reset(), m.hide())
                        : "cancel" === t.dismiss &&
                          Swal.fire({
                              text: "Your form has not been cancelled!.",
                              icon: "error",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn btn-primary",
                              },
                          });
                });
            });

            handleIconPreview();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    ModalMenuAdd.init();
});
