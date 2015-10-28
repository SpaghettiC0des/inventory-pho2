(function(w, j, ko) {
    "use strict";

    var officeBudgetVM = {
        office_id:ko.observable(),
        amount:ko.observable(),

    },obVM = officeBudgetVM;

    w.INVENTO.VM.officeBudgetVM = obVM;
}(window, jQuery, ko));