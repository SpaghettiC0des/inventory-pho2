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
                w.notif("New user added!", "success");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    }

    w.INVENTO.VM.userVM = uVM;

}(window, jQuery, ko));