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
                e.preventDefault();
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

                    let loadingRow = `
                        <tr class='submenu menu-row' id=submenu_${id}>
                            <td colspan=6>
                                <div class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        `;
                    menuRow.insertAdjacentHTML("afterend", loadingRow);

                    fetchMenuDetails(id);
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
                    if (btn !== this) {
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

    const fetchMenuDetails = (id) => {
        fetch(`/adm/app/menu/${id}/details`)
            .then((response) => response.json())
            .then((data) => {
                updateMenuDetails(id, data);
            })
            .catch((error) => {
                console.error("Error:", error);
                showErrorMessage(id);
            });
    };

    const updateMenuDetails = (id, data) => {
        const submenuRow = document.getElementById(`submenu_${id}`);
        if (submenuRow) {
            let ren = `
            <td colspan=6>
                <div class="flex-lg-row-fluid ms-10">
                    <ul class="nav nav-tabs border-0 fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-2 active" data-bs-toggle="tab" href="#kt_menu_view_overview_tab">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-2" data-bs-toggle="tab" href="#kt_menu_view_submenu_tab">Submenu</a>
                        </li>
                    </ul>
                    <div class="tab-content rounded border-primary border border-dashed" id="tabContentMenu_${id}">
                        <div class="tab-pane fade show active" id="kt_menu_view_overview_tab" role="tabpanel">
                            <div class="card">
                                <div id="kt_menu_view" class="card-body px-5 px-5 bg-light-dark">
                                    <div data-kt-menu="row">
                                        <div id="kt_menu_view_1" data-bs-parent="#kt_menu_view">
                                            <div class="d-flex px-4" style="justify-content: flex-end">
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit menu details" data-bs-original-title="Edit menu details">
                                                    <a href="#" class="btn btn-sm btn-light-warning" data-bs-toggle="modal" data-bs-target="#kt_modal_update_menu">Edit</a>
                                                </span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <table class="table table-flush fw-bold gy-1">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-muted min-w-125px w-125px">Menu Name</th>
                                                            <td class="text-gray-800">
                                                                <div class="me-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="text-gray-800 fw-bolder">
                                                                            ${
                                                                                data.menu_nm
                                                                            }
                                                                        </div>
                                                                        <div class="badge badge-light-${
                                                                            data.is_active ===
                                                                            0
                                                                                ? `danger`
                                                                                : `success`
                                                                        } ms-5">
                                                                            <a href="#" class="btn-active-light-primary ${
                                                                                data.is_active ===
                                                                                0
                                                                                    ? `text-danger`
                                                                                    : ``
                                                                            } w-30px h-30px" data-bs-toggle="tooltip" data-id=${
                data.id
            } title="click to ${
                data.is_active === 0 ? `set active` : `set inactive`
            }" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                                                                <span class="svg-icon svg-icon-3">
                                                                                    ${
                                                                                        data.is_active ===
                                                                                        0
                                                                                            ? `inactive`
                                                                                            : `active`
                                                                                    }
                                                                                </span>
                                                                            </a>
                                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded fw-bold w-150px py-3"
                                                                            data-kt-menu="true">
                                                                            <div class="menu-item px-3">
                                                                                ${
                                                                                    data.is_active ===
                                                                                    0
                                                                                        ? `<a href="#" class="menu-status menu-link btn-active-light-primary btn-success px-3" style="justify-content:center" data-id="${data.id}"
                                                                                    data-status="1">Activated`
                                                                                        : `<a href="#" class="menu-link btn-active-light-primary btn-danger px-3" style="justify-content:center" data-id="${data.id}"
                                                                                    data-status="0">Deactivated`
                                                                                }</a>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted min-w-125px w-125px">path</th>
                                                            <td class="text-gray-800">${
                                                                data.path
                                                            }</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted min-w-125px w-125px">Icon</th>
                                                            <td class="text-gray-800">
                                                                <span>
                                                                    <i class="${
                                                                        data.icon
                                                                    }">
                                                                    </i>
                                                                </span>
                                                                |
                                                                ${data.icon}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_menu_view_submenu_tab" role="tabpanel">
                            <div class="card">
                                <div id="kt_menu_view" class="card-body px-5 px-5 bg-light-dark">
                                    <div data-kt-menu="row">
                                        <div id="kt_menu_view_1" data-bs-parent="#kt_menu_view">
                                            <div class="d-flex px-4" style="justify-content: flex-end">
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit menu details" data-bs-original-title="Edit menu details">
                                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_menu">Add New Sub Menu</a>
                                                </span>
                                            </div>
                                            <div class="table-responsive">
                                            <table class="table text-center align-middle table-striped table-row-bordered gy-5 gs-7 no-footer">
                                                <thead class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                    <tr>
                                                        <th></th>
                                                        <th>Menu Name</th>
                                                        <th>Route</th>
                                                        <th>Last Modified</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fw-bold text-gray-800">
                                                    ${data.sub_menu
                                                        .map(
                                                            (submenu) => `
                                                        <tr>
                                                            <td>
                                                             ${
                                                                 submenu.route_nm !==
                                                                 null
                                                                     ? ""
                                                                     : `<a href="#" class="btn btn-sm btn-active-light-primary" data-bs-toggle="collapse" data-bs-target="#child_${submenu.id}">
                                                                     <i class="far fa-arrow-alt-circle-right"></i>

                                                                </a>`
                                                             }
                                                            </td>
                                                            <td>${
                                                                submenu.submenu_nm
                                                            }</td>
                                                            <td>${
                                                                submenu.route_nm
                                                            }</td>
                                                            <td>${new Date(
                                                                submenu.updated_at
                                                            ).toLocaleString()}</td>
                                                            <td>${
                                                                submenu.is_active !==
                                                                0
                                                                    ? "active"
                                                                    : "inactive"
                                                            }</td>
                                                            <td>
                                                                <a href="#" class="edit-route-button btn btn-sm btn-light btn-active-light-warning" data-bs-target="#editRouteModal">Edit
                                                                    <span class="svg-icon svg-icon-5 m-0">
                                                                        <i class="fas fa-edit"></i>
                                                                    </span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        ${
                                                            submenu.route_nm !==
                                                            null
                                                                ? ""
                                                                : `
                                                        <tr class="submenu_child collapse" id="child_${
                                                            submenu.id
                                                        }" style="background: rgb(244, 247, 248); border-bottom: 5px solid rgb(239, 242, 245);">
                                                            <td></td>
                                                            <td colspan=5>
                                                                <div class="table-responsive">
                                                                    <table class="table lign-middle table-row-dashed fs-6 gy-5 mb-0 no-footer">
                                                                        <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                                            <th>Child Name</th>
                                                                            <th>Child Route</th>
                                                                            <th>Last Modified</th>
                                                                            <th>Status</th>
                                                                            <th>action</th>
                                                                        </tr>
                                                                ${submenu.children
                                                                    .map(
                                                                        (
                                                                            child
                                                                        ) => `
                                                                        <tr>
                                                                            <td>${
                                                                                child.submenu_nm
                                                                            }</td>
                                                                            <td>${
                                                                                child.route_nm
                                                                            }</td>
                                                                            <td>${new Date(
                                                                                child.updated_at
                                                                            ).toLocaleString()}</td>
                                                                            <td>${
                                                                                child.is_active !==
                                                                                0
                                                                                    ? "Active"
                                                                                    : "Inactive"
                                                                            }</td>
                                                                            <td>btn edit</td>
                                                                        </tr>
                                                                    `
                                                                    )
                                                                    .join("")}
                                                                        <tr>
                                                                            <td colspan="5"><button type="button" class="btn btn-sm btn-primary" id="add_submenu_child" data-menu=${
                                                                                submenu.id
                                                                            }>Add Submenu Child</button></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        `
                                                        }
                                                        `
                                                        )
                                                        .join("")}
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        `;
            submenuRow.innerHTML = ren;

            setTimeout(() => {
                KTMenu.createInstances();
            }, 100);
        }
    };

    const showErrorMessage = (id) => {
        const submenuRow = document.getElementById(`submenu_${id}`);
        if (submenuRow) {
            submenuRow.innerHTML = `
                <td colspan=6>
                    <div class="alert alert-danger" role="alert">
                        An error occurred while fetching menu details. Please try again later.
                    </div>
                </td>
            `;
        }
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

// $(document).ready(function () {
//     var table = $("#routes_table").DataTable();

//     table.on("draw", function () {
//         KTEditRoute.init();
//     });
// });
