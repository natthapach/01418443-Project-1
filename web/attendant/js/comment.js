function start(event_id){
    console.log(event_id);
    
    $(document).ready(function(e){
        $.ajax({
            url:"../../service/attendant/getComments.php",
            dataType:"json",
            data:{
                event_id:event_id
            },
            type:"get",
            success:function(res){
                console.log("res", res);
                res.forEach(comment=>{
                    let d = $("#comment-container").append("<div></div>").children().last();
                    d.html(comment.user_name + "<br>" + comment.content);

                    // "../../service/profile/{res.profile}"
                })
            },
            error:function(e){
                console.log(e);
            }
        })
    })
}