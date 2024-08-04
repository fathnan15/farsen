"use strict";

var KTEditRoute = (function () {
    var modalElement, modalInstance, formElement, submitButton, cancelButton, closeButton, formValidation, apiUrl;

    return {
        init: function () {
            modalElement = document.querySelector("#editRouteModal");
            modalInstance = new bootstrap.Modal(modalElement);
            formElement = document.querySelector("#editRouteForm");
            submitButton = formElement.querySelector("#submitEditRoute");
            cancelButton = formElement.querySelector("#cancelEditRoute");
            closeButton = modalElement.querySelector("#closeEditRouteModal");

            formValidation = FormValidation.formValidation(formElement, {
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
            });

            submitButton.addEventListener("click", function (event) {
                event.preventDefault();

                formValidation.validate().then(function (status) {
                    if (status === 'Valid') {
                        var formData = new FormData(formElement);
                        fetch(apiUrl, {
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
                                }).then(function (result) {
                                    if (result.isConfirmed) {
                                        modalInstance.hide();
                                    }
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
                        .catch(() => {
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
            });

            cancelButton.addEventListener("click", function (event) {
                event.preventDefault();
                modalInstance.hide();
            });

            closeButton.addEventListener("click", function (event) {
                event.preventDefault();
                modalInstance.hide();
            });

            document.querySelectorAll('.edit-route-button').forEach(button => {
                button.addEventListener('click', function () {
                    document.querySelector('#routeId').value = this.dataset.id;
                    document.querySelector('#routeNameInput').value = this.dataset.name;
                    document.querySelector('#routeHttpMethod').value = this.dataset.http_req;
                    document.querySelector('#routeUriInput').value = this.dataset.uri;
                    document.querySelector('#routeControllerInput').value = this.dataset.controller;
                    document.querySelector('#routeActionInput').value = this.dataset.action;
                    $('#routeHttpMethod').val(this.dataset.http_req).trigger('change');

                    apiUrl = this.dataset.url;
                });
            });

            document.querySelectorAll('.status-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    let routeId = this.value;
                    let isActive = this.checked ? 1 : 0;

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
                            fetch(apiUrl, {
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
                            .catch(() => {
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

            document.querySelectorAll('.middleware-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    let routeId = this.value;
                    let isAuth = this.checked ? 1 : 0;

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
                            fetch(apiUrl, {
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
                            .catch(() => {
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
    KTEditRoute.init();
});
