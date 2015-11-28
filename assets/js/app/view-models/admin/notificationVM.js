;
(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		_base = w.INVENTO.baseURL,
		DO = w.INVENTO.VM.dataObjects,
		notificationVM = {
			configs: ko.observableArray([]),
			notifications: ko.observableArray([]),
			notifType: ko.observable(),
			notifDate: ko.observable(),

		},
		nVM = notificationVM;
		
	
	
	$.ajax({
		url: _base + "settings/getOne",
		type: 'GET',
		async: false,
		success: function(data) {
			//console.log(data);
			var settings = $.parseJSON(data);
			var config = $.parseJSON(settings[0].configs);

			$.ajax({
				url: _base + "reports/get_expired_item_notification/" + config.notiftype + "/" + config.notifdate,
				type: 'POST',
				async: false,
				success: function(data) {
					var decoded = $.parseJSON(data);
					nVM.notifications(decoded);
					//console.log(nVM.notifications);
					var notif = decoded.length;
					$("#expired_notif").html(notif);
				},
			});

		},
	});

		nVM.addBaseURL = function (image) {
		if(image){
			return _base + image;
		}else{
		return _base + "assets/uploads/default.png";
		}
			
			};

	w.INVENTO.VM.notificationVM = nVM;

}(window, jQuery, ko));