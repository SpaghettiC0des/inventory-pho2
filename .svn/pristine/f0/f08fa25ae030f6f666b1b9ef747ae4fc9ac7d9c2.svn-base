(function(w, j, ko) {
    "use strict";

    var x = w.INVENTO.XHR,
        officeBudgetVM = {
            date: ko.observable(),
            office_id: ko.observable(),
            amount: ko.observable(),

        },
        obVM = officeBudgetVM;

    obVM.handleSubmit = function() {
        var data = {
            date: moment(obVM.date()).format('YYYY-MM-DD'),
            office_id: obVM.office_id(),
            amount: obVM.amount(),
        };

        x.post("office_budgets/save", data).done(function(res) {
            if (res) {
                w.notif("New Office budget added!", "success");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    }
    w.INVENTO.VM.officeBudgetVM = obVM;
}(window, jQuery, ko));