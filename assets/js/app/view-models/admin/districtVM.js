(function(w, j, ko) {
	"use strict";

	function Filter(filter) {
		x.post("reports/getDistrictStatistics", {
			filter: filter
		}).done(function(res) {
			var res = JSON.parse(res);
			if (res) {
				w.districtsReport.dataProvider = res;
				w.districtsReport.validateData();
			} else {
				swal("No Record Found", "", "warning");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	}


	var x = w.INVENTO.XHR,
		ChartConstructor = w.INVENTO.helpers.chartConstructor,
		DO = w.INVENTO.VM.dataObjects,
		districtVM = {
			name: ko.observable(),
			updateID: ko.observable(),
			filterStart: ko.observable(),
			filterEnd: ko.observable(),
		},
		dVM = districtVM;

	$("#districtsDT").on("click", ".district-edit", function() {
		var _id = $(this).data("id");
		dVM.updateID(_id);
		var district = ko.utils.arrayFilter(DO.allDistricts(), function(district) {
			return district.id == _id;
		});

		dVM.name(district[0].name);
		$("#editDistrictModal").modal("show");
	});

	$("#districtsDT").on("click", ".district-delete", function() {
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
				x.post("districts/delete/" + _id).done(function(res) {
					if (res) {
						$("#districtTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						swal("District deleted!", "", "success");
						//	swal.close();
						//w.notif("District Deleted.", "success");
					}
				}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});
			}
		});
	});

	dVM.handleSubmit = function() {
		x.post("districts/save", {
			name: dVM.name()
		}).done(function(res) {
			if (res) {
				var newDistrict = ko.utils.parseJson(res);

				DO.allDistricts.push(newDistrict[0]);
				dVM.name(undefined);

				$("#addDistrictModal").modal("hide");
				swal("New District added!", "", "success");
			}
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	dVM.handleUpdate = function() {
		var _id = dVM.updateID(),
			districtsDT = w.INVENTO.DT.districtsDT,
			tableRow = $("#districtTR_" + _id),
			dtData = districtsDT.row(tableRow).data();

		x.post("districts/update/" + _id, {
			name: dVM.name()
		}).done(function(res) {
			if (res) {
				$("#editDistrictModal").modal("hide");
				var res = JSON.parse(res)[0],
					allDistricts = w.INVENTO.VM.dataObjects.allDistricts;

				allDistricts.remove(function(d) {
					return d.id == _id;
				});

				allDistricts.push(res);
				dtData[0] = "<strong>" + res.name + "</strong>";
				dtData[2] = moment(res.updated_at).format("MMMM DD, YYYY hh:mm A");
				districtsDT.row(tableRow).data(dtData).draw();

				swal("District Updated to " + res.name + "!", "", "success");
			}

		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	dVM.filter = function(e) {
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

		if (($("#customFilterModal").data('bs.modal') || {}).isShown && !dVM.filterStart() && !dVM.filterEnd()) {
			return;
		}

		Filter(filter);
	};

	dVM.getCustomFilter = function(){
		var filter = {
			start: moment(dVM.filterStart()).format("YYYY-MM-DD"),
			end: moment(dVM.filterEnd()).format("YYYY-MM-DD")
		}

		Filter(filter);
	};
	w.INVENTO.VM.districtVM = dVM;
}(window, jQuery, ko));