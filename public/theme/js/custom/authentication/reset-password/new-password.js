"use strict";
var KTAuthNewPassword = (function () {
    var t,
        e,
        r,
        o,
        a = function () {
            return 100 === o.getScore();
        };
    return {
        init: function () {
            (t = document.querySelector("#kt_new_password_form")),
                (e = document.querySelector("#kt_new_password_submit")),
                (o = KTPasswordMeter.getInstance(t.querySelector('[data-kt-password-meter="true"]'))),
                (r = FormValidation.formValidation(t, {
                    fields: {
                        email: { validators: { regexp: { regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: "The value is not a valid email address" }, notEmpty: { message: "Email address is required" } } }, 
                        password: {
                            validators: {
                                notEmpty: { message: "The password is required" },
                                callback: {
                                    message: "Please enter valid password",
                                    callback: function (t) {
                                        if (t.value.length > 0) return a();
                                    },
                                },
                            },
                        },
                        "password_confirmation": {
                            validators: {
                                notEmpty: { message: "The password confirmation is required" },
                                identical: {
                                    compare: function () {
                                        return t.querySelector('[name="password"]').value;
                                    },
                                    message: "The password and its confirm are not the same",
                                },
                            },
                        },
                        toc: { validators: { notEmpty: { message: "You must accept the terms and conditions" } } },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                e.addEventListener("click", function (a) {
                    a.preventDefault(),
                        r.revalidateField("password"),
                        r.validate().then(function (r) {
                            "Valid" == r
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                  (e.disabled = !0),
                                  setTimeout(function () {
                                    document.getElementById("kt_new_password_form").submit();
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
                t.querySelector('input[name="password"]').addEventListener("input", function () {
                    this.value.length > 0 && r.updateFieldStatus("password", "NotValidated");
                });
        },
    };
})();

function error() {
  Swal.fire({
      text: "Token Invalid, Please try again.",
      icon: "error",
      buttonsStyling: !1,
      confirmButtonText: "Try Again!",
      customClass: { confirmButton: "btn btn-primary" },
  }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "/password/reset";
    }
  });
}

KTUtil.onDOMContentLoaded(function () {
    KTAuthNewPassword.init();
});
