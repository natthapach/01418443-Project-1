// $(document).ready(function(e){

$(function(){
    $("#createEventForm").submit(function(event){
        event.preventDefault();

        let eventName = $("#event-name").val();
        let eventInfo = $("#event-info").val();
        let eventPlace = $("#event-place").val();
        // let eventMap = $("#event-map").val();
        let eventStartDate = $("#event-start-date").val();
        
        let eventEndDate = $("#event-end-date").val();
        let eventCloseDate = $("#event-close-date").val();
        let eventPrice = $("#event-price").val();
        let eventForm = $("#event-google-form").val();
        let eventMaxAttendent = $("#event-max-attendent").val();
        let eventMaxAge = $("#event-max-age").val();
        let eventMinAge = $("#event-min-age").val();

        let data = {
            eventName : eventName,
            eventInfo : eventInfo,
            eventPlace : eventPlace,
            // eventMap : eventMap,
            eventStartDate : eventStartDate,
            eventEndDate : eventEndDate,
            eventCloseDate : eventCloseDate,
            eventPrice : eventPrice,
            eventForm : eventForm,
            eventMaxAttendent : eventMaxAttendent,
            eventMaxAge : eventMaxAge,
            eventMinAge : eventMinAge
        };

        // console.log(eventName);
        // console.log(eventInfo);
        // console.log(eventPlace);
        // console.log("-");
        // console.log(eventStartDate);
        // console.log(eventEndDate);
        // console.log(eventCloseDate);
        // console.log(eventPrice);
        // console.log(eventForm);
        // console.log(eventMaxAttendent);
        // console.log(eventMaxAge);
        // console.log(eventMinAge);

        $.ajax({
                url: '../../service/organizer/createEvent.php',
                dataType: 'JSON',
                type: 'POST',
                data: data,
                success:function(response){
                    alert('"'+eventName+'"'+' event created. '+response);
                },
                error:function(error){
                    console.log(error);
                }
        });
    });
});

// });