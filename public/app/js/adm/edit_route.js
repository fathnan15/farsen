"use strict";

var KTCustomersExport = (function () {
    var t, e, n, o, r, i, a, u;
    return {
        init: function () {
            (t = document.querySelector("#kt_customers_export_modal")),
            (a = new bootstrap.Modal(t)),
            (i = document.querySelector("#kt_customers_export_form")),
            (e = i.querySelector("#kt_customers_export_submit")),
            (n = i.querySelector("#kt_customers_export_cancel")),
            (o = t.querySelector("#kt_customers_export_close")),
            (r = FormValidation.formValidation(i, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: { message: "Route name is required" }
                        }
                    },
                    http_req: {
                        validators: {
                            notEmpty: { message: "HTTP request method is required" }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })),
            e.addEventListener("click", function (t) {
                t.preventDefault();

                r && r.validate().then(function (t) {
                    if (t == 'Valid') {
                        var formData = new FormData(i);
						console.log(formData)
                        fetch(u, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    text: data.message,
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then(function (t) {
                                    t.isConfirmed && a.hide();
                                });
                            } else {
                                Swal.fire({
                                    text: "An error occurred while updating the route.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                text: "An error occurred while updating the route.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        });
                    } else {
                        Swal.fire({
                            text: "Please fill out the form correctly.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                });
            }),
            n.addEventListener("click", function (t) {
                t.preventDefault(), a.hide();
            }),
            o.addEventListener("click", function (t) {
                t.preventDefault(), a.hide();
            });
            document.querySelectorAll('#edit_route').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.querySelector('#edit_route_id').value = this.dataset.id;
                    document.querySelector('#edit_route_name').value = this.dataset.name;
                    document.querySelector('#edit_http_req').value = this.dataset.http_req;
                    document.querySelector('#edit_route_uri').value = this.dataset.uri;
                    document.querySelector('#edit_route_controller').value = this.dataset.controller;
                    document.querySelector('#edit_route_action').value = this.dataset.action;
					$('#edit_http_req').val(this.dataset.http_req).trigger('change');

					u = this.dataset.url

                });
            });
            document.querySelectorAll('.status .form-check-input').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    let routeId = this.value;
                    let isActive = this.checked ? 1 : 0;
                    
                    let url = $('#edit_route').attr('data-url')
            
            
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to change the route status?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: routeId,
                                    is_active: isActive
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Updated!',
                                        data.message,
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred while updating the status.',
                                        'error'
                                    );
                                    this.checked = !isActive;
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while updating the status.',
                                    'error'
                                );
                                this.checked = !isActive;
                            });
                        } else {
                            this.checked = !isActive;
                        }
                    });
                });
            });
            document.querySelectorAll('.middleware .form-check-input').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    let routeId = this.value;
                    let isAuth = this.checked ? 1 : 0;
                    
                    let url = $('#edit_route').attr('data-url')
            
            
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to change the route middleware?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id: routeId,
                                    is_auth: isAuth
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Updated!',
                                        data.message,
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred while updating the middleware.',
                                        'error'
                                    );
                                    this.checked = !isAuth;
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while updating the middleware.',
                                    'error'
                                );
                                this.checked = !isAuth;
                            });
                        } else {
                            this.checked = !isAuth;
                        }
                    });
                });
            });
        }
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCustomersExport.init();
});
