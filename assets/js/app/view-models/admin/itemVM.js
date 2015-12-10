(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,
		_base = w.INVENTO.baseURL,
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

			url: ko.observable(),
			chartName: ko.observable(),
			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		},
		iVM = itemVM;

	function Filter(filter, url, chartName) {
		x.post("reports/" + url, {
			filter: filter
		}).done(function(res) {
			var res = JSON.parse(res);
			if (res) {
				w.INVENTO.AmCharts[chartName].dataProvider = res;
				w.INVENTO.AmCharts[chartName].validateData();
			} else {
				swal("No Record Found", "", "warning");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}

	iVM.handleSubmit = function() {

		var data = {
			image_file_name: this.image_file_name(),
			category_id: this.category_id(),
			code: this.code(),
			name: this.name(),
			quantity: this.quantity(),
			unit: this.unit(),
			cost: this.cost(),
			price: this.price(),
			description: this.description(),
			updateID: this.updateID(),
		}.bind(iVM);

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
				//var input = $("#itemImage");
				//input.replaceWith(input.val('').clone(true));
				$("#editItemImage").html("").append("<input type='file' accept='image/*' data-bind='file : image_file_name' id='eItemImage' name='item-image'>");

				$("#eItemImage").fileinput({
					browseClass: "btn btn-primary",
					showCaption: false,
					showRemove: false,
					showUpload: false,
					initialPreview: [
						"<img src='" + _base + res.image_file_name + "' class='file-preview-image' alt='No Files was Uploaded'  width='213' height='160'>"
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
		//console.log(iVM.updateID());return;
		//var file = document.getElementById("eItemImage").value;
		//iVM.image_file_name(file);
		// var formData = new FormData($("form#editItem")[0]);
		//console.log(formData);return;
		// var data = ko.toJS(iVM);
		// delete data.edit;
		// delete data.handleSubmit;
		// delete data.handleUpdate;
		// delete data.updateID;

		// x.post("items/update/" + iVM.updateID(), data).done(function(res) {
		//if (res) {
		// $("#editItemModal").modal("hide");
		// swal("Item Updated!", "", "success");
	}

	// }).fail(function() {
	// swal("Whoops! Something went wrong.", "", "error");
	// });
	// };

	$("#notifDD").on('click', '.notificationLink', function() {
		var notifId = $(this).attr('dataid');
		x.getJ("items/getOne/" + notifId).done(function(res) {
			iVM.image_file_name(_base + res.image_file_name);
			iVM.code(res.code);
			iVM.name(res.name);
			iVM.quantity(res.quantity);
			iVM.unit(res.unit);
			$("#viewExpiringItemModal").modal("show");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});

		//console.log(localStorage.notifId);

	});

	iVM.filter = function(e) {


	};

	$(".chart-container").on("click", function(e) {
		var URL = $(this).data("href"),
			chartName = $(this).attr("chart-name"),
			filterBy = e.target.getAttribute("filter"),
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
				iVM.url(URL);
				iVM.chartName(chartName);
				$("#customFilterModal").modal("show");
				break;
			default:
				filter = null;
		}

		if (($("#customFilterModal").data('bs.modal') || {}).isShown && !iVM.filterStart() && !iVM.filterEnd()) {
			return;
		}

		iVM.chartName(chartName);
		Filter(filter, URL, iVM.chartName());

	});

	iVM.getCustomFilter = function() {
		var filter = {
			start: moment(iVM.filterStart()).format("YYYY-MM-DD"),
			end: moment(iVM.filterEnd()).format("YYYY-MM-DD")
		}

		Filter(filter, iVM.url(), iVM.chartName());
	};
	w.INVENTO.VM.itemVM = iVM;

}(window, jQuery, ko));