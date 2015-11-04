;(function ( w, j , ko ) {
	"use strict";
	var x = w.INVENTO.XHR, itemVM = {
		image_file_name: ko.observable(),
		category_id : ko.observable(),
		code : ko.observable(),
		expiration : ko.observable(),
		name : ko.observable(),
		quantity : ko.observable(1),
		unit : ko.observable(),
		cost : ko.observable(),
		price : ko.observable(),
		description : ko.observable(),
	}, iVM = itemVM;

	iVM.handleSubmit = function(){
		
		var data = ko.toJS( iVM );
		data.expiration =  moment(data.expiration).format("YYYY-MM-DD");
		data.image_file_name = data.image_file_name.replace(/C:\\fakepath\\/i, '');
		delete data.handleSubmit;
		console.log(data);
		
		x.post( "items/save" , data).done( function ( res ) {
			w.notif( "New item saved!", "success" );

		}).fail( function() {
			w.notif( "Whoops! Something went wrong.", "danger");
		});
	};

	w.INVENTO.VM.itemVM = iVM;

}( window, jQuery, ko ));