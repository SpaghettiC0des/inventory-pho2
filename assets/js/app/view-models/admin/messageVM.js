(function(w, j, ko) {
	"use strict";

	var x = w.INVENTO.XHR,
		_base = w.INVENTO.baseURL,
		DO = w.INVENTO.VM.dataObjects,
		messageVM = {
			receiverId: ko.observable(),
			subject: ko.observable(),
			content: ko.observable(),
			receiverName: ko.observable(),
			username: ko.observable(),
			emailId: ko.observable(),
			parentId: ko.observable(),
			senderName: ko.observable(),
			userList: ko.observableArray([]),
			fullName: ko.observableArray([]),
			userSearch: ko.observableArray([]),
			userEmails: ko.observableArray([]),
		},
		mVM = messageVM;


	mVM.userSearch.subscribe(function(query) {
		if (query) {
			var pattern = new RegExp(query.toUpperCase());
			var result = ko.utils.arrayFilter(DO.allUsers(), function(user) {
				return pattern.test(user.fullName ? user.fullName.toUpperCase() : user.fullName) || 
					pattern.test(user.office_name ? user.office_name.toUpperCase() : user.office_name) ||
						pattern.test(user.username ? user.username.toUpperCase() : user.username);
			});
			return mVM.userList(result);
		}
		return mVM.userList(DO.allUsers());

	});

	$("#userView").on('click', '.sendMessage', function() {
		var _id = $(this).attr("dataid");
		mVM.receiverId(_id);
		$.ajax({
			url: _base + "users/getOneUser/" + _id,
			type: 'GET',
			async: false,
			success: function(data) {
				var decoded = $.parseJSON(data);

				if (decoded[0].user_information) {
					var userInfo = $.parseJSON(decoded[0].user_information);
					mVM.receiverName(userInfo.fullname);
				} else {
					mVM.receiverName(decoded[0].username);
				}
				$("#sendEmailModal").modal("show");
			},
		});
	});

	$("#email_notif").on('click', function() {
		x.get("messages/userNotifViewed/").done(function(res) {
			$("#email_count").html("0");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});

	});

	x.getJ("users/getUserList").done(function(res) {
		if (res) {

			mVM.userList(res);
		}

	}).fail(function() {
		w.notif("Whoops! Something went wrong.", "error");
	});

	mVM.emailSending = function() {
		x.post("messages/save_email", {
			subject: mVM.subject(),
			content: mVM.content(),
			receiverId: mVM.receiverId(),
		}).done(function(res) {
			mVM.subject(undefined),
				mVM.content(undefined),
				mVM.receiverId(undefined),
				swal("Message Sent !", "", "success");
			$("#sendEmailModal").modal("hide");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
			$("#sendEmailModal").modal("hide");
		});
	};

	mVM.replyEmailSending = function() {
		x.post("messages/reply_email", {
			subject: mVM.subject(),
			content: mVM.content(),
			receiverId: mVM.receiverId(),
			parentId: mVM.parentId(),
		}).done(function(res) {
			mVM.subject(undefined),
				mVM.content(undefined),
				mVM.receiverId(undefined),
				swal("Reply Message Sent !", "", "success");
			$("#replyEmailModal").modal("hide");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
			$("#replyEmailModal").modal("hide");
		});
	};

	$.ajax({
		url: _base + "messages/getUserEmails/",
		type: 'GET',
		async: false,
		success: function(data) {

			var decoded = $.parseJSON(data);
			mVM.userEmails(decoded.more_emails);
			$("#email_count").html(decoded.notif);
		},
	});

	$("#emails").on('click', '.viewEmail', function() {
		var emailId = $(this).attr('dataemail');
		//console.log("dasdasdas");
		window.location.href = _base + "messages/viewMessage/" + emailId;
	});

	mVM.addBaseURL = function(image) {
		if (image) {
			return _base + image;
		}

		return _base + "assets/uploads/blankpic.png";		
	};

	mVM.emailStatus = function(viewed) {
		if (viewed == 1) {
			return "Viewed";
		} else {
			return "Unread";
		}
	};

	mVM.emailStatusCss = function(email) {
		if (email == 1) {
			return "#FFFFFF";
		} else {
			return "#EDECEC";
		}
	};

	$("#replyEmail").on('click', function() {
		var emailid = $(this).data('id');
		mVM.emailId(emailid);
		x.get("messages/getOneEmail/" + emailid).done(function(res) {
			var decoded = $.parseJSON(res);
			if(decoded.fullName){
			mVM.receiverName(decoded.fullName);
			}else{
			mVM.receiverName(decoded.username);
			}
			mVM.receiverId(decoded.sender_id);
			mVM.parentId(decoded.parent_id);
			mVM.subject(decoded.subject);

			$("#replyEmailModal").modal("show");
		}).fail(function() {
			swal("Whoops! Something went wrong.", "", "error");
		});
	});

	$("#emailDataTable").on('click', '.emailTR', function() {
		var emailId = $(this).data('id');
		//console.log("dasdasdas");
		window.location.href = _base + "messages/viewMessage/" + emailId;
	});



	w.INVENTO.VM.messageVM = mVM;

}(window, jQuery, ko));