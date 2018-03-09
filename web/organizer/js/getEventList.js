$(document).ready(function () {
    $.ajax({
        url: '../../service/organizer/getEventList.php',
        dataType: 'JSON',
        success: function(response) {
            // Get an array of Event List of currently logged-in user
            // console.log(response);
            addOption(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
});

function addOption(options) {
    select = $('#event-pre');
    select.append('<option>No Prerequisite</option>').children().last();
    options.forEach(function(item) {
        select.append('<option>'+item[0]+'</option>');
    });
}