var old_page = null;
var old_sub_page = null;

function page(page) {
	$.ajax({
		type: "get",
		url: page,
		beforeSend: function () {
			document.getElementById("loading").style.display = "block";
			if (old_page) {
				document.getElementById(old_page).classList.remove("active");
			}
			old_page = page;
		},
		success: function (response) {
			$("#kt_content").html(response);
		},
		complete: function () {
			document.getElementById("loading").style.display = "none";
			document.getElementById(page).classList.add("active");
		},
	});
}

function sub_page(id) {
	let page = id.substr(0, id.search(/_x_/i));
	let sub_page = id.substr(id.search(/_x_/i) + 3, id.length);
	window.location.replace(page + "/" + sub_page);
}

function closeflashmodal() {
	$("#flashmodal").remove();
}

function openModal() {
	$("#menu_detail").addClass("show");
	$("#menu_detail").after('<div class="modal-backdrop fade show"></div>');
	$("#menu_detail").css("display", "block");
	$("body").addClass("modal-open");
	$("body").css({
		overflow: "hidden",
		"padding-right": "17px",
	});
}
function closeModal() {
	$("div .modal-backdrop").remove();
	$("#menu_detail").removeClass("show");
	$("#menu_detail").css("display", "");
	$("body").removeClass("modal-open");
	$("body").removeAttr("style");
}
