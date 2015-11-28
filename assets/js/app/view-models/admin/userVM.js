(function(w, j, ko) {
    "use strict";
    var x = w.INVENTO.XHR,
        userVM = {
            role: ko.observable(),
            office_id: ko.observable(),
            username: ko.observable(),
            email: ko.observable(),
            password: ko.observable(),
            password_retype: ko.observable(),
            pwdView: ko.observable(),
            errorMsg: ko.observable(),
            pwedCheckMsg: ko.observable(),
        },
        uVM = userVM;

    uVM.isOffice = ko.pureComputed(function() {
        if (this.role() == 3) {
            this.office_id(undefined);
            return 'block';
        } else {
            this.office_id(undefined);
            return 'none';
        }
    }, uVM);

    uVM.hasError = ko.pureComputed(function() {
        if (uVM.password()) {
            if (uVM.password().length < 6) {
                uVM.errorMsg('Password should be at least 6 characters.')
                return 'has-error';
            } else {
                uVM.errorMsg(undefined);
                return '';
            }
        }

    });

    uVM.pwdViewToggle = ko.pureComputed(function() {
        if (uVM.pwdView()) {
            return 'text';
        } else {
            return 'password';
        }
    });

    uVM.hasPassword = ko.pureComputed(function() {
        if (!this.hasError() && typeof this.password() !== "undefined") {
            return 'block';
        }
        return 'none';
    }, uVM);

    uVM.passwordMismatched = ko.pureComputed(function() {
        var self = this;
        if (this.password_retype()) {
            if (self.password() === self.password_retype()) {
                self.pwedCheckMsg('');
                return '';
            }

            self.pwedCheckMsg('Password mismatched!');
            return 'has-error';
        } else {
            self.pwedCheckMsg('');
            return '';
        }
    }, uVM);

    uVM.handleSubmit = function() {
        var data = {
            role: uVM.role(),
            office_id: uVM.office_id(),
            username: uVM.username(),
            email: uVM.email(),
            password: uVM.password(),
        };
        
        if (uVM.hasError()) {
            return;
        }

        x.post("users/save", data).done(function(res) {
            if (res) {
                swal("New user added!","","success");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.","","error");
        });
    };
	
	// uVM.userList = function () {
		// $.ajax({
		// url: "users/getUserList/",
		// type: 'GET',
		// async: false,
		// success: function (data) {
		
	//	var decoded = $.parseJSON(data);
		// console.log(data);
	
		// },
	// });	
		
	// };
	
	$("#usersDT").on("click", ".user-delete", function() {
		var _id = $(this).data("id");
		swal({
			title: "Are you sure?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "Cancel",
			closeOnConfirm: false,
			closeOnCancel: true

		}, function(isConfirm) {
			if (isConfirm) {
				x.post("users/delete/" + _id).done(function(res) {
					if (res) {
						$("#userTR" + _id).addClass("animated zoomOutDown").hide('slow');
						swal("User deleted!", "", "success");
						//	swal.close();
						//w.notif("District Deleted.", "success");
					}
				}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});
			}
		});
	});
	
	

    w.INVENTO.VM.userVM = uVM;

}(window, jQuery, ko));