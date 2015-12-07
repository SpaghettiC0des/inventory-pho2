(function(w, j, ko) {
    "use strict";

    function Filter(filter) {
        x.post("reports/getOfficeBudgetStatistics", {
            filter: filter
        }).done(function(res) {
            var res = JSON.parse(res);
            if (res) {
                w.INVENTO.AmCharts.budgetsReport.dataProvider = res;
                w.INVENTO.AmCharts.budgetsReport.validateData();
            } else {
                swal("No Record Found", "", "warning");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    }

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

            filterStart: ko.observable(),
            filterEnd: ko.observable(),
        },
        obVM = officeBudgetVM;

    /**
     * Checks if current office selected has existing budget record
     * @return {[void]}     
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
            swal("Whoops! Something went wrong.", "", "success");
        });
    });


    $("#officeBudgetsDT").on("click", ".budget-edit", function() {
        var _id = $(this).data("id");
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
    });

    $("#officeBudgetsDT").on("click", ".budget-delete", function() {
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
                x.post("office_budgets/delete/" + _id).done(function(res) {
                    if (res) {
                        $("#officeBudgetTR_" + _id).addClass("animated zoomOutDown").hide('slow');
                        //swal.close();
                        swal("Office Budget deleted!", "", "success");
                    }

                }).fail(function() {
                    swal("Whoops! Something went wrong. Please try again.", "", "error");
                });


            }
        });
    });

    obVM.handleSubmit = function() {
        var data = {
            year: moment(obVM.year()).format('YYYY'),
            office_id: obVM.office_id(),
            amount_given: obVM.amount(),
            amount_left: obVM.amount(),
        };

        x.post("office_budgets/save", data).done(function(res) {
            //console.log(res);
            //  if (res) {
            $("#addOfficeBudgetModal").modal("hide");
            swal("New Office Budget added!", "", "success");
            //    }

        }).fail(function() {
            swal("Whoops! Something went wrong.", "", "error");
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
            swal("Whoops! Something went wrong.", "", "error");
        });
    };

    obVM.filter = function(e) {
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

        if (($("#customFilterModal").data('bs.modal') || {}).isShown && !obVM.filterStart() && !obVM.filterEnd()) {
            return;
        }

        Filter(filter);
    };

    obVM.getCustomFilter = function() {
        var filter = {
            start: moment(obVM.filterStart()).format("YYYY-MM-DD"),
            end: moment(obVM.filterEnd()).format("YYYY-MM-DD")
        }

        Filter(filter);
    };

    w.INVENTO.VM.officeBudgetVM = obVM;
}(window, jQuery, ko));