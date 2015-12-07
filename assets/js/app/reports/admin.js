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
            catField: "item_name",
            valField: "quantity",
            element: "onstock-items-report",
            color: "color",
            balloonText: "[[category]] : [[value]] stocks"
        });

        ChartConstructor({
            URL: "getExpiredItemStatistics",
            chartName: "expiredItemsReport",
            title: "Stocks",
            catField: "item_name",
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