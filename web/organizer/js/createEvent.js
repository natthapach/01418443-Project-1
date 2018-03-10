$(document).ready(function (e) {
    let n = 0;

    $("#picture-input").change(function(){
        console.log("onFileChange")
        previewPicture(this);
    });
    function previewPicture(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function(e) {
              let d = $('#pictures-display').append("<div style='display=inline-block'></div>").children().last();
              let preview = d.append("<img class='picture-preview' height='250px'>").children().last();
              preview.attr('src', e.target.result);
            //   $(".btnDeleteFile").show();
          }
  
          reader.readAsDataURL(input.files[0]);
  
        }
      }

    $(function () {
        $("#createEventForm").submit(function (event) {
            event.preventDefault();

            let eventName = $("#event-name").val();
            let eventPre = $("#event-pre").val();
            let eventCategory = $("#event-category").val();
            let eventInfo = $("#event-info").val();
            let eventPlace = $("#event-place").val();
            let eventMap = $("#event-map-geo").val();
            let eventStartDate = $("#event-start-date").val();
            let eventEndDate = $("#event-end-date").val();
            let eventCloseDate = $("#event-close-date").val();
            let eventPrice = $("#event-price").val();
            let eventForm = $("#event-google-form").val();
            let eventMaxAttendent = $("#event-max-attendent").val();
            let eventMaxAge = $("#event-max-age").val();
            let eventMinAge = $("#event-min-age").val();

            if (eventName == "" || eventPre=="" || eventCategory=="" ||eventInfo == "" || eventPlace == "" || eventMap == "" || 
                eventStartDate == "" || eventCloseDate == "" || eventPrice == "" || eventForm == "" || eventMaxAttendent == "" || 
                eventMaxAge == "" || eventMinAge == "") {
                    alert("Please fill all the empty fields.");
            } else {
                // If no pre event, then $eventPreId=0
                if(eventPre=="No Prerequisite") {
                    eventPreId = 0;
                } else { }
            
                let pictures = [];
                $(".picture-preview").each(function(){
                    pictures.push($(this).attr("src"));
                });

                console.log(pictures);

                let picture = $("#preview").attr("src");

                let data = {
                    eventName: eventName,
                    eventInfo: eventInfo,
                    eventPlace: eventPlace,
                    eventMap: eventMap,
                    eventStartDate: eventStartDate,
                    eventEndDate: eventEndDate,
                    eventCloseDate: eventCloseDate,
                    eventPrice: eventPrice,
                    eventForm: eventForm,
                    eventMaxAttendent: eventMaxAttendent,
                    eventMaxAge: eventMaxAge,
                    eventMinAge: eventMinAge,
                    picture: picture,
                    pictures: pictures
                };
            
                $.ajax({
                    url: '../../service/organizer/createEvent.php',
                    dataType: 'JSON',
                    type: 'POST',
                    data: data,
                    success: function (response) {
		                        console.log(response);
		                        alert('"' + eventName + '"' + ' event created. ' + response);
		                    },
                    error: function (error) {
		                        console.log(error);
		                    }
                });
            }
        });
    });
});