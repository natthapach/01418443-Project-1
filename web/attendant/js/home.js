var events;
function showEvent(event, order) {
    $("#event-table").append(`
    <div class="col-xs-12 col-sm-6">
    
    <div class="card event-card " style="width:100%"> <h3>`+event.name+`</h3>`+
    //(event.pictures.length > 0 ? `<img class="card-img-top" src='../../service/pictures/`+event.pictures[0]+`'alt="Card image" width="100%" height="150px">` : '') +'>'
        `<div class="card-body">
            <h5 class="card-title">`+event.place+`</h5>
            <p class="card-text">`+event.event_start_date+`</p>
            <form action="eventDetail.php?event=`+event.id+`" method="post">
            <label class="btn btn-primary" for="submit-btn`+event.id+`">Buy ticket</label><input hidden type="submit" name="submit-btn`+event.id+`" id="submit-btn`+event.id+`" class="btn btn-primary">
            </form>
        </div>
    </div>
    </div>
    `+(order % 3 == 0 ? '</div>' : ''));
}
function loadEvent(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            events = JSON.parse(this.responseText);
            console.log(events);
            
            for (i in events) {
                showEvent(events[i], i)
            }
        }
    };
    xmlhttp.open("GET", "../../service/attendant/loadEvent.php", true);
    xmlhttp.overrideMimeType('application/javascript; charset=utf-8')
    xmlhttp.send();
}
loadEvent();

// $(document).ready(function(e){
//     $.ajax({
//         url:"../../service/attendant/loadEvent.php",
//         type:"get",
//         dataType:"json",
//         success:function(events){
//             console.log(events)
//             for (i in events) {
//                 showEvent(events[i], i);
//             }
//         }
//     })
// });
