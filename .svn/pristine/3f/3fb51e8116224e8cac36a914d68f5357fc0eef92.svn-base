;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, DO = w.INVENTO.VM.dataObjects,
		districtVM = {
			name : ko.observable(),
		}, dVM = districtVM;

	dVM.handleSubmit = function() {
		x.post( "districts/save", {name: dVM.name()}).done( function ( res ) {
			if( res ) {
				var newDistrict = ko.utils.parseJson( res );

				DO.allDistricts.push( newDistrict[0] );
				dVM.name( undefined );

				w.notif( "New District added!", "success");
			}
		}).fail( function() {
			w.notif( "Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.districtVM = dVM;
}( window, jQuery, ko ));