;
(function(w, j, ko) {
	"use strict";

	function success(msg) {
		swal("Supplier " + msg + "!", "", "success");
	}

	function error() {
		swal("Something went wrong. Please try again.", "", "error");
	}

	var x = w.INVENTO.XHR,
		supplierVM = {
			name: ko.observable(),
			representative: ko.observable(),
			contact_number: ko.observable(),
			email: ko.observable(),
			address: ko.observable(),

			updateID: ko.observable(),
		},
		sVM = supplierVM,
		$editSupplier = $("#editSupplierModal");

	sVM.edit = function(_id) {
		var supplier = ko.utils.arrayFilter(w.INVENTO.VM.dataObjects.allSuppliers(),
				function(supplier) {
					return supplier.id == _id;
				}),
			s = sVM;
		supplier = supplier[0];

		s.name(supplier.name);
		s.representative(supplier.representative);
		s.contact_number(supplier.contact_number);
		s.email(supplier.email);
		s.address(supplier.address);
		sVM.updateID(_id);
		$editSupplier.modal("show");
	};
	sVM.deleteSupplier = function(_id) {
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
				x.post("suppliers/delete/" + _id).done(function(res) {
					if (res) {
						success("deleted");
					}

				}).fail(function() {
					error();
				});

			}
		});
	};
	sVM.handleSubmit = function() {
		var data = ko.toJS(sVM);
		delete data.handleSubmit;
		delete data.handleUpdate;
		delete data.edit;
		delete data.deleteSupplier;
		delete data.updateID;
		var info = w.notif("Saving...", "info");
		x.post("suppliers/save", data).done(function(res) {
			if (res) {

				sVM.name(undefined);
				sVM.representative(undefined);
				sVM.contact_number(undefined);
				sVM.email(undefined);
				sVM.address(undefined);

				w.notif("New Supplier added!", "success");
			}
		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
		});
	};

	sVM.handleUpdate = function() {
		var data = ko.toJS(sVM);
		delete data.handleSubmit;
		delete data.handleUpdate;
		delete data.edit;
		delete data.deleteSupplier;
		delete data.updateID;
		x.post("suppliers/update/" + sVM.updateID(), data).done(function(res) {
			if (res) {
				$editSupplier.modal("hide");
				success("updated");
			}

		}).fail(function() {
			$editSupplier.modal("hide");
			error();
		});
	};
	w.INVENTO.VM.supplierVM = sVM;
}(window, jQuery, ko));