(function(w, $, ko) {
    "use strict";

    function error() {
        swal("No request available for this office", "", "error");
    }

    function success(msg) {
        swal("Trasaction " + msg + "!", "", "success");
    }


    var x = w.INVENTO.XHR,
        transactionVM = {
            date: ko.observable(),
            details: ko.observable(),
            office_id: ko.observable(),
            updateID: ko.observable(),
            amount: ko.observable(1),
            selectedOfficeRefNos: ko.observableArray([]),
            isVisible: ko.observable('none'),
        },
        tVM = transactionVM;

    tVM.office_id.subscribe(function(selectedOffice) {
        var record = ko.utils.arrayFilter(w.INVENTO.VM.dataObjects.allReferenceNumbers(),
            function(rfn) {
                return rfn.office_id == selectedOffice;
            });
        if (record.length) {
            tVM.selectedOfficeRefNos(record);
            return tVM.isVisible('block');
        }

        tVM.isVisible('none');
        error();
    });
    tVM.canSave = ko.pureComputed(function() {
        if (tVM.selectedOfficeRefNos().length) {
            if (tVM.date() && tVM.details()) {
                return true;
            }
        }

        return false;
    });
    tVM.grandTotal = ko.pureComputed(function() {
        if (tVM.details()) {
            return (parseFloat(tVM.details().grand_total) - parseFloat(tVM.amount())).toFixed(2);
        }
        return 0;
    });

    tVM.hasGrandTotal = ko.pureComputed(function() {
        if (tVM.grandTotal()) {
            return 'block';
        }

        return 'none';
    });
    tVM.handleSubmit = function() {

        var _status = tVM.grandTotal() == 0 ? 'Paid' : 'Partial',
            data = {
                request_id: tVM.details().request_id,
                datetime: moment(tVM.date()).format('YYYY-MM-DD hh:mm'),
                reference_no: tVM.details().reference_no,
                office_id: tVM.office_id(),
                status: _status,
                amount_paid: tVM.amount(),
                amount_left: tVM.grandTotal(),
            };
        x.post("transactions/save", data).done(function(res) {
            if (res) {
                $("#addTransactionModal").modal("hide");
                swal({
                        title: "Transaction saved!",
                        type: "success"
                    },
                    function(isConfirm) {
                        $('#addTransactionModal').modal("show");
                    });
            }

        }).fail(function() {
            swal("Whoops! Something went wrong.","","error");
        });
    };
	
	$("#transactionsDT").on("click", ".transaction-delete", function() {
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
				x.post("transactions/delete/" + _id).done(function(res) {
					if (res) {
						$("#transactionTR_" + _id).addClass("animated zoomOutDown").hide('slow');
						//swal.close();
						swal("Transaction deleted!", "", "success");
						//w.notif("District Deleted.", "success");
					}
				}).fail(function() {
					swal("Whoops! Something went wrong.", "", "error");
				});
			}
		});
	});
	
	$("#transactionsDT").on("click", ".transaction-edit", function() {
var _id = $(this).data("id");
        x.getJ("office_budgets/getBudget/" + _id).done(function(res) {
            if (res) {
                tVM.updateID(_id);
              //  tVM.edit_year(moment(res.year, 'YYYY'));
              //  tVM.edit_office_id(res.office_id);
              //  tVM.edit_amount(res.amount_given);

                $("#editTransactionModal").modal("show");
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
	});
	
    w.INVENTO.VM.transactionVM = tVM;
}(window, jQuery, ko));