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
                    let d = $("#comment-container");
                    let di = d.append("<div class='col-xs-4'>&nbsp;</div>").children().last();
                    // let img = di.append('<img src="../../service/profile/'+comment.profile+'" width="100%"></img>');
                    let dc = d.append("<div class='col-xs-8'></div>").children().last();
                    dc.append("sadwsa");
                    // d.html(comment.user_name + "<br>" + comment.content);

                    // Dream
                    // imagePerson = '<img src="../../service/profile/'+comment.profile+'" width="200"></img>';
                    // commentBox ='<div class="comment-box">'+imagePerson+'<h3><b>'+comment.user_name+'</b></h3><p>'+comment.content + " <br>sssssssssssssssssssssssssss<br>Sdddddddddssssssssssssssssssssssssssssssssssssssssssssssss" +'</p></div>';
                    // d.html(commentBox);
                    // "../../service/profile/{res.profile}"
                })
            },
            error:function(e){
                console.log(e);
            }
        })
    })
}