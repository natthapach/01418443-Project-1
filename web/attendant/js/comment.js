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
                    let dc = $("#comment-container").append("<div class='row comment'></div>").children().last();
                    // let di = d.append("<div class='col-xs-4'>&nbsp;</div>").children().last();
                    // let img = di.append('<img src="../../service/profile/'+comment.profile+'" width="100%"></img>');
                    // let dc = d.append("<div class='col-xs-8'></div>").children().last();
                    // dc.append("sadwsa");
                    // d.html(comment.user_name + "<br>" + comment.content);

                    // Dream
                    // imagePerson = '<img src="../../service/profile/'+comment.profile+'" width="200"></img>';
                    // commentBox ='<div class="comment-box">'+imagePerson+'<h3><b>'+comment.user_name+'</b></h3><p>'+comment.content + " <br>sssssssssssssssssssssssssss<br>Sdddddddddssssssssssssssssssssssssssssssssssssssssssssssss" +'</p></div>';
                    // d.html(commentBox);
                    // "../../service/profile/{res.profile}"
                    
                    let di = dc.append("<div class='col-2 comment-image-container'></div>").children().last();
                    let dt = dc.append("<div class='comment-box col-10 comment-content-container'></div>").children().last();

                    let img = di.append("<img src='../../service/profile/" + comment.profile + "' class='comment-box-img' width='100%'>").children().last();
                    dt.append("<h2><b>" + comment.user_name + "</b></h2>").append("<h5>" + comment.content + "</h5>")

                })
            },
            error:function(e){
                console.log(e);
            }
        })
    })
}