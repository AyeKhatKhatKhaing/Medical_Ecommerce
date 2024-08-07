"use strict";
var KTFormsSelect2Demo = {
    init: function () {
        var e;
        (e = function (e) {
            if (!e.id) return e.text;
            var t = document.createElement("span"),
                n = "";
            return (
                (n +=
                    '<img src="' +
                    e.element.getAttribute("data-kt-select2-country") +
                    '" class="rounded-circle h-20px me-2" alt="image"/>'),
                (n += e.text),
                (t.innerHTML = n),
                $(t)
            );
        }),
            $("#kt_docs_select2_country").select2({
                templateSelection: e,
                templateResult: e,
            }),
            (function () {
                var e = function (e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (
                        (n +=
                            '<img src="' +
                            e.element.getAttribute("data-kt-select2-user") +
                            '" class="rounded-circle h-20px me-2" alt="image"/>'),
                        (n += e.text),
                        (t.innerHTML = n),
                        $(t)
                    );
                };
                $("#kt_docs_select2_users").select2({
                    templateSelection: e,
                    templateResult: e,
                });
            })(),
            (function () {
                var e = function (e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (
                        (n +=
                            '<img src="' +
                            e.element.getAttribute("data-kt-select2-image") +
                            '" class="rounded-circle h-20px me-2" alt="image"/>'),
                        (n += e.text),
                        (t.innerHTML = n),
                        $(t)
                    );
                };
                $("#kt_docs_select2_floating_labels_1").select2({
                    placeholder: "Select coin",
                    minimumResultsForSearch: 1 / 0,
                    templateSelection: e,
                    templateResult: e,
                });
            })(),
            (function () {
                var e = function (e) {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (
                        (n +=
                            '<img src="' +
                            e.element.getAttribute("data-kt-select2-image") +
                            '" class="rounded-circle h-20px me-2" alt="image"/>'),
                        (n += e.text),
                        (t.innerHTML = n),
                        $(t)
                    );
                };
                $("#kt_docs_select2_floating_labels_2").select2({
                    placeholder: "Select coin",
                    minimumResultsForSearch: 1 / 0,
                    templateSelection: e,
                    templateResult: e,
                });
            })(),
            (() => {
                const e = (e) => {
                    if (!e.id) return e.text;
                    var t = document.createElement("span"),
                        n = "";
                    return (
                        (n += '<div class="d-flex align-items-center">'),
                        (n +=
                            '<img src="' +
                            e.element.getAttribute(
                                "data-kt-rich-content-icon"
                            ) +
                            '" class="rounded-circle h-40px me-3" alt="' +
                            e.text +
                            '"/>'),
                        (n += '<div class="d-flex flex-column">'),
                        (n +=
                            '<span class="fs-4 fw-bolder lh-1">' +
                            e.text +
                            "</span>"),
                        (n +=
                            '<span class="text-muted fs-7">' +
                            e.element.getAttribute(
                                "data-kt-rich-content-subcontent"
                            ) +
                            "</span>"),
                        (n += "</div>"),
                        (n += "</div>"),
                        (t.innerHTML = n),
                        $(t)
                    );
                };
                $("#kt_docs_select2_rich_content").select2({
                    placeholder: "Select an option",
                    minimumResultsForSearch: 1 / 0,
                    templateSelection: e,
                    templateResult: e,
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsSelect2Demo.init();
});
