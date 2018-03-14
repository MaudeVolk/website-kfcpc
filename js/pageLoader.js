/**
Title: Page Content Loader Script

Purpose: Grab pages from the page folder and load them into the content section.

Written with: Javascript, JQuery

Written by: Donald Nash <donaldnash1989@gmail.com>
*/

$(document).ready(function() {

    var originalTitle = document.title;
    var div = $("#mainContent");

    if (localStorage["currentContent"] == undefined) {

      //Change this to change the default page
        localStorage["currentContent"] = "home";
    }

    loadPage(div, localStorage["currentContent"]);

    $(".replaceContent").click(function() {

        var page = $(this).attr("name");
        localStorage["currentContent"] = page;
        loadPage(div, page);

    });

    var originalTitle = document.title

    function hashChange() {

        var page = location.hash.slice(1);
        if (page != "") {
            localStorage["currentContent"] = page.substring(5, page.length);
            document.title = originalTitle + " " + page;
        }

    }

    if ("onhashchange" in window) {
        $(window).on('hashchange', hashChange).trigger('hashchange')
    } else {
        var lastHash = ''
        setInterval(function() {
            if (lastHash != location.hash)
                hashChange()
            lastHash = location.hash
        }, 100)
    }
});

var loadPage = function(div, page) {
    page = "page/" + page + ".php";
    location.hash = page.match(/(^.*)\./)[1];
    div.load(page);
}
