(function(w, j, ko) {
    "use strict";


    var x = w.INVENTO.XHR,
        officeBudgetVM = {
            year: ko.observable(),
            office_id: ko.observable(),
            amount: ko.observable(),

            canSave: ko.observable(true),

            edit_year: ko.observable(),
            edit_office_id: ko.observable(),
            edit_amount: ko.observable(),
            updateID: ko.observable(),
        },
        obVM = officeBudgetVM;

    /**
     * Checks if current office selected has existing budget record
     * @return {[type]}     [description]
     */
    obVM.office_id.subscribe(function() {
        x.post("office_budgets/hasBudgetRecord/" + obVM.office_id()).done(function(res) {
            if (res == 1) {
                obVM.canSave(false);
                w.notif("The office has existing record!", "warning");
            } else {
                obVM.canSave(true);
            }
        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    });


    obVM.edit = function(_id) {
        x.getJ("office_budgets/getBudget/" + _id).done(function(res) {
            if (res) {
                obVM.updateID(_id);
                obVM.edit_year(moment(res.year, 'YYYY'));
                obVM.edit_office_id(res.office_id);
                obVM.edit_amount(res.amount_given);

                $("#editOfficeBudgetModal").modal("show");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    };

    obVM.deleteBudget = function(_id){
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
                x.post("office_budgets/delete/"+ _id).done(function(res){
                    if (res) {
                        swal("Office budget deleted!","", "success");  
                    }

                }).fail(function(){
                   swal("Whoops! Something went wrong. Please try again.","", "error");  
                });

                
            }
        });
    };

    obVM.handleSubmit = function() {
        var data = {
            year: moment(obVM.year()).format('YYYY'),
            office_id: obVM.office_id(),
            amount_given: obVM.amount(),
            amount_left: obVM.amount(),
        };

        x.post("office_budgets/save", data).done(function(res) {
            if (res) {
                w.notif("New Office budget added!", "success");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    };

    obVM.handleUpdate = function() {
        var data = {
            year: moment(obVM.edit_year()).format('YYYY'),
            office_id: obVM.edit_office_id(),
            amount_given: obVM.edit_amount(),
        };
        x.post("office_budgets/update/" + obVM.updateID(), data).done(function(res) {
            if (res) {
                $("#editOfficeBudgetModal").modal("hide");
                swal("Office budget updated!", "", "success");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    };
    w.INVENTO.VM.officeBudgetVM = obVM;
}(window, jQuery, ko));