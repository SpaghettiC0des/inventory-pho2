;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, 
		officeVM = {
			district_id : ko.observable(),
			name : ko.observable(),
		}, oVM = officeVM;

	oVM.handleSubmit = function() {
		var data = ko.toJS( oVM );
		delete data.handleSubmit;
		x.post( "offices/save", data ).done( function ( res ) {
			oVM.district_id( undefined );
			oVM.name( undefined );
			
			w.notif("New Office added!", "success");
		}).fail( function() {
			w.notif("Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.officeVM = oVM;
}( window, jQuery, ko ));