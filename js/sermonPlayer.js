var currentTrack = 0;
$("#sermonPlayer").prop("volume", 0.2);
$("#sermonPlayer")[0].src = $("#playlist li a")[0];
$("#playlist li").click(function(e) {
    e.preventDefault();
    $("#sermonPlayer")[0].src = $(this).children().attr("href");
    $("#sermonPlayer")[0].play();
    $("#playlist li").removeClass("current");
    currentTrack = $(this).parent().index();
    $(this).addClass("current");
});

$("#sermonPlayer")[0].addEventListener("ended", function() {
    currentTrack++;
    if (currentTrack == $("#playlist li a").length) {
        currentTrack = 0;
    }
    $("#playlist li").removeClass("current");
    $("#playlist li:eq(" + currentTrack + ")").addClass("current");
    $("#sermonPlayer")[0].src = $("#playlist li a")[currentTrack].href;
    $("#sermonPlayer")[0].play();
});
