;
(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR, itemVM = {
		//image_file_name: ko.observable(),
		 image_file_name: ko.observable(),
		category_id : ko.observable(),
		code : ko.observable(),
		name : ko.observable(),
		quantity : ko.observable(1),
		unit : ko.observable(),
		cost : ko.observable(),
		price : ko.observable(),
		description : ko.observable(),
	}, iVM = itemVM;

	var x = w.INVENTO.XHR,
		itemVM = {
			image_file_name: ko.observable(),
			category_id: ko.observable(),
			code: ko.observable(),
			name: ko.observable(),
			quantity: ko.observable(1),
			unit: ko.observable(),
			cost: ko.observable(),
			price: ko.observable(),
			description: ko.observable(),
		},
		iVM = itemVM;

	iVM.handleSubmit = function() {

		var data = ko.toJS(iVM);
	//	data.image_file_name = data.image_file_name.replace(/^data:image\/(png|jpg);base64,/, '');
		delete daat.edit;
		delete data.handleSubmit;
		delete data.handleUpdate;
		console.log(data);

		x.post("items/save", data).done(function(res) {
			w.notif("New item saved!", "success");

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
		});
	};

	iVM.edit = function(itemID) {
		var me = this;
		x.getJ("items/getOne/" + itemID).done(function(res) {
			if (res) {
				me.category_id(res.category_id);
				me.image_file_name(res.image_file_name);
				me.category_id(res.category_id);
				me.code(res.code);
				me.name(res.name);
				me.quantity(res.quantity);
				me.unit(res.unit);
				me.cost(res.cost);
				me.price(res.price);
				me.description(res.description);
				$("#editItemModal").modal("show");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}.bind(iVM);

	iVM.handleUpdate = function() {
		var data = ko.toJS(iVM);
		delete daat.edit;
		delete data.handleSubmit;
		delete data.handleUpdate;

		console.log(data);
	};

	w.INVENTO.VM.itemVM = iVM;

}(window, jQuery, ko));