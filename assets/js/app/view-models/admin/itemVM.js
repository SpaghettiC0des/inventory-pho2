;
(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,
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
			w.notif("New item saved!", "success");

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
		});
	};

	$(".table").on("click", ".item-edit", function() {
		var itemID = $(this).data('item-id');
		iVM.updateID(itemID);
		x.getJ("items/getOne/" + itemID).done(function(res) {
			if (res) {
				iVM.category_id(res.category_id);
				iVM.category_id(res.category_id);
				iVM.code(res.code);
				iVM.name(res.name);
				iVM.quantity(res.quantity);
				iVM.unit(res.unit);
				iVM.cost(res.cost);
				iVM.price(res.price);
				iVM.description(res.description);

				$("#editItemModal").modal("show");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
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
			if (res) {
				swal("Item Updated!", "", "success");
			}

		}).fail(function() {
			swal("Whoops!", "", "error");
		});
	};

	w.INVENTO.VM.itemVM = iVM;

}(window, jQuery, ko));