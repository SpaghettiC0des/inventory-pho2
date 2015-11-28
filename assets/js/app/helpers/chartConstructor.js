(function(w, $) {
    "use strict";
    var helpers = w.INVENTO.helpers;

    function createChart(options, data) {
        return AmCharts.makeChart(options.element, {
            type: "serial",
            dataProvider: data,

            valueAxes: [{
                axisAlpha: 0.2,
                title: options.title || ""
            }],
            graphs: [{
                balloonText: options.balloonText || "[[category]] : [[value]]",
                fillAlphas: 0.6,
                lineAlpha: 0.2,
                fillColorsField: options.color || "",
                type: "column",
                valueField: options.valField
            }],
            depth3D: 20,
            angle: 50,
            rotate: false,
            categoryField: options.catField,
            categoryAxis: {
                gridPosition: "start",
                fillAlpha: 0.5,
                position: "left",
                labelRotation: options.rotation || 90
            },
            export: {
                "enabled": true
            }
        });
    }

    helpers.chartConstructor = function ChartConstructor(options, data) {

        if (options.URL) {
            $.getJSON(window.INVENTO.baseURL + "reports/" + options.URL).done(function(data) {
                w[options.chartName] = createChart(options, data);
            });
        } else {
            createChart(options, data);
        }
    }
}(window, jQuery));