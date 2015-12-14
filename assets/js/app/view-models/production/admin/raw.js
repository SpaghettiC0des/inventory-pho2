(function(w, j, ko) {
    "use strict";
    var x = w.INVENTO.XHR,
        dataObjects = {
            allSuppliers: ko.observableArray([]),
            allCategories: ko.observableArray([]),
            allItems: ko.observableArray([]),
            allDistricts: ko.observableArray([]),
            allOffices: ko.observableArray([]),
            allReferenceNumbers: ko.observableArray([]),
            allUsers: ko.observableArray([]),
            settings: ko.observableArray([]),

        },
        DO = dataObjects;

    x.getJ("ajax_source/admin").done(function(res) {
        DO.allSuppliers(res.suppliers);
        DO.allCategories(res.categories);
        DO.allItems(res.items);
        DO.allDistricts(res.districts);
        DO.allOffices(res.offices);
        DO.allReferenceNumbers(res.reference_numbers);
        DO.allUsers(res.users);
        DO.settings(res.settings);

        //  var test = ko.toJS(res.settings[0].configs);
        // console.log(ko.toJS(res.settings[0].configs));
        //DO.settings(test);

    }).fail(function() {
        // alert('whoops, dataObjects!');
    });

    w.INVENTO.VM.dataObjects = dataObjects;

}(window, jQuery, ko));

(function(w, $) {
    "use strict";
    var ChartConstructor = w.INVENTO.helpers.chartConstructor;

    AmCharts.ready(function() {
        ChartConstructor({
            URL: "getItemStatistics",
            chartName: "itemsReport",
            title: "Stocks",
            catField: "item",
            valField: "quantity",
            element: "chartdiv",
            color: "color",
            balloonText: "[[category]] : [[value]] stocks"
        });

        ChartConstructor({
            URL: "getDistrictStatistics",
            chartName: "districtsReport",
            title: "Offices per district",
            catField: "name",
            valField: "offices",
            element: "district-report",
            balloonText: "[[category]] : [[value]] office/s"
        });


        ChartConstructor({
            URL: "getOfficeBudgetStatistics",
            chartName: "budgetsReport",
            title: "Budget Overview",
            catField: "office_name",
            valField: "budget",
            element: "office-budget-report",
            color: "color",
            balloonText: "[[category]] : ₱ [[value]]"
        });

        ChartConstructor({
            URL: "getCategoryStatistics",
            chartName: "categoriesReport",
            title: "Items per Category",
            catField: "category_name",
            valField: "item_count",
            element: "categories-report",
            balloonText: "[[category]] : [[value]] items"
        });

        ChartConstructor({
            URL: "getSupplierStatistics",
            chartName: "suppliersReport",
            title: "Items per Supplier",
            catField: "supplier_name",
            valField: "item_count",
            element: "suppliers-report",
            balloonText: "[[category]] : [[value]] items"
        });

        ChartConstructor({
            URL: "getItemStatistics",
            chartName: "allItemsReport",
            title: "Stocks",
            catField: "item",
            valField: "quantity",
            element: "all-items-report",
            color: "color",
            balloonText: "[[category]] : [[value]] stocks"
        });

        ChartConstructor({
            URL: "getOnStockItemStatistics",
            chartName: "onStockItemsReport",
            title: "Stocks",
            catField: "item",
            valField: "quantity",
            element: "onstock-items-report",
            color: "color",
            balloonText: "[[category]] : [[value]] stocks"
        });

        ChartConstructor({
            URL: "getExpiredItemStatistics",
            chartName: "expiredItemsReport",
            title: "Stocks",
            catField: "item",
            valField: "quantity",
            element: "expired-items-report",
            balloonText: "[[category]] : [[value]]"
        });

        ChartConstructor({
            URL: "getPurchaseStatistics",
            chartName: "purchasesReport",
            title: "Purchases by status",
            catField: "status",
            valField: "status_count",
            element: "purchases-report",
            balloonText: "[[category]] : [[value]]"
        });

        ChartConstructor({
            URL: "getTransactionStatistics",
            chartName: "transactionsReport",
            title: "Transactions by Payment Status",
            catField: "status",
            valField: "status_count",
            element: "transactions-report",
            balloonText: "[[category]] : [[value]]"
        });

        ChartConstructor({
            URL: "getRequestStatistics",
            chartName: "requestsReport",
            title: "Requests by Status",
            catField: "status",
            valField: "status_count",
            element: "requests-report",
            balloonText: "[[category]] : [[value]]"
        });

        ChartConstructor({
            URL: "getUserStatistics",
            chartName: "usersReport",
            title: "User by Role",
            catField: "role",
            valField: "role_count",
            element: "users-report",
            balloonText: "[[category]] : [[value]]"
        });
    });
}(window, jQuery));
