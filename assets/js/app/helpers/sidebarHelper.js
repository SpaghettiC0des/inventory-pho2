(function(d, w, $, ko) {
    "use strict";


    var currentUrl = w.location.href,
        $el = $("a[href='" + currentUrl + "']"),
        $elHref = $el.attr("href"),
        $parent = $el.parent(".sub-menu");

        if (currentUrl.indexOf($elHref.split("/")[4])) {
            $el.addClass("active");  
            // if($parent.length){
            //     $parent.addClass("active");
            // }

            console.log(1);
        } else {
            $el.parent("li").removeClass("active");
            console.log(0);
        }

}(document, window, jQuery, ko));