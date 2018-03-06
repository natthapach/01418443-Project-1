$(document).ready(function(e){
    console.log("ready");
    $.ajax({
        url:"../../service/organizer/getUserEvent.php",
        dataType:"json",
        success:(res)=>{
            // res.forEach(element => {
            //    addEvent(element);
            // });
            for(let i=0; i<res.length; i++){
                addEvent(i+1, res[i]);
            }
        }
    })
});

function addEvent(i, event){
    tbody = $("tbody.event-list");
    console.log(tbody.children());
    tr = tbody.append("<tr>adsa</tr>").children().last();
    tr.append("<th scope='row'>" + i + "</th>")
        .append("<td>" + event.name + "</td>")
        .append("<td>" + moment(event.event_start_date).format("D MMMM YYYY") + "</td>")
        .append("<td>attendant</td>");
    console.log(tbody.children());
}