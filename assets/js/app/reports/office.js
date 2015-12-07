(function(w, $) {
    "use strict";
    var ChartConstructor = w.INVENTO.helpers.chartConstructor;

    AmCharts.ready(function() {
        ChartConstructor({
            URL: "getOfficeRequestStatistics",
            chartName: "itemsReport",
            title: "Stocks",
            catField: "status",
            valField: "status_count",
            element: "requests-report",
            color: "color",
            balloonText: "[[category]] : [[value]] requests"
        });
    });
}(window, jQuery));