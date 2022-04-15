require("../sass/style.scss");

require("../fonts/fontello/css/fontello.css");

require("./vendor/bootstrap-transition");
require("./vendor/bootstrap-collapse");

(function ($) {
    $(".section-ajax_posts_list").length > 0 && require("./custom/ajax_load_more.js");
})(jQuery);