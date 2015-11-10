;(function ( w, j , ko ) {
	"use strict";

	var x = w.INVENTO.XHR, profileVM = {
		name : ko.observable(),
		gender : ko.observable(),
		birthday : ko.observable(),
		mstatus : ko.observable(),
		
		mobile : ko.observable(),
		email : ko.observable(),
		twitter : ko.observable(),
		skype : ko.observable(),
	}, prVM = profileVM;

	prVM.handleSubmit = function(){
		
		var data = ko.toJS( prVM );
		//data.image_file_name = data.image_file_name.replace(/C:\\fakepath\\/i, '');
		delete data.handleSubmit;
		console.log(data);
		
		x.post( "" , data).done( function ( res ) {
			w.notif( "Profile has been Updated!", "success" );

		}).fail( function() {
			w.notif( "Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.profileVM = prVM;

}( window, jQuery, ko ));