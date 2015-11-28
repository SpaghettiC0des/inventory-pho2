;
(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,_base = w.INVENTO.baseURL,
		itemVM = {
			//image_file_name: ko.observable(),
			image_file_name: ko.observable(),
			category_id: ko.observable(),
			code: ko.observable(),
			name: ko.observable(),
			quantity: ko.observable(1),
			unit: ko.observable(),
			cost: ko.observable(),
			price: ko.observable(),
			description: ko.observable(),
			updateID: ko.observable(),
		},
		iVM = itemVM;

	iVM.handleSubmit = function() {

		var data = ko.toJS(iVM);
		// data.image_file_name = data.image_file_naiVM.replace(/^data:image\/(png|jpg);base64,/, '');
		delete data.edit;
		delete data.handleSubmit;
		delete data.handleUpdate;
		delete data.updateID;

		x.post("items/save", data).done(function(res) {
			$("#addItemModal").modal("hide");
			swal("New Item added!", "", "success");

		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	$("#itemsDT").on("click", ".item-edit", function() {

		// swal({
			// title: "Getting item details.",
			// text: "Please wait...",
			// type: "info",
			// showLoaderOnConfirm: true,
			// showConfirmButton: false,
		// });
		var itemID = $(this).data('item-id');
		iVM.updateID(itemID);
		x.getJ("items/getOne/" + itemID).done(function(res) {
			if (res) {
			$("#editItemImage").html("").append("<input  type=file accept=image/* id=item-image name=item-image>");
				$("#item-image").fileinput({
					browseClass: "btn btn-primary",
					showCaption: false,
					showRemove: false,

					showUpload: false,
					initialPreview: [
						"<img src='" +_base + res.image_file_name + "' class='file-preview-image' alt='No Files was Uploaded'  width='213' height='160'>"
					]
				});
				iVM.category_id(res.category_id);
				iVM.image_file_name(res.image_file_name);
				iVM.category_id(res.category_id);
				iVM.code(res.code);
				iVM.name(res.name);
				iVM.quantity(res.quantity);
				iVM.unit(res.unit);
				iVM.cost(res.cost);
				iVM.price(res.price);
				iVM.description(res.description);

		
			}
		$("#editItemModal").modal("show");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	});

	$("#itemsDT").on("click", ".item-delete", function() {
		var _id = $(this).data("item-id");
		swal({
			title: "Are you sure?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "Cancel",
			closeOnConfirm: false,
			closeOnCancel: true

		}, function(isConfirm) {
			if (isConfirm) {
				x.post("items/delete/" + _id).done(function(res) {
					if (res) {
						$("#itemTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						//swal.close();
						swal("Item deleted!", "", "success");
						//w.notif("District Deleted.", "success");
					}
				}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});


			}
		});

	});

	iVM.handleUpdate = function() {
		// console.log(iVM.updateID());return;
		var data = ko.toJS(iVM);
		delete data.edit;
		delete data.handleSubmit;
		delete data.handleUpdate;
		delete data.updateID;

		x.post("items/update/" + iVM.updateID(), data).done(function(res) {
			//if (res) {
				$("#editItemModal").modal("hide");
				swal("Item Updated!", "", "success");
		//}

		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	w.INVENTO.VM.itemVM = iVM;

}(window, jQuery, ko));