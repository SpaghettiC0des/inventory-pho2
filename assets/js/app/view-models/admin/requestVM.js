(function(w, j, ko) {
    "use strict";

    function Item(_item) {
        var obj = {
            code: _item.code,
            name: _item.item_name,
            quantity: ko.observable(1),
            cost: _item.cost,
        };
        obj.subTotal = ko.pureComputed(function() {
            return (parseFloat(obj.quantity()) * parseFloat(obj.cost)).toFixed(2);
        });

        return obj;
    }

    var x = w.INVENTO.XHR,
        requestVM = {
            datetime: ko.observable(),
            office_id: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
            reference_no:ko.observable(),
            status: ko.observable(),
            lastItemAdded: ko.observable(),
            budget: ko.observable(0.00),

            requestData: ko.observableArray([]),
        },
        rVM = requestVM;

    rVM.displayText = function(d) {
        return "REF NO. " + d.reference_no + " " + d.item_name + " (" + d.code + ")";
    };

    rVM.office_id.subscribe(function() {
        x.post("requests/getBudget/" + rVM.office_id()).done(function(res) {
            var res = JSON.parse(res);
            if (res.length) {
                rVM.budget(res[0].amount_given);
                localStorage.setItem("budget", res[0].amount_given);
            } else {
                rVM.budget(0.00);
                rVM.office_id(undefined);
                $("#addRequestModal").modal("hide");
                swal({
                    title: "Add budget for this office?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes",
                    cancelButtonText: "Not yet",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        w.INVENTO.VM.officeBudgetVM.office_id(rVM.office_id());
                        $("#addOfficeBudgetModal").modal("show");

                    }
                });
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    });
    
    rVM.canAdd = ko.pureComputed(function(){
        if(typeof this.office_id() === "undefined" && this.budget() === 0){

            return {display:'none'};
        }else{
            return {display:'block'};
        }
    }, rVM);

    rVM.selected_item.subscribe(function() {
        if (rVM.selected_item()) {
            rVM.lastItemAdded(rVM.selected_item());
            rVM.items.push(new Item(rVM.selected_item()));
            rVM.selected_item(undefined);
        }
    });

    rVM.removeItem = function(item) {
        rVM.items.remove(item);
    };

    rVM.grandTotal = ko.pureComputed(function() {
        var total = 0,
            officeBudget = parseFloat(localStorage.budget);
        $.each(rVM.items(), function() {
            total = parseFloat(this.subTotal()) + total;
        });

        var currentBudget = officeBudget - total;
        rVM.budget(currentBudget.toFixed(2));
        // if(total < officeBudget){
        //     return total.toFixed(2);
        // }else{
        //     alert("Not enough budget!");
        // }
        return total.toFixed(2);

    });

    rVM.budget.subscribe(function() {
        if (rVM.budget() < 0) {
            alert('Warning! Not enough budget!');
        }
    });

    rVM.handleSubmit = function() {
        var data = {
            datetime: moment(rVM.datetime()).format('YYYY-MM-DD hh:mm'),
            office_id: rVM.office_id(),
            items: ko.toJSON(rVM.items()),
            status: rVM.status(),
            reference_no: rVM.reference_no(),
            grand_total: rVM.grandTotal(),
            currentBudget: rVM.budget(),
        };

        x.post("requests/save", data).done(function(res) {
            if (res) {
                w.notif("New Request added!", "success");
            }

        }).fail(function() {
            w.notif("asdfasdfasd!", "success");
        });
    };

    rVM.edit = function(_id) {
        x.getJ("requests/getData/" + _id).done(function(res) {
            res[0].items = JSON.parse(res[0].items);
            // console.log(res.items);
            rVM.requestData(res);
            $("#editRequestModal").modal("show");

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    };

    rVM.view = function(_id) {

        x.getJ("requests/getData/" + _id).done(function(res) {
            if (res) {
                res[0].items = JSON.parse(res[0].items);
                // console.log(res.items);
                rVM.requestData(res);
                $("#viewRequestModal").modal("show");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });

    };
    $("#addRequestModal").on("hide.bs.modal", function() {
        localStorage['budget'] = null;
    });
    w.INVENTO.VM.requestVM = rVM;
}(window, jQuery, ko));