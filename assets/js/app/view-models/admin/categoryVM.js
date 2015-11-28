(function(w, j, ko) {
	"use strict";

	function error() {
		swal("Whoops! Something went wrong. Please try again.", "", "error")
	}

	function success(msg) {
		swal("Category " + msg + "!", "", "success")
	}

	var x = w.INVENTO.XHR,
		categoryVM = {
			name: ko.observable(''),
			description: ko.observable(''),

			updateID: ko.observable(),
		},
		cVM = categoryVM,
		DO = w.INVENTO.VM.dataObjects,
		$editCategory = $("#editCategoryModal");

	cVM.name.subscribe(function() {
		setTimeout(function() {

		}, 500);
	});

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
	w.INVENTO.VM.categoryVM = cVM;

}(window, jQuery, ko));