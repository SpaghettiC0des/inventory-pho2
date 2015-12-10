(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		purchaseVM = {
			datetime: ko.observable(),
			reference_no: ko.observable(),
			supplier_id: ko.observable(),
			selected_item: ko.observable(),
			items: ko.observableArray([]),
			status: ko.observable(),

			fullDetails: ko.observableArray([]),

			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		},
		pVM = purchaseVM;

	function Item(data) {
		var obj = {
			item_id: data.id,
			code: ko.observable(data.code),
			name: ko.observable(data.item_name),
			expiration_date: ko.observable(),
			quantity: ko.observable(1),
			cost: ko.observable(data.cost),

			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		};
		obj.sub_total = ko.pureComputed(function() {
			return (parseFloat(obj.quantity()) * parseFloat(obj.cost())).toFixed(2);
		});
		return obj;
	}

	function Filter(filter) {
		x.post("reports/getPurchaseStatistics", {
			filter: filter
		}).done(function(res) {
			var res = JSON.parse(res);
			if (res) {
				w.INVENTO.AmCharts.purchasesReport.dataProvider = res;
				w.INVENTO.AmCharts.purchasesReport.validateData();
			} else {
				swal("No Record Found", "", "warning");
			}
		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}

	pVM.selected_item.subscribe(function() {
		if (pVM.selected_item()) {
			pVM.items.push(new Item(pVM.selected_item()));
		}
	});

	pVM.grandTotal = ko.pureComputed(function() {
		var total = 0;
		$.each(pVM.items(), function() {
			total = parseFloat(this.sub_total()) + total;
		});

		return total.toFixed(2);
	});

	pVM.handleSubmit = function() {
		var _items = ko.toJS(pVM.items());
		$.each(_items, function() {
			this.expiration_date = moment(this.expiration_date).format('YYYY-MM-DD');
			delete this.code;
			delete this.name;
			delete this.cost;
		});
		var data = {
			reference_no: pVM.reference_no(),
			datetime: moment(pVM.datetime()).format('YYYY-MM-DD hh:mm'),
			year: moment(pVM.datetime()).format('YYYY'),
			month: moment(pVM.datetime()).format('MM'),
			supplier_id: pVM.supplier_id(),
			items: _items,
			grand_total: pVM.grandTotal(),
			status: pVM.status()
		}

		x.post("purchases/save", data).done(function(res) {
			swal("New Purchase added!", "", "success");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "errror");
		});
	};

	$("#purchaseDT").on("click", ".view-purchase", function(e) {
		e.preventDefault();
		swal("Processing...", "", "info");
		var _id = $(this).data("id");
		x.getJ("purchases/getPurchaseDetails/" + _id).done(function(res) {
			if (res) {
				swal.close();
				// var data = res;
				// data.items = JSON.parse(res.items);

				pVM.fullDetails(res);
				$("#viewPurchaseDetailsModal").modal("show");
			}

		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "errror");
		});
	});

	pVM.filter = function(e) {
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

		if (($("#customFilterModal").data('bs.modal') || {}).isShown && !pVM.filterStart() && !pVM.filterEnd()) {
			return;
		}

		Filter(filter);
	};

	pVM.getCustomFilter = function() {
		var filter = {
			start: moment(pVM.filterStart()).format("YYYY-MM-DD"),
			end: moment(pVM.filterEnd()).format("YYYY-MM-DD")
		}

		Filter(filter);
	};
	w.INVENTO.VM.purchaseVM = pVM;
}(window, jQuery, ko));