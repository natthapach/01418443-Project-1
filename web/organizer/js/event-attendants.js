function onClickViewProof(path){
    console.log(path);
    var myWindow = window.open("", "MsgWindow", "width=500px,height=500px");
    myWindow.document.write("<img width='500px'src='" + "../../service/slip/" + path + "'>");
}

function onClickViewProof2(path){
    console.log(path);

}

function onClickConfirm(event_id, attendant_id){
    $.ajax({
        url:"../../service/organizer/confirmAttendant.php",
        type:"post",
        data:{
            event_id:event_id,
            attendant_id:attendant_id
        },
        success:function(response){
            console.log("response", response);
            if(response > 0){
                $("#paid-"+attendant_id).css("display", "none");
                $("#confirm-"+attendant_id).css("display", "block");
            }else{
                console.log("confirm fail")
            }
        }
    });
}