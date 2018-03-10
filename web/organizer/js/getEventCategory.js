$(document).ready(function(){
    $.ajax({
        url:"../../service/organizer/getEventCategory.php",
        dataType:"JSON",
        success: function(categoryList) {
            addOptionC(categoryList)
        },
        error: function(error){
            console.log(error)
        }
    });
});

function addOptionC(options) {
    select = $('#event-category');
    options.forEach(function(item) {
        select.append('<option>'+item[0]+'</option>');
    });
}