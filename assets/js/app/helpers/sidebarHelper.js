(function(d, w, $, ko) {
    "use strict";

    $(d).ready(function() {
        var path = w.location.pathname.split("/"),
            pathLen = path.length,
            $el = $(".sidebar-menu"),
            elDataURi = $el.data("uri");

        if (elDataURi == path[pathLen - 1]) {
            $el.addClass("active");
        }else
    });

}(document, window, jQuery, ko));