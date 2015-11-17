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
        reportVM = {
            datetime: ko.observable(),
            office_id: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
            status: ko.observable(),
            lastItemAdded: ko.observable(),
            budget: ko.observable(0),
			monthFrom : ko.observable(),
            monthTo : ko.observable(),
            year : ko.observable(),

            requestData: ko.observableArray([]),
            SimpleLineData: ko.observable(),
        },
        repVM = reportVM;

    repVM.displayText = function(d) {
        return "REF NO. " + d.reference_no + " " + d.item_name + " (" + d.code + ")";
    };
    repVM.office_id.subscribe(function() {
        x.post("requests/getBudget/" + repVM.office_id()).done(function(res) {
            var res = JSON.parse(res);
            if (res.length) {
                repVM.budget(res[0].amount_given);
                localStorage.setItem("budget", res[0].amount_given);
            } else {
                repVM.budget(0);
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
                        w.INVENTO.VM.officeBudgetVM.office_id(repVM.office_id());
                        $("#addOfficeBudgetModal").modal("show");

                    }
                });
            }

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    });

    repVM.selected_item.subscribe(function() {
        if (repVM.selected_item()) {
            repVM.lastItemAdded(repVM.selected_item());
            repVM.items.push(new Item(repVM.selected_item()));
            repVM.selected_item(undefined);
        }
    });

    repVM.removeItem = function(item) {
        repVM.items.remove(item);
    };

    repVM.grandTotal = ko.pureComputed(function() {
        var total = 0,
            officeBudget = parseFloat(localStorage.budget);
        $.each(repVM.items(), function() {
            total = parseFloat(this.subTotal()) + total;
        });

        var currentBudget = officeBudget - total;
        repVM.budget(currentBudget.toFixed(2));
        // if(total < officeBudget){
        //     return total.toFixed(2);
        // }else{
        //     alert("Not enough budget!");
        // }
        return total.toFixed(2);

    });

    repVM.budget.subscribe(function() {
        if (repVM.budget() < 0) {
            alert('Warning! Not enough budget!');
        }
    });

    repVM.handleSubmit = function() {
        var data = {
            datetime: moment(repVM.datetime()).format('YYYY-MM-DD hh:mm'),
            office_id: repVM.office_id(),
            items: ko.toJSON(repVM.items()),
            status: repVM.status(),
            grand_total: repVM.grandTotal(),
        };

        x.post("requests/save", data).done(function(res) {
            if (res) {
                w.notif("New Request added!", "success");
            }

        }).fail(function() {
            w.notif("asdfasdfasd!", "success");
        });
    };

    repVM.edit = function(_id) {
        x.getJ("requests/getData/" + _id).done(function(res) {
            res[0].items = JSON.parse(res[0].items);
            // console.log(res.items);
            repVM.requestData(res);
            $("#editRequestModal").modal("show");

        }).fail(function() {
            w.notif("Whoops! Something went wrong.", "error");
        });
    };
	
    
    $("#addRequestModal").on("hide.bs.modal", function() {
        localStorage['budget'] = null;
    });
	
	    repVM.handlePurchaseReport = function() {
        var data = {
            monthFrom : repVM.monthFrom(),
            monthTo : repVM.monthTo(),
            year : repVM.year(),
         
        };
	    x.post("reports/get_purchases/" , data).done(function(res) {
		res= JSON.parse(res);
        repVM.SimpleLineData({
            labels: res[0],
            datasets: [{
                 label: "Total Purchases from Suppliers",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: res[1]
            }]
        });

      //  new Chart($("#lineChart").get(0).getContext("2d")).Line(repVM.SimpleLineData());
				$('.containerPurchases').empty();
				$('.containerPurchases').append('</br><center><h4><span id="divTitle"></span></h4></center></br><canvas id="purchasesChart" width="800" height="400"></canvas>');
					var ctx = document.getElementById("purchasesChart").getContext("2d");
						window.myBar = new Chart(ctx).Bar(repVM.SimpleLineData(), {
						responsive : true
							});
				 document.getElementById("legendPurchases").innerHTML = myBar.generateLegend();
				 $('#divTitle').html('Report for Total Purchases from '+repVM.monthFrom()+' to '+repVM.monthTo()+' '+repVM.year())
				 
    });
		};	
	
	
	
    w.INVENTO.VM.reportVM = repVM;
}(window, jQuery, ko));