var scanFlag = 1;

function onQRCodeScanned(scannedText)
{
    if(scanFlag==1){
        console.log(scannedText);
        $("#scannedTextMemo").text(scannedText);
        checkin(scannedText);
    }
    
}

function onClickCheckIn(){
    if(scanFlag==1){
        let code = $("#code-input").val();
        checkin(code);
    }
    
}
function checkin(code){
    scanFlag = 0;
    let token = code.split("-");
    if(token.length!=2){
        alertCodeError();
    }
    $.ajax({
        url:"../../service/organizer/checkin.php",
        type:"post",
        data:{
            attendant_id:token[0],
            event_id:token[1]
        },
        dataType:"json",
        success:function(response){
            console.log(response);
            // var x = document.getElementById("snackbar");
		    // x.className = "show";
            // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            let snackbar = $("#snackbar");
            if(response == 0){
                snackbar.text("Check in Fail");
                snackbar.css("background-color", "#FF7560");
            }else{
                snackbar.text("Check in Complete");
                snackbar.css("background-color", "#8E9BFF");

                $("#attendant-name").text(response.attendant_fn + " " + response.attendant_ln)
                $("#event-name").text(response.event_name);
                $("#attendant-profile").attr("src", "../../service/profile/" + response.profile);
            }
            
            snackbar.addClass("show");
            setTimeout(function(){
                snackbar.removeClass("show");
                scanFlag = 1;
            }, 1500);

            sendEmail(token[0], token[1]);
        }
    })
}

function alertCodeError(){

}

function sendEmail(attendant_id, event_id){
    $.ajax({
        url:"../../service/organizer/getSingleFormBundle.php",
        type:"post",
        dataType:"json",
        data:{
            attendant_id : attendant_id,
            event_id : event_id
        },
        success:function(response){
            console.log("getSingleFormBundle success");
            console.log(response);
            sendFormEmail(response);
        },
        error:function(e){
            console.log("getSingleFormBundle error");
            console.log(e);
        }
    })
}

function sendFormEmail(bundle){
    let data = {
        eventName:bundle.event_name,
        organizer:bundle.organizer_name,
        attendant:bundle.first_name + " " + bundle.last_name,
        formLink:bundle.google_form,
        email:bundle.email
    };
    console.log("data", data)
    $.ajax({
        url:"../../service/organizer/sendEmail.php",
        data:data,
        type:"post",
        success:function(response){
            console.log("send email success");
            console.log(response);
        },
        event:function(e){
            console.log("send email error");
            console.log(e);
        }
    })
}