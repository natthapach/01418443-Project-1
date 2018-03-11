function start(event_id){
    console.log(event_id);

    $("#submit-comment").click(function(e){
        $.ajax({
            url:"../../service/attendant/sendComment.php",
            data:{
                comment:$("#comment-input").val(),
                event_id:event_id
            },
            type:"post",
            success:function(res){
                if(res!=0){
                    // success
                    loadComment(event_id);
                }

                console.log(res);
            }
        })
        console.log($("#comment-input").val());
        console.log($("#comment-input").val(""))
    });
    
    $(document).ready(function(e){
        loadComment(event_id);
    })
}

function loadComment(event_id){
    $.ajax({
        url:"../../service/attendant/getComments.php",
        dataType:"json",
        data:{
            event_id:event_id
        },
        type:"get",
        success:function(res){
            console.log("res", res);
            $("#comment-container").empty();
            res.forEach(comment=>{
                let dc = $("#comment-container").append("<div class='row comment'></div>").children().last();
                
                let di = dc.append("<div class='col-xs-4 col-sm-2 comment-image-container'></div>").children().last();
                let dt = dc.append("<div class='comment-box col-xs-8 col-sm-10 comment-content-container'></div>").children().last();

                let img = di.append("<img src='../../service/profile/" + comment.profile + "' class='comment-box-img' width='100%'>").children().last();
                dt.append("<h2><b>" + comment.user_name + "</b></h2>").append("<h5>" + comment.content.replace(/\n/g, "<br>") + "</h5>")

            })
        },
        error:function(e){
            console.log(e);
        }
    })
}