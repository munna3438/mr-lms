// dropdown

$(".dropdown_head").click(function (e) {
    const $thisDInner = $(this).parent().find(".dropdown_inner");
    const $accorDInner = $(".accordion").find(".dropdown_inner");
    const $accorDHead = $(".accordion").find(".dropdown_head");
    // if ($thisDInner.hasClass("show") && $(this).hasClass("active")) {
    //     $thisDInner.removeClass("show").slideUp();
    //     $(this).removeClass("active");
    // } else {
    //     $accorDInner.removeClass("show").slideUp();
    //     $accorDHead.removeClass("active");
    //     $thisDInner.toggleClass("show").slideToggle();
    //     $(this).toggleClass("active");
    // }
    if ($accorDInner.hasClass("show") && $accorDHead.hasClass("active")) {
        $accorDInner.removeClass("show").slideUp();
        $accorDHead.removeClass("active");
    }
    $thisDInner.addClass("show").slideDown();
    $(this).addClass("active");
});

// hide alert
$(".hide_area").click(function () {
    $(this).parent().hide();
});
