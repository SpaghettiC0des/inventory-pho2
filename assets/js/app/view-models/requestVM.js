(function(w, j, ko) {
    "use strict";

    function Item(_item) {
        var obj = {
            code: _item.code,
            name: _item.name,
            quantity: ko.observable(1),
            price: _item.price,
        };
        obj.subTotal = ko.pureComputed(function() {
            return (parseFloat(obj.quantity()) * parseFloat(obj.price)).toFixed(2);
        });

        return obj;
    }

    var x = w.INVENTO.XHR,
        requestVM = {
            datetime: ko.observable(),
            office_id: ko.observable(),
            selected_item: ko.observable(),
            items: ko.observableArray([]),
        },
        rVM = requestVM;

    rVM.selected_item.subscribe( function () {
        if( rVM.selected_item() ) {
            rVM.items.push( new Item( rVM.selected_item() ) );
        }
    });

    rVM.grandTotal = ko.pureComputed( function () {
            var total = 0;
            $.each( rVM.items(), function(){
                total = parseFloat(this.subTotal()) + total;    
            });

            return total.toFixed(2);
        })

    rVM.handleSubmit = function() {
        var data = {
            datetime: moment(rVM.datetime()).format('YYYY-MM-DD hh:mm'),
            office_id: rVM.office_id(),
            items: ko.toJSON(rVM.items()),
        };

        x.post("requests/save", data).done(function(res) {
            if (res) {
                w.notif("New Request added!", "success");
            }

        }).fail(function() {
            w.notif("asdfasdfasd!", "success");
        });
    };

    w.INVENTO.VM.requestVM = rVM;
}(window, jQuery, ko));