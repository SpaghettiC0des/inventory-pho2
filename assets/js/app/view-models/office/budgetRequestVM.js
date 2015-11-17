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
            year: brVM.year(),
            amount: brVM.amount(),
            type: 'budget'
        };

        x.post('requests/requestBudget',data).done(function(res){
            if (res) {
                swal("Budget requested!","","success");    
            }
            
        }).fail(function(){
            w.notif("Whoops! Something went wrong.", "error");
        });
    };
    w.INVENTO.VM.budgetRequestVM = brVM;
}(window, jQuery, ko));