(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		categoryVM = {
			name: ko.observable(''),
			description: ko.observable(''),

			updateID: ko.observable(),

			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		},
		cVM = categoryVM,
		DO = w.INVENTO.VM.dataObjects,
		$editCategory = $("#editCategoryModal");

	cVM.name.subscribe(function() {
		setTimeout(function() {

		}, 500);
	});

	function Filter(filter) {
		x.post("reports/getCategoryStatistics", {
			filter: filter
		}).done(function(res) {
			var res = JSON.parse(res);
			if (res) {
				w.INVENTO.AmCharts.categoriesReport.dataProvider = res;
				w.INVENTO.AmCharts.categoriesReport.validateData();
			} else {
				swal("No Record Found", "", "warning");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}

	function error() {
		swal("Whoops! Something went wrong. Please try again.", "", "error")
	}

	function success(msg) {
		swal("Category " + msg + "!", "", "success")
	}

	$("#categoriesDT").on("click", ".category-edit", function() {
		var _id = $(this).data("id");
		var category = ko.utils.arrayFilter(w.INVENTO.VM.dataObjects.allCategories(),
			function(category) {
				return category.id == _id;
			});

		cVM.name(category[0].name);
		cVM.description(category[0].description);
		cVM.updateID(_id);

		$editCategory.modal("show");
	});

	$("#categoriesDT").on("click", ".category-delete", function() {
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
				x.post("categories/delete/" + _id).done(function(res) {
					if (res) {
						$("#categoryTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						success("deleted");
					}

				}).fail(function() {
					error();
				});

			}
		});
	});

	cVM.handleSubmit = function() {
		x.post("categories/save", {
			name: cVM.name(),
			description: cVM.description()
		}).done(function(res) {

			cVM.name(undefined);
			cVM.description(undefined);

			success("added");

		}).fail(function() {
			error();
		});
	};

	cVM.handleUpdate = function() {
		var data = {
			name: cVM.name(),
			description: cVM.description(),
		};

		x.post("categories/update/" + cVM.updateID(), data).done(function(res) {
			if (res) {
				$editCategory.modal("hide");
				success("updated");
			}

		}).fail(function() {
			$editCategory.modal("hide");
			error();
		});
	};

	cVM.filter = function(e) {
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

		if (($("#customFilterModal").data('bs.modal') || {}).isShown && !cVM.filterStart() && !cVM.filterEnd()) {
			return;
		}

		Filter(filter);
	};

	cVM.getCustomFilter = function() {
		var filter = {
			start: moment(cVM.filterStart()).format("YYYY-MM-DD"),
			end: moment(cVM.filterEnd()).format("YYYY-MM-DD")
		}

		Filter(filter);
	};

	w.INVENTO.VM.categoryVM = cVM;

}(window, jQuery, ko));