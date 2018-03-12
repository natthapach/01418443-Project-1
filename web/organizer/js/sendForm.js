// Tutorial
// https://codepen.io/rheajt/pen/prGjdV/?editors=1010
// https://www.youtube.com/watch?v=2Vx00MAmhbs
// https://script.google.com/a/ku.th/d/1GSSRTfrNuZoXabGlY_wZ159NkUnCS9Jdm1XVkZeZO2iWxRlzr5Ytx-ID/edit?usp=sharing

$(document).ready(function (e) {
    $(function () {
        $(document).on("click", '#google-form-btn', function (event) {
            event.preventDefault();
            alert("button press eiei");


            // Get Event Name, Google Form Link, Attendants's Emails

            let data = {
                eventName: "",
                formLink: "",
                email: {
                    
                }
            };
            // POST to Google App Scripts
            $.ajax({
                url: "https://script.google.com/macros/s/AKfycbwetsM68Ca1L30lwBmDtq6iqzQXQ4UivqiGR4uyNQNu0WaR82Y/exec",
                dataType: "JSON",
                type: "POST",
                data: data,
                success: function (e) {
                    alert("Success: " + e);
                },
                error: function (e) {
                    alert("Error: " + e);
                }
            });
        });
    });
});



// function sendEmail() {
//     // e.preventDefault();
//     const MAIL_APP = "https://script.google.com/macros/s/AKfycbwetsM68Ca1L30lwBmDtq6iqzQXQ4UivqiGR4uyNQNu0WaR82Y/exec";
//     const POST_REQ = {
//         attendant: "",
//         organizer: <?php echo $event->organizer->name?>,
//         eventName: "",
//         formLink: "",
//         email: ""
//     };

//     if(MAIL_APP) {
//         $.post(MAIL_APP, JSON.stringify(POST_REQ), function(){
//             alert("Mail sent!");
//         })
//         .fail(function(){
//             alert("Something went wrong");
//         });
//     }
// }