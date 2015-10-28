;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, dataObjects = {
		allSuppliers : ko.observableArray([]),
		allCategories : ko.observableArray([]),
		allItems : ko.observableArray([]),
		allDistricts : ko.observableArray([]),
	}, DO = dataObjects;

	x.getJ( "ajax_source" ).done( function ( res ) {
		DO.allSuppliers( res.suppliers );
		DO.allCategories( res.categories );
		DO.allItems( res.items );
		DO.allDistricts( res.districts );

	}).fail( function() {
		// alert('whoops, dataObjects!');
	});

	w.INVENTO.VM.dataObjects = dataObjects;

}( window, jQuery, ko ));