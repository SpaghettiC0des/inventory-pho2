(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		settingVM = {
			name: ko.observable(),
			address: ko.observable(),
			currency: ko.observable(),
			image_file_name: ko.observable(),
			notif: ko.observableArray([]),
			notifyBy: ko.observable(),
			notifyByValues: ko.observableArray([]),
			selectedNotifyByValue: ko.observable(),
		},
		seVM = settingVM,
		i = 1;



	seVM.handleSubmit = function() {
		var settings = ko.utils.arrayFilter(w.INVENTO.VM.dataObjects.settings(),
				function(settings) {
					return settings.id == _id;
				}),
			s = seVM;
		settings = settings[0];

		var data = ko.toJS(seVM);
		//data.image_file_name = data.image_file_name.replace(/C:\\fakepath\\/i, '');
		delete data.handleSubmit;


		// x.post("settings/save", data).done(function(res) {
		// w.notif("System Settings have been Updated!", "success");

		// }).fail(function() {
		// w.notif("Whoops! Something went wrong.", "danger");
		// });
	};

	seVM.notifyBy.subscribe(function(val) {
		if (val == "byDay") {
			for (i; i <= 31; i++) {
				seVM.notifyByValues.push(i);
			}
		} else if (val == "byMonth") {
			for (i; i <= 12; i++) {
				seVM.notifyByValues.push(i);
			}
		} else if (val == "byWeek") {
			for (i; i <= 7; i++) {
				seVM.notifyByValues.push(i);
			}
		}

	});



	w.INVENTO.VM.settingVM = seVM;

}(window, jQuery, ko));