$(document).ready(function(e){
    console.log("ready");
    $.ajax({
        url:"../../service/organizer/getUserEvent.php",
        dataType:"json",
        success:(res)=>{
            res.forEach(element => {
               addEvent(element);
            });
        //     for(let i=0; i<res.length; i++){
        //         addEvent(i+1, res[i]);
        //     }
        }
    })
});

function addEvent(event){
    tbody = $("tbody.event-list");
    tr = tbody.append("<tr>adsa</tr>").children().last();
    tr.append("<th scope='row'>" + event.id + "</th>")
        .append("<td>" + event.name + "</td>")
        .append("<td>" + moment(event.event_start_date).format("D MMMM YYYY") + "</td>")
        .append("<td>" + event.attendants + "/" + event.max_attendents + "</td>");
    tr.click(function(e){
        onClickEvent(event.id);
    });
}

function onClickEvent(id){
    console.log(id);
    window.location.href = "eventDetail.php?event="+id;
}