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
        }
    })
}

function alertCodeError(){

}