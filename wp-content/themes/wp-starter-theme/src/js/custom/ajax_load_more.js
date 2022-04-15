(function ($) {
    $(document).ready(function ($) {

        let target = $("#items-list")
        let btn = $(".load-more-btn")

        let defaultItems = target.data("default-items")
        let requestItems = target.data("request-items")
        let totalItems = target.data("total-items")
        let loadedItems = defaultItems

        //handle click
        btn.on("click", function () {
            btn.addClass("disabled")
            loadItemsAjax()
        })

        //load items
        function loadItemsAjax() {
            $.ajax({
                url: ajax_object.ajax_url,
                type : "post",
                data : {
                    offset: loadedItems,
                    requestItems: requestItems,
                    action: "ajax_load_more",
                },
                success: function(response) {

                    if( loadedItems + requestItems > totalItems ) {
                        loadedItems = totalItems
                    } else {
                        loadedItems += requestItems
                    }

                    target.append(response);
                    loadedItems >= totalItems ? btn.addClass("hide") : btn.removeClass("disabled")
                }
            })
        }
    });
})(jQuery);