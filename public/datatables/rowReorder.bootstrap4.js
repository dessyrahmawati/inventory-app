/*! Bootstrap 4 styling wrapper for RowReorder
 * © SpryMedia Ltd - datatables.net/license
 */

(function (factory) {
    if (typeof define === "function" && define.amd) {
        // AMD
        define([
            "jquery",
            "datatables.net-bs4",
            "datatables.net-rowreorder",
        ], function ($) {
            return factory($, window, document);
        });
    } else if (typeof exports === "object") {
        // CommonJS
        var jq = require("jquery");
        var cjsRequires = function (root, $) {
            if (!$.fn.dataTable) {
                require("datatables.net-bs4")(root, $);
            }

            if (!$.fn.dataTable.RowReorder) {
                require("datatables.net-rowreorder")(root, $);
            }
        };

        if (typeof window === "undefined") {
            module.exports = function (root, $) {
                if (!root) {
                    // CommonJS environments without a window global must pass a
                    // root. This will give an error otherwise
                    root = window;
                }

                if (!$) {
                    $ = jq(root);
                }

                cjsRequires(root, $);
                return factory($, root, root.document);
            };
        } else {
            cjsRequires(window, jq);
            module.exports = factory(jq, window, window.document);
        }
    } else {
        // Browser
        factory(jQuery, window, document);
    }
})(function ($, window, document) {
    "use strict";
    var DataTable = $.fn.dataTable;

    return DataTable;
});
