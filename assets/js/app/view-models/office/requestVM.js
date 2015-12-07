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
            reference_no: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
            status: ko.observable(),
            lastItemAdded: ko.observable(),

            budget: ko.observable(),
            requestData: ko.observableArray([]),
        },
        rVM = requestVM,
        DO = w.INVENTO.VM.dataObjects;

    rVM.displayText = function(d) {
        return "REF NO. " + d.reference_no + " " + d.item_name + " (" + d.code + ")";
    };

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

        ko.utils.arrayForEach(rVM.items(), function(item) {
            total = parseFloat(item.subTotal()) + total;
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
            $("#addRequestModal").modal("hide");
            swal("Not enough budget!","","warning");
        }
    });

    rVM.hasBudget = ko.pureComputed(function() {
        if (typeof DO.currentBudget() !== "undefined" && DO.currentBudget().length) {
            return true;
        } else {
            return false;
        }
    });


    rVM.handleSubmit = function() {
        var data = {
            datetime: moment(rVM.datetime()).format('YYYY-MM-DD hh:mm'),
            reference_no: rVM.reference_no(),
            items: ko.toJSON(rVM.items()),
            grand_total: rVM.grandTotal(),
        };

        x.post("office/office_requests/save", data).done(function(res) {
            if (res) {
                w.notif("New Request added!", "success");
            }

        }).fail(function() {
            w.notif("asdfasdfasd!", "success");
        });
    };

    rVM.edit = function(_id) {
        x.getJ("office/requests/getData/" + _id).done(function(res) {
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
    $("#addRequestModal").on("show.bs.modal", function() {
        var amountLeft = DO.currentBudget()[0].amount_left;
        rVM.budget(amountLeft);
        localStorage['budget'] = amountLeft;
    });
    $("#addRequestModal").on("hide.bs.modal", function() {
        rVM.items([]);
        localStorage['budget'] = 0.00;
    });
    w.INVENTO.VM.requestVM = rVM;
}(window, jQuery, ko));