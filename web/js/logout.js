$(document).ready(function(e){
    $("#logout-btn").click(function(){
        console.log("click logout")
        $.ajax({
            url:"../../service/admin/server.php",
            type:"get",
            data:{
                "logout":"ok"
            },
            success:function(response){
                window.location.href = "../../web/admin";
            }
        })
    })
    $("#log-out").click(function(){
        console.log("click logout")
        $.ajax({
            url:"../../service/admin/server.php",
            type:"get",
            data:{
                "logout":"ok"
            },
            success:function(response){
                window.location.href = "../../web/admin";
            }
        })
    })
});