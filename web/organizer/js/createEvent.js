// $(document).ready(function(e){

$(function(){
    $("#createEventForm").submit(function(event){
        event.preventDefault();
        // Not yet working get item from text field
        let eventName = $("#event-name").text();
        console.log(eventName);
        let data = {
            
        };
        $.ajax({
                url:'../../service/organizer/createEvent.php',
                dataType: "json",
                type:'POST',
                data:$(this).serialize(),
                success:function(result){
                    $("#response").text(result);
                }

        });
        console.log("Clicked.");
    });
});

// });