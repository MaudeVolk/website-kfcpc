/**
Title: Text File Content Loader Script

Purpose: Read content from a text file and load it into the content page.

Written with: Javascript, JQuery

Written by: Donald Nash <donaldnash1989@gmail.com>
*/

//Grab the contentLoader script by name
var this_js_script = $('script[src*=contentLoader3]');

//grab the data in the phpFile parameter
var phpFile = this_js_script.attr('phpFile');

//grab the data in the textFile parameter
var textFile = this_js_script.attr('textFile');

//read and load the text from the text file
var lines = new Array();
    $.get('docs/'+textFile+'.txt', function(data){
            lines = data.split('^p'); // so each time a ; appears a new paragraph happens
            $.each(lines, function( i, value ) {
              $('#content3').append('<p>' + value + '</p>');
            });
        });
