(function ($) {
    $(document).ready(function ($) {

        let target = $("#items-list")
        let btn = $(".load-more-btn")
        let loader = $(".loader-wrap .loader")
        let loading = false

        let app = {
            loaded: target.data("default-items"),
            itemsPerPage: target.data("items-per-page"),
            total: target.data("total-items"),
            infinityScroll: target.data("infinity-scroll")
        }

        //handle click event
        btn.on("click", function () {
            btn.addClass("disabled")
            loadItemsAjax()
        })

        //handle scroll event
        $(window).on("scroll load", function () {
            app.infinityScroll && infinityScroll()
        })

        //handle infinity scroll
        function infinityScroll() {
            if(app.loaded >= app.total || loading) {
                return
            }

            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loading = true
                loader.show()
                loadItemsAjax()
            }
        }

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

                    //load more button
                    app.loaded >= app.total ? btn.addClass("hide") : btn.removeClass("disabled")

                    //infinity scroll
                    if(app.infinityScroll) {
                        loading = false
                        app.loaded >= app.total ? loader.hide() : loader.show()
                        infinityScroll()
                    }
                }
            })
        }
    });
})(jQuery);