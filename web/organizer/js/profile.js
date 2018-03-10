$(document).ready(function(e){
    $.ajax({
        url:"../../service/organizer/getUserProfile.php",
        dataType:"json",
        success:function(response){
            console.log(response);

            $("#profile-picture").attr("src", "../../service/profile/" + response.profile);
            $("#name-text").text(response.name);
            $("#web-text").text(response.website);
            $("#email-text").text(response.email);
            $("#phone-text").text(response.phone);
            $("#organized-event-text").text(response.total_event);
            $("#joined-attendant-text").text(response.total_attendant);
        }
    });
});