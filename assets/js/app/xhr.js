;(function ( w, $ , ko ) {
	"use strict";
	var _base = w.INVENTO.baseURL, xhr = {

		post : function ( url, data ) {
			return $.post( _base + url, data );
		},
		get : function ( url) {
			return $.get( _base + url );
		},
		getJ : function ( url) {
			return $.getJSON( _base + url );
		},
	};

	w.INVENTO.XHR = xhr;
}( window, jQuery, ko ));