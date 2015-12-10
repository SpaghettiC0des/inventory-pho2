(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		supplierVM = {
			name: ko.observable(),
			representative: ko.observable(),
			contact_number: ko.observable(),
			email: ko.observable(),
			address: ko.observable(),

			updateID: ko.observable(),
			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		},
		sVM = supplierVM,
		$editSupplier = $("#editSupplierModal");

	function Filter(filter) {
		x.post("reports/getSupplierStatistics", {
			filter: filter
		}).done(function(res) {
			var res = JSON.parse(res);
			if (res) {
				w.INVENTO.AmCharts.suppliersReport.dataProvider = res;
				w.INVENTO.AmCharts.suppliersReport.validateData();
			} else {
				swal("No Record Found", "", "warning");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}

	function success(msg) {
		swal("Supplier " + msg + "!", "", "success");
	}

	function error() {
		swal("Something went wrong. Please try again.", "", "error");
	}

	$("#suppliersDT").on("click", ".supplier-edit", function() {
		var _id = $(this).data("id");
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
	});

	$("#suppliersDT").on("click", ".supplier-delete", function() {
		var _id = $(this).data("id");
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
						$("#supplierTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						success("deleted");
						//swal.close();
					}

				}).fail(function() {
					error();
				});

			}
		});
	});

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

				swal("New Supplier added!", "", "success");
			}
		}).fail(function() {
			error();
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

	sVM.filter = function(e) {
		var filterBy = e.target.getAttribute("filter"),
			filter = null;


		switch (filterBy) {
			case "last-year":
				filter = moment().startOf("year").subtract(1, "year").format("YYYY");
				break;
			case "this-year":
				filter = moment().startOf("year").format("YYYY");
				break;
			case "last-month":
				filter = {
					start: moment().startOf("month").subtract(1, "month").format("YYYY-MM-DD"),
					end: moment().endOf("month").subtract(1, "month").format("YYYY-MM-DD"),
				};
				break;
			case "this-month":
				filter = {
					start: moment().startOf("month").format("YYYY-MM-DD"),
					end: moment().format("YYYY-MM-DD")
				};
				break;
			case "last-week":
				filter = {
					start: moment().startOf("week").subtract(1, "week").format("YYYY-MM-DD"),
					end: moment().endOf("week").subtract(1, "week").format("YYYY-MM-DD")
				};
				break;
			case "this-week":
				filter = {
					start: moment().startOf("week").format("YYYY-MM-DD"),
					end: moment().endOf("week").format("YYYY-MM-DD")
				};
				break;
			case "custom":

				$("#customFilterModal").modal("show");
				break;
			default:
				filter = null;
		}

		if (($("#customFilterModal").data('bs.modal') || {}).isShown && !sVM.filterStart() && !sVM.filterEnd()) {
			return;
		}

		Filter(filter);
	};

	sVM.getCustomFilter = function() {
		var filter = {
			start: moment(sVM.filterStart()).format("YYYY-MM-DD"),
			end: moment(sVM.filterEnd()).format("YYYY-MM-DD")
		}

		Filter(filter);
	};
	w.INVENTO.VM.supplierVM = sVM;
}(window, jQuery, ko));