"use strict";

var RoutesList = (function () {
    var t, o, n;

    const initTable = () => {
        n.querySelectorAll("tbody tr.menu-row").forEach((t) => {
            const e = t.querySelectorAll("td"),
                o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
            e[5].setAttribute("data-order", o);
        });

        t = $(n).DataTable({
            info: !1,
            order: [],
            columnDefs: [
                {
                    orderable: !1,
                    targets: 0,
                },
                {
                    orderable: !1,
                    targets: 5,
                },
            ],
        });
    };

    const handleSearch = () => {
        document
            .querySelector('[data-kt-menu-table-filter="search"]')
            .addEventListener("keyup", function (e) {
                t.search(e.target.value).draw();
            });
    };

    const handleDetailExpand = () => {
        const detailButtons = document.querySelectorAll(".detail-btn");
        detailButtons.forEach((button) => {
            button.addEventListener("click", function (e) {
                // e.preventDefault();
                const id = this.getAttribute("data-id");
                const menuRow = document.getElementById(`menu_${id}`);
                const submenuRows = document.querySelectorAll(`.submenu`);

                submenuRows.forEach((r) => {
                    r.remove();
                });

                if (this.classList.contains("collapse-detail-btn")) {
                    this.classList.remove(
                        "collapse-detail-btn",
                        "btn-light-success"
                    );
                    this.classList.add("expand-detail-btn", "btn-light-danger");
                    this.querySelector("i").classList.replace(
                        "fa-caret-square-down",
                        "fa-minus-square"
                    );

                    let submenu = `<tr class='submenu text-center menu-row' id=submenu_${id}>
                    <td colspan=6>
                        <table class="table table-row">
                            <thead>
                                <tr>
                                    <th>Submenu Name</th>
                                    <th>Path</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>submenu.submenu_nm</td>
                                    <td>submenu.path</td>
                                    <td> Actions </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                `;
                    menuRow.insertAdjacentHTML("afterend", submenu);
                } else {
                        this.classList.remove(
                            "expand-detail-btn",
                            "btn-light-danger"
                        );
                        this.classList.add(
                            "collapse-detail-btn",
                            "btn-light-success"
                        );
                        this.querySelector("i").classList.replace(
                            "fa-minus-square",
                            "fa-caret-square-down"
                        );
                }

                detailButtons.forEach((btn) => {
                    if(btn !== this){
                        btn.classList.remove(
                            "expand-detail-btn",
                            "btn-light-danger"
                        );
                        btn.classList.add(
                            "collapse-detail-btn",
                            "btn-light-success"
                        );
                        btn.querySelector("i").classList.replace(
                            "fa-minus-square",
                            "fa-caret-square-down"
                        );
                    }
                });
            });
        });
    };

    return {
        init: function () {
            n = document.querySelector("#menus_table");

            if (n) {
                initTable();
                handleSearch();
                handleDetailExpand();
            }
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    RoutesList.init();
});

$(document).ready(function () {
    var table = $("#routes_table").DataTable();

    table.on("draw", function () {
        KTEditRoute.init();
    });
});
