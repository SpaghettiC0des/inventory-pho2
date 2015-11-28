(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,
		ChartConstructor = w.INVENTO.helpers.chartConstructor,
		DO = w.INVENTO.VM.dataObjects,
		districtVM = {
			name: ko.observable(),
			updateID: ko.observable(),
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

	dVM.getLastYear = function() {
		var filter = {
			filter: moment().subtract(1, 'year').format('YYYY-MM-DD')
		};

		x.post("reports/getDistrictStatistics", filter).done(function(res) {
			if (res) {
				w.districtsReport.clear();
				w.districtsReport.dataProvider = res;
				w.districtsReport.validateData();return;
				ChartConstructor({
					title: "Offices per district",
					catField: "name",
					valField: "offices",
					element: "district-report",
					balloonText: "[[category]] : [[value]] office/s"
				}, res);
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	};

	w.INVENTO.VM.districtVM = dVM;
}(window, jQuery, ko));