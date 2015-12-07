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
            old_password: ko.observable(),
            pwdView: ko.observable(),
            errorMsg: ko.observable(),
            pwedCheckMsg: ko.observable(),
            updateId: ko.observable(),

            validationPassed: ko.observable()
        },
        uVM = userVM;

    uVM.checkUsername = function(e){
        x.post("users/checkUsername", {username: e.username()}).done(function(res){
            if(res && $.trim(e.username())){
                return e.validationPassed(true);
            }
            e.validationPassed(false);
        });
    };

    uVM.checkEmail = function(e){
        x.post("users/checkEmail", {email: e.email()}).done(function(res){
            if(res && $.trim(e.email())){
                return e.validationPassed(true);
            }
            e.validationPassed(false);
        });
    };

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
                $("#addUserModal").modal('hide');
                swal("New user added!", "", "success");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    };

    uVM.changeRole = function() {
        var data = {
            role: uVM.role(),
            office_id: uVM.office_id(),
        };

        if (uVM.hasError()) {
            return;
        }

        x.post("users/changeRole/" + uVM.updateId(), data).done(function(res) {
            if (res) {
                swal("User Role updated!", "", "success");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    };
    //change password
    uVM.changePassword = function() {
        var data = {
            password: uVM.password(),
        };

        if (uVM.hasError()) {
            return;
        }

        x.post("users/changePassword/"+uVM.updateId(), data).done(function(res) {
            if (res) {
                swal("User Password updated!", "", "success");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    };
    // uVM.userList = function () {
    // $.ajax({
    // url: "users/getUserList/",
    // type: 'GET',
    // async: false,
    // success: function (data) {

		// }, function(isConfirm) {
			// if (isConfirm) {
				// x.post("users/delete/" + _id).done(function(res) {
					// if (res) {
						// $("#userTR" + _id).addClass("animated zoomOutDown").hide('slow');
						// swal("User deleted!", "", "success");
						//	swal.close();
						//w.notif("District Deleted.", "success");
					// }
				// }).fail(function() {
					// swal("Whoops! Something went wrong.", "", "error");
				// });
			// }
		// });
	// });
	
	$("#changePassword").on('click' , function () {
		var _id = $(this).data("id");
		x.get('users/getOneUser/' + _id).done(function(res){
			var decoded = $.parseJSON(res);
			uVM.updateId(_id);
			uVM.old_password(decoded[0].password);
			$("#changePasswordModal").modal('show');
			}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});
		});
		
		$("#usersDT").on('click','.user-changeRole' , function () {
				var _id = $(this).data("id");
				x.get('users/getOneUser/' + _id).done(function(res){
			var decoded = $.parseJSON(res);
				uVM.updateId(_id);
				//uVM.office_id(decoded[0].office_id);
			$("#changeRoleModal").modal('show');
			}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});	
			});
	
	

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

    $("#changePassword").on('click', function() {
        var _id = $(this).data("id");
        x.get('users/getOneUser/' + _id).done(function(res) {
            var decoded = $.parseJSON(res);
            console.log(decoded[0].password);
            //uVM.old_password()
            $("#changePasswordModal").modal('show');
        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    });

    $("#usersDT").on('click', '.user-changeRole', function() {
        var _id = $(this).data("id");
        x.get('users/getOneUser/' + _id).done(function(res) {
            var decoded = $.parseJSON(res);
            uVM.updateId(_id);
            //uVM.office_id(decoded[0].office_id);
            $("#changeRoleModal").modal('show');
        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    });



    w.INVENTO.VM.userVM = uVM;

}(window, jQuery, ko));