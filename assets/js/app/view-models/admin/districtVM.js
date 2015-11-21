(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,
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

	dVM.deleteDistrict = function(_id) {
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
						swal.close();
						// swal("Deleted!", "", "success");
					}
				}).fail(function() {
					w.notif("Whoops! Something went wrong.", "error");
				});


			}
		});

	};
	dVM.handleSubmit = function() {
		x.post("districts/save", {
			name: dVM.name()
		}).done(function(res) {
			if (res) {
				var newDistrict = ko.utils.parseJson(res);

				DO.allDistricts.push(newDistrict[0]);
				dVM.name(undefined);

				w.notif("New District added!", "success");
			}
		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "danger");
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
				var res = JSON.parse(res)[0];

				var test = _.findIndex(w.INVENTO.VM.dataObjects.allDistricts(),function(d){
					return d == res;
				});

				console.log(test);return;
				dtData[0] = res.name;
				dtData[2] = moment(res.updated_at).format("MMM DD, YYYY");
				districtsDT.row(tableRow).data(dtData).draw();

				// swal("Updated!", "", "success");
			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	};

	w.INVENTO.VM.districtVM = dVM;
}(window, jQuery, ko));