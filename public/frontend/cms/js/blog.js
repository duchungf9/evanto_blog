$(document).ready(function ($) {
    $("#navMenuBox").click(function (e) {
        var n = $("#nvTop");
        n.toggleClass("active"), $(".hideClick").toggleClass("hideNow")
    })
});