(function ($) {
    $(document).ready(function ($) {

        let target = $("#items-list")
        let btn = $(".load-more-btn")

        let app = {
            loaded: target.data("default-items"),
            itemsPerPage: target.data("items-per-page"),
            total: target.data("total-items")
        }

        //handle click
        btn.on("click", function () {
            btn.addClass("disabled")
            loadItemsAjax()
        })

        //load items
        function loadItemsAjax() {
            $.ajax({
                url: ajax_object.ajax_url,
                dataType: "json",
                type : "post",
                data : {
                    offset: app.loaded,
                    itemsPerPage: app.itemsPerPage,
                    action: "ajax_load_more",
                },
                success: function(response) {
                    app.loaded += response.length
                    target.append(response);
                    app.loaded >= app.total ? btn.addClass("hide") : btn.removeClass("disabled")
                }
            })
        }
    });
})(jQuery);