!(function (i) {
    "use strict";
    function e() {
        this.$body = i("body");
    }
    (e.prototype.init = function () {
        i("#jstree-2").jstree(
            { core:
                    {
                        themes:
                            { responsive: !1 }
                    },
                types: {
                    default: { icon: "dripicons-folder text-warning" },
                    file: { icon: "dripicons-document  text-warning" }
                },
                plugins: ["types"] })
        i("#jstree-2").on("select_node.jstree", function (e, t) {
            var n = i("#" + t.selected).find("a");
            if ("#" != n.attr("href") && "javascript:;" != n.attr("href") && "" != n.attr("href")) return "_blank" == n.attr("target") && (n.attr("href").target = "_blank"), (document.location.href = n.attr("href")), !1;
        })
    }),
        (i.JSTree = new e()),
        (i.JSTree.Constructor = e);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.JSTree.init();
    })();
