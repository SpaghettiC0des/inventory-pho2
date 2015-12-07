(function(w, $, ko) {
    "use strict";

    var x = w.INVENTO.XHR,
        budgetRequestVM = {
            year: ko.observable(),
            amount: ko.observable(),
        },
        brVM = budgetRequestVM;

    brVM.handleSubmit = function() {
        var data = {
            year: moment(brVM.year()).format('YYYY'),
            amount: brVM.amount()
        };

        x.post('office/office_requests/requestBudget', data).done(function(res) {
            if (res) {
                $("#addBudgetRequestModal").modal("hide");
                swal("Budget requested!", "", "success");
            }

        }).fail(function() {
            swal("Whoops!", "", "error");
        });
    };
    w.INVENTO.VM.budgetRequestVM = brVM;

}(window, jQuery, ko));