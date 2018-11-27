/**
 * Author: yharif
 * Date: 11/03/2017
 *
 * Sending post requests with HTML anchor tag.
 */

$(document).on("click","[data-action=logout]", function(event){

    event.preventDefault();

    var formOptions = {
        'method': $(event.target).data("method"),
        'action': $(event.target).prop("href")
    };

    var inputOptions = {
        'name': $(event.target).data("param-name"),
        'value': $(event.target).data("param-value"),
        'type': 'hidden'
    };

    var placeholderForm = $('<form>', formOptions).append($('<input>', inputOptions));

    placeholderForm.appendTo(document.body).submit();

});
