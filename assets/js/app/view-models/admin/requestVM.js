(function(w, j, ko) {
    "use strict";

    var x = w.INVENTO.XHR,
        requestVM = {
            datetime: ko.observable(),
            office_id: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
            reference_no: ko.observable(),
            status: ko.observable(),
            lastItemAdded: ko.observable(),
            budget: ko.observable(0.00),

            requestData: ko.observableArray([]),

            filterStart: ko.observable(),
            filterEnd: ko.observable(),
        },
        rVM = requestVM,
        $editRequestModal = $("#editRequestModal");

    function Item(_item) {

        var obj = {
            code: _item.code,
            name: _item.item_name,
            quantity: ko.observable(1),
            cost: _item.cost

        };
        obj.subTotal = ko.pureComputed(function() {
            return (parseFloat(obj.quantity()) * parseFloat(obj.cost)).toFixed(2);
        });

        return obj;
    }

    function EditItem(_item) {

        var obj = {
            code: _item.code,
            name: _item.name,
            quantity: ko.observable(_item.quantity),
            cost: _item.cost

        };
        obj.subTotal = ko.pureComputed(function() {
            return (parseFloat(obj.quantity()) * parseFloat(obj.cost)).toFixed(2);
        });

        return obj;
    }

    function RequestsData(data) {
        var arr = [],
            items = ko.utils.arrayForEach(data.items, function(item) {
                arr.push(new EditItem(item));
            });

        var obj = {
            datetime: ko.observable(data.datetime || ''),
            status: ko.observable(data.status),
            reference_no: ko.observable(data.reference_no || ''),
            items: ko.observableArray(arr),
        };
        return obj;
    }

    function Filter(filter) {
        x.post("reports/getRequestStatistics", {
            filter: filter
        }).done(function(res) {
            var res = JSON.parse(res);
            if (res) {
                w.INVENTO.AmCharts.requestsReport.dataProvider = res;
                w.INVENTO.AmCharts.requestsReport.validateData();
            } else {
                swal("No Record Found", "", "warning");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    }
    rVM.displayText = function(d) {
        return "REF NO. " + d.reference_no + " " + d.item_name + " (" + d.code + ")";
    };

    rVM.office_id.subscribe(function() {
        x.post("requests/getBudget/" + rVM.office_id()).done(function(res) {
            var res = JSON.parse(res);
            if (res.length) {
                rVM.budget(res[0].amount_given);
                localStorage.setItem("budget", res[0].amount_given);
            } else if (rVM.office_id() !== undefined) {
                w.INVENTO.VM.officeBudgetVM.office_id(rVM.office_id());
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

                        $("#addOfficeBudgetModal").modal("show");

                    }
                });
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    });

    rVM.canAdd = ko.pureComputed(function() {
        if (this.office_id() === undefined || this.budget() === 0) {
            return {
                display: 'none'
            };
        } else {
            return {
                display: 'block'
            };
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
        rVM.items.remove(item) || rvm.requestData()[0].items.remove(item);
    };
    rVM.editRemoveItem = function(item) {
        var items = rVM.requestData()[0].items;

        if (items().length > 1) {
            return items.remove(item);
        }
        $editRequestModal.modal("hide");

        swal({
            title: "Cannot empty request items!",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            closeOnConfirm: true,
        }, function(isConfirm) {
            if (isConfirm) {

                $editRequestModal.modal("show");

            }
        });
    };
    rVM.grandTotal = ko.pureComputed(function() {

        var total = 0,
            q,
            officeBudget = parseFloat(localStorage.budget);

        ko.utils.arrayForEach(rVM.items(), function() {
            total = parseFloat(this.subTotal()) + total;
        });

        var currentBudget = officeBudget - total;

        rVM.budget(currentBudget.toFixed(2));
        return total.toFixed(2);

    });

    rVM.editGrandTotal = ko.pureComputed(function() {
        var total = 0;

        ko.utils.arrayForEach(rVM.requestData()[0].items(), function(item) {
            total = parseFloat(item.subTotal()) + total;
        });

        return total;
    });

    rVM.budget.subscribe(function() {
        var amount_given = parseFloat(localStorage.budget),
            budget = rVM.budget(),
            q;
        if (budget < 0) {
            ko.utils.arrayForEach(rVM.items(), function() {
                this.quantity(1);

            });

            rVM.budget.notifySubscribers();
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
                swal("New Request added!", "", "success");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    };

    $("#requestsDT").on("click", ".request-action-btn", function() {
        var _id = $(this).data("id"),
            action = $(this).data("action");

        switch (action) {
            case "edit":
                x.getJ("requests/getData/" + _id).done(function(res) {
                    res[0].items = JSON.parse(res[0].items);
                    rVM.requestData([RequestsData(res[0])]);

                    $editRequestModal.modal("show");

                }).fail(function() {
                    swal("Whoops! Something went wrong.", "", "error");
                });

                break;
            case "update":
                break;
            case "delete":
                break;
            default:

        }

    });

    rVM.view = function(_id) {

        x.getJ("requests/getData/" + _id).done(function(res) {
            if (res) {
                res[0].items = JSON.parse(res[0].items);
                rVM.requestData(res);
                $("#viewRequestModal").modal("show");
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
        });
    };

    $("#requestsDT").on("click", ".request-delete", function() {
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
                x.post("requests/delete/" + _id).done(function(res) {
                    if (res) {
                        $("#requestTR_" + _id).addClass("animated zoomOutDown").hide('slow');
                        swal("Request deleted!", "", "success");
                    }
                }).fail(function() {
                    swal("Whoops! Something went wrong.", "", "error");
                });
            }
        });
    });

    rVM.filter = function(e) {
        var filterBy = e.target.getAttribute("filter"),
            filter = null;


        switch (filterBy) {
            case "last-year":
                filter = moment().startOf("year").subtract(1, "year").format("YYYY");
                break;
            case "this-year":
                filter = moment().startOf("year").format("YYYY");
                break;
            case "last-month":
                filter = {
                    start: moment().startOf("month").subtract(1, "month").format("YYYY-MM-DD"),
                    end: moment().endOf("month").subtract(1, "month").format("YYYY-MM-DD"),
                };
                break;
            case "this-month":
                filter = {
                    start: moment().startOf("month").format("YYYY-MM-DD"),
                    end: moment().format("YYYY-MM-DD")
                };
                break;
            case "last-week":
                filter = {
                    start: moment().startOf("week").subtract(1, "week").format("YYYY-MM-DD"),
                    end: moment().endOf("week").subtract(1, "week").format("YYYY-MM-DD")
                };
                break;
            case "this-week":
                filter = {
                    start: moment().startOf("week").format("YYYY-MM-DD"),
                    end: moment().endOf("week").format("YYYY-MM-DD")
                };
                break;
            case "custom":

                $("#customFilterModal").modal("show");
                break;
            default:
                filter = null;
        }

        if (($("#customFilterModal").data('bs.modal') || {}).isShown && !rVM.filterStart() && !rVM.filterEnd()) {
            return;
        }

        Filter(filter);
    };

    rVM.getCustomFilter = function() {
        var filter = {
            start: moment(rVM.filterStart()).format("YYYY-MM-DD"),
            end: moment(rVM.filterEnd()).format("YYYY-MM-DD")
        }

        Filter(filter);
    };

    $("#addRequestModal").on("hide.bs.modal", function() {
        localStorage['budget'] = null;
        console.log('hidden');
    });
    w.INVENTO.VM.requestVM = rVM;
}(window, jQuery, ko));