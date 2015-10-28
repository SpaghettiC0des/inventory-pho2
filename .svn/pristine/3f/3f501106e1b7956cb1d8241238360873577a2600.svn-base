;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, categoryVM = {
		name : ko.observable(),
		description : ko.observable(),
	}, cVM = categoryVM, DO = w.INVENTO.VM.dataObjects;
	cVM.name.subscribe( function() {
		setTimeout( function() {

		}, 500 );
	});

	cVM.handleSubmit = function(){
		x.post( "categories/save", {name: cVM.name(), description: cVM.description() } ).done( function ( res ) {
			
				cVM.name( undefined );
				cVM.description( undefined );
				w.notif( "New Category added!", "success" );
			
		}).fail( function() {
			w.notif( "Whoops! Something went wrong.", "danger" );
		});
	};

	w.INVENTO.VM.categoryVM = cVM;

}( window, jQuery, ko ));