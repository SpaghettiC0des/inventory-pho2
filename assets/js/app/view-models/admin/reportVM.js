(function(w, j, ko) {
    "use strict";

    var x = w.INVENTO.XHR,
        reportVM = {
            datetime: ko.observable(),
            office_id: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
            status: ko.observable(),
            lastItemAdded: ko.observable(),
            budget: ko.observable(0),

            requestData: ko.observableArray([]),
            SimpleLineData: ko.observableArray([]),

        },
        repVM = reportVM;



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


    x.getJ("reports/get_purchases/").done(function(res) {
        repVM.SimpleLineData({
            labels: res[0],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: res[1]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: res[1]
            }]
        });

        new Chart($("#lineChart").get(0).getContext("2d")).Bar(repVM.SimpleLineData());
    });



    w.INVENTO.VM.reportVM = repVM;
}(window, jQuery, ko));