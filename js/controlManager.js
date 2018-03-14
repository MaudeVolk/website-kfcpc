var controls = $(".control");
var first = true;

function setup() {
    controls.each(function() {
        $(this).hide(0, function() {});
    });
}

function reset(currentControl, controlName, callbackFunction) {
    controls.each(function() {
        var control = $(this);
        if (control.is(':visible')) {
            control.fadeOut(1000, function() {
                if (controlName == "") {
                    first = true;
                    $(currentControl).attr('disabled', false);
                }
                if (typeof callbackFunction == "function") {
                    callbackFunction.call(this, controlName);
                }
            });
        } else {}
    });
    if (first == true) {
        callbackFunction.call(this);
        first = !first;
    }
}

function showControls(control) {
    $("#" + control).fadeIn(1000, function() {
        $("#controlDropdown").attr('disabled', false);
    });
}
