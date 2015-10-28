;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, 
		supplierVM = {
			name : ko.observable(),
			representative : ko.observable(),
			contact_number : ko.observable(),
			email : ko.observable(),
			address : ko.observable(),
		}, sVM = supplierVM;

	sVM.handleSubmit = function() {
		var data = ko.toJS( sVM );
		delete data.handleSubmit;
		var info = w.notif( "Saving...", "info");
		x.post( "suppliers/save", data).done( function ( res ) {
			if( res ) {
				
				sVM.name( undefined );
				sVM.representative( undefined );
				sVM.contact_number( undefined );
				sVM.email( undefined );
				sVM.address( undefined );

				w.notif( "New Supplier added!", "success");
			}
		}).fail( function() {
			w.notif( "Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.supplierVM = sVM;
}( window, jQuery, ko ));