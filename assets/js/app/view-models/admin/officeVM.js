(function(w, j, ko) {
	"use strict";
	var x = w.INVENTO.XHR,
		officeVM = {
			district_id: ko.observable(),
			name: ko.observable(),

			updateID: ko.observable(),
		},
		oVM = officeVM;

	$("#officesDT").on("click", ".office-edit", function() {
		var _id = $(this).data("id");
		oVM.updateID(_id);
		var office = ko.utils.arrayFilter(w.INVENTO.VM.dataObjects.allOffices(), function(office) {
			return _id == office.id;
		});

		oVM.district_id(office[0].district_id);
		oVM.name(office[0].name);
		$("#editOfficeModal").modal("show");
	});

	$("#officesDT").on("click", ".office-delete", function() {
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
				x.post("offices/delete/" + _id).done(function(res) {
					if (res) {
						$("#officeTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						swal("Office deleted!", "", "success");
						//swal.close();
						//w.notif("District Deleted.", "success");
					}
				}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});
			}
		});
	});
	oVM.handleSubmit = function() {
		var data = ko.toJS(oVM);
		delete data.edit;
		delete data.deleteOffice;
		delete data.updateID;
		delete data.handleSubmit;
		delete data.handleUpdate;

		x.post("offices/save", data).done(function(res) {
			oVM.name(undefined);
			$("#addOfficeModal").modal("hide");
			swal("New Office added!", "", "success");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	oVM.handleUpdate = function() {
		var data = {
				district_id: oVM.district_id(),
				name: oVM.name()
			},
			_id = oVM.updateID(),
			officesDT = w.INVENTO.DT.officesDT,
			tableRow = $("#officeTR_" + _id),
			dtData = officesDT.row(tableRow).data();

		x.post("offices/update/" + _id, data).done(function(res) {
			// if (res) {
			if (res) {
				$("#editOfficeModal").modal("hide");
				var res = JSON.parse(res),
					allDistricts = w.INVENTO.VM.dataObjects.allDistricts,
					allOffices = w.INVENTO.VM.dataObjects.allOffices;

				var former = allOffices.remove(function(d) {
					return d.id == _id;
				});

				var district = ko.utils.arrayFilter(allDistricts(), function(district) {
					return data.district_id == district.id;
				});


				allOffices.push(res);

				dtData[0] = "<strong>" + res.name + "</strong>";
				dtData[1] = "<strong>" + district[0].name + "</strong>";
				dtData[3] = moment(res.updated_at).format("MMMM DD, YYYY hh:mm A");
				officesDT.row(tableRow).data(dtData).draw();


				if (former[0].district_id != data.district_id && former[0].name != res.name) {
					swal("Office updated to:" + district[0].name + " - " + res.name + "!", "", "success");
				} else if (former[0].name != res.name) {
					swal("Office name updated to:" + res.name + "!", "", "success");
				} else {
					swal("Office district updated to:" + district[0].name + "!", "", "success");
				}

			}

		}).fail(function() {
			w.notif("Whoops! Something went wrong.", "error");
		});
	};

	w.INVENTO.VM.officeVM = oVM;
}(window, jQuery, ko));