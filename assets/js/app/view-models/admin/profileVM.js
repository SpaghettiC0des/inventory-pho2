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

	prVM.handleBasic = function(){
		
		var data = ko.toJS( prVM );
		//data.image_file_name = data.image_file_name.replace(/C:\\fakepath\\/i, '');
		data.birthday = moment(data.birthday).format('YYYY-MM-DD');
		delete data.handleBasic;
		delete data.handleContact;
		console.log(data);
		
		x.post( "profile/user_info" , data).done( function ( res ) {
			swal("Profile has been successfully updated!", "", "success");

		}).fail( function() {
		swal("Whoops! Something went wrong.", "", "error");
		});
	};
	
	prVM.handleContact = function(){
		
		var data = ko.toJS( prVM );
		//data.image_file_name = data.image_file_name.replace(/C:\\fakepath\\/i, '');
		//data.birthday = moment(data.birthday).format('MM-DD-YYYY');
		delete data.handleBasic;
		delete data.handleContact;
		console.log(data);
		
		x.post( "profile/contact_info" , data).done( function ( res ) {
			swal("Profile has been successfully updated!", "", "success");

		}).fail( function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	};

	w.INVENTO.VM.profileVM = prVM;

}( window, jQuery, ko ));