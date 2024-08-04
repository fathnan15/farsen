"use strict";

var RoutesList = (function() {
    var t, e, o, n;

    const initTable = () => {
        n.querySelectorAll("tbody tr").forEach((t) => {
            const e = t.querySelectorAll("td"),
                o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
            e[5].setAttribute("data-order", o);
        });

        t = $(n).DataTable({
            info: !1,
            order: [],
            columnDefs: [{
                    orderable: !1,
                    targets: 0
                },
                {
                    orderable: !1,
                    targets: 6
                },
            ],
        });
    };

    const handleSearch = () => {
        document
            .querySelector('[data-kt-route-table-filter="search"]')
            .addEventListener("keyup", function(e) {
                t.search(e.target.value).draw();
            });
    };

    const handleFilters = () => {
        e = $('[data-kt-route-table-filter="month"]');
        o = document.querySelectorAll(
            '[data-kt-route-table-filter="request_method"] [name="request_method"]'
        );

        document
            .querySelector('[data-kt-route-table-filter="filter"]')
            .addEventListener("click", function() {
                const n = e.val();
                let c = "";
                o.forEach((t) => {
                    t.checked && (c = t.value), "all" === c && (c = "");
                });
                const r = c;
                t.search(r).draw();
            });

        document
            .querySelector('[data-kt-route-table-filter="reset"]')
            .addEventListener("click", function() {
                e.val(null).trigger("change");
                (o[0].checked = !0);
                t.search("").draw();
            });
    };

    return {
        init: function() {
            n = document.querySelector("#routes_table");

            if (n) {
                initTable();
                handleSearch();
                handleFilters();
            }
        },
    };
})();

KTUtil.onDOMContentLoaded(function() {
    RoutesList.init();
});