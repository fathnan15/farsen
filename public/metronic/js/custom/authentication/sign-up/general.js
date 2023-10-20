"use strict";
var KTSignupGeneral = (function () {
	var e,
		t,
		a,
		s,
		r = function () {
			return 100 === s.getScore();
		};
	return {
		init: function () {
			(e = document.querySelector("#kt_sign_up_form")),
				(t = document.querySelector("#kt_sign_up_submit")),
				(s = KTPasswordMeter.getInstance(
					e.querySelector('[data-kt-password-meter="true"]')
				)),
				(a = FormValidation.formValidation(e, {
					fields: {
						username: {
							validators: { notEmpty: { message: "Username is required" } },
						},
						name: {
							validators: { notEmpty: { message: "Full Name is required" } },
						},
						password: {
							validators: {
								notEmpty: { message: "The password is required" },
								callback: {
									message: "Please enter valid password",
									callback: function (e) {
										if (e.value.length > 6) return r();
									},
								},
							},
						},
						"confirm-password": {
							validators: {
								notEmpty: { message: "The password confirmation is required" },
								identical: {
									compare: function () {
										return e.querySelector('[name="password"]').value;
									},
									message: "The password and its confirm are not the same",
								},
							},
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger({
							event: { password: !1 },
						}),
						bootstrap: new FormValidation.plugins.Bootstrap5({
							rowSelector: ".fv-row",
							eleInvalidClass: "",
							eleValidClass: "",
						}),
					},
				})),
				t.addEventListener("click", function (r) {
					r.preventDefault(),
						a.revalidateField("password"),
						a.validate().then(function (a) {
							"Valid" == a
								? (t.setAttribute("data-kt-indicator", "on"),
								  (t.disabled = !0),
								  setTimeout(function () {
										t.removeAttribute("data-kt-indicator"),
											(t.disabled = !1),
											Swal.fire({
												text: "You have successfully reset your password!",
												icon: "success",
												buttonsStyling: !1,
												confirmButtonText: "Ok, got it!",
												customClass: { confirmButton: "btn btn-primary" },
											}).then(function (t) {
												t.isConfirmed && (e.reset(), s.reset());
											});
								  }, 1500))
								: Swal.fire({
										text: "Sorry, looks like there are some errors detected, please try again.",
										icon: "error",
										buttonsStyling: !1,
										confirmButtonText: "Ok, got it!",
										customClass: { confirmButton: "btn btn-primary" },
								  });
						});
				}),
				e
					.querySelector('input[name="password"]')
					.addEventListener("input", function () {
						this.value.length > 0 &&
							a.updateFieldStatus("password", "NotValidated");
					});
		},
	};
})();
KTUtil.onDOMContentLoaded(function () {
	KTSignupGeneral.init();
});
