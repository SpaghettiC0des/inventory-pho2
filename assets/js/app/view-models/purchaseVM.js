(function(w, j, ko) {
	var x = w.INVENTO.XHR,
		purchaseVM = {
			date: ko.observable(),
			reference_no: ko.observable(),
			supplier_id: ko.observable(),
			selected_item: ko.observable(),
			items: ko.observableArray(),;
		}

	pVM.handleSubmit = function() {

		x.post("purchases/save", data).done(function(res) {
			w.notif("New Purchase added!", "success");
		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
		}
		var data = ko.toJS(pVM);
		delete data.handleSubmit;);
	}
	"use strict";,
		pVM = purchaseVM;;

	w.INVENTO.VM.purchaseVM = pVM;
}(window, jQuery, ko));