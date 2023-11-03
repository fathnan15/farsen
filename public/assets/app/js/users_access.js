document
	.querySelector('[data-dismiss="modal"]')
	.addEventListener("click", function () {
		var modal = document.getElementById("modal_update_uam");
		modal.style.display = "none";
		modal.classList.remove("show");
		modal.removeAttribute("aria-modal");
		modal.removeAttribute("role");
		modal.setAttribute("aria-hidden", "true");
		document.querySelector(".modal-backdrop").remove();
		document.getElementById("kt_body").classList.remove("modal-open");
		document.getElementById("kt_body").removeAttribute("style");
		document.querySelector("#uam_assign_to tr").remove();
	});

function edituam(c, id, u_nm) {
	document.querySelector(".modal-header h2").innerHTML =
		"Update User Access For : <u>" + u_nm + "</u>";
	document.querySelector('input[name="user_id"]').setAttribute("value", id);
	document
		.querySelector("#kt_modal_update_permission_form button")
		.setAttribute("value", id);

	$.ajax({
		type: "GET",
		data: {
			c: c,
			user_id: id,
		},
		url: "users_access",
		success: function (response) {
			$("#uam_assign_to").html(response);
		},
	});
}

function add_access(c, u_id) {
	if (c == "get_list") {
		$.ajax({
			url: "users_access",
			type: "GET",
			data: {
				c: c,
				user_id: u_id,
			},
			success: function (response) {
				$("#add_access_button").fadeOut();
				$("#uam_assign_to").append(response).fadeIn();
			},
		});
	}
	if (c == "add_access") {
		var menu_id = $("#option_add_access").val();
		$.ajax({
			url: "users_access",
			type: "POST",
			data: {
				c: c,
				menu_id: menu_id,
				user_id: u_id,
			},
			success: function (response) {
				alert(response);
				$.ajax({
					type: "GET",
					data: {
						c: "get_uam",
						user_id: u_id,
					},
					url: "users_access",
					success: function (response) {
						$("#add_access_button").fadeIn();
						$("#uam_assign_to").html(response);
					},
				});
			},
		});
	}
}

function remove_access(e, m_id, u_id) {
	$.ajax({
		url: "users_access",
		type: "POST",
		data: {
			c: "drop",
			menu_id: m_id,
			user_id: u_id,
		},
		success: function (response) {
			alert(response);
			$.ajax({
				type: "GET",
				data: {
					c: "get_uam",
					user_id: u_id,
				},
				url: "users_access",
				success: function (response) {
					$("#add_access_button").fadeIn();
					$("#uam_assign_to").html(response);
				},
			});
		},
	});
}
