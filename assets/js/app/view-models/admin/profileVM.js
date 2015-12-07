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
	
	$("#userProfileInfo").on('click',function () {
		var id = $(this).data("id");
		x.get( "users/getOneUser/" + id).done( function ( res ) {
			//swal("Profile has been successfully updated!", "", "success");
				var decoded = $.parseJSON(res);
				if(decoded[0].user_information){
				var decodedUserInfo = $.parseJSON(decoded[0].user_information);
				//var birthday = moment(decodedUserInfo.birthday).format('MM-DD-YYYY')
				prVM.name(decodedUserInfo.fullname);
				//prVM.birthday(birthday);
				prVM.mstatus(decodedUserInfo.mstatus);
				prVM.gender(decodedUserInfo.gender);
				}
		//prVM.name
		}).fail( function() {
		swal("Whoops! Something went wrong.", "", "error");
		});
		});
		
		$("#updateContactInfo").on('click',function () {
		var id = $(this).data("id");
		x.get( "users/getOneUser/" + id).done( function ( res ) {
			//swal("Profile has been successfully updated!", "", "success");
				var decoded = $.parseJSON(res);
				if(decoded[0].contact_information){
				var decodedContactInfo = $.parseJSON(decoded[0].contact_information);
				prVM.mobile(decodedContactInfo.mobile);
				prVM.email(decodedContactInfo.email);
				prVM.twitter(decodedContactInfo.twitter);
				prVM.skype(decodedContactInfo.skype);
				}
		//prVM.name
		}).fail( function() {
		swal("Whoops! Something went wrong.", "", "error");
		});
		});
	

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