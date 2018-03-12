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

function onClickExport(){
    // var doc = new jsPDF()
    
    // doc.text('Hello world!', 10, 10)
    // doc.save('a4.pdf')
    var doc = new jsPDF();
    // doc.addImage(imgData, "PNG", 10, 10);
    doc.text("<table><thead><td>id</td><td>name</td></thead><tr><td>1</td><td>eiei</td></tr></table>");
    doc.save("event-table.pdf");
    // html2canvas($("#event-table"), {
    //     onrendered : function(canvas){
    //         var imgData = canvas.toDataURL('image/png');
            
    //     }
    // })
}