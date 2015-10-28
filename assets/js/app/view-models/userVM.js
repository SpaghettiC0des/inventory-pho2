(function(w, j, ko) {
    "use strict";
    var x = w.INVENTO.XHR,
        userVM = {
            role: ko.observable(),
            username: ko.observable(),
            email: ko.observable(),
            password: ko.observable(),
            pwdView: ko.observable(),
            errorMsg: ko.observable(),
        },
        uVM = userVM;

    uVM.hasError = ko.pureComputed(function() {
        if( uVM.password() ){
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

    uVM.handleSubmit = function() {
        var data = ko.toJS(uVM);
        delete data.pwdView;
        delete data.pwdViewToggle;
        delete data.hasError;
        delete data.errorMsg;
        delete data.handleSubmit;
        if( ! uVM.hasError() ){
            console.log(data);   
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