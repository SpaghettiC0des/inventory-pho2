(function(w, j, ko) {
	"use strict";

	function computeSubTotal(o) {
		console.log(o);
	}

	function Item(data) {
		var obj = {
			code: ko.observable(data.code),
			name: ko.observable(data.name),
			expiration_date: ko.observable(),
			quantity: ko.observable(1),
			price: ko.observable(data.price),

		};
		obj.subTotal = ko.pureComputed(function() {
			return (parseFloat(obj.quantity()) * parseFloat(obj.price())).toFixed(2);
		});
		return obj;
	}

	var x = w.INVENTO.XHR,
		purchaseVM = {
			datetime: ko.observable(),
			reference_no: ko.observable(),
			supplier_id: ko.observable(),
			selected_item: ko.observable(),
			items: ko.observableArray([]),
			status: ko.observable(),
		},
		pVM = purchaseVM;

	pVM.selected_item.subscribe(function() {
		if (pVM.selected_item()) {
			pVM.items.push(new Item(pVM.selected_item()));
		}
	});

	pVM.grandTotal = ko.pureComputed(function() {
		var total = 0;
		$.each(pVM.items(), function() {
			total = parseFloat(this.subTotal()) + total;
		});

		return total.toFixed(2);
	});

	pVM.handleSubmit = function() {
		var _items = ko.toJSON(pVM.items());

		var data = {
			reference_no: pVM.reference_no(),
			datetime: moment(pVM.datetime()).format('YYYY-MM-DD hh:mm'),
			supplier_id: pVM.supplier_id(),
			items: _items,
			grand_total: pVM.grandTotal(),
			status: pVM.status()
		}

		x.post("purchases/save", data).done(function(res) {
			w.notif("New Purchase added!", "success");
		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.purchaseVM = pVM;
}(window, jQuery, ko));