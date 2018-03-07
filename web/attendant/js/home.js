var events;
function showEvent(event, order) {
    $("#event-table").append((order % 3 == 0 ? '<div class="row">' : '')+`
    <div class="col-sm-4">
    <h2>`+event.name+`</h2>
    <div class="card" style="width:100%;">`+
    (event.pictures.length > 0 ? `<img class="card-img-top" src="`+event.pictures[0]+`" alt="Card image" width="200px" height="150x">` : '') +
        `<div class="card-body">
            <h4 class="card-title">`+event.place+`</h4>
            <p class="card-text">`+event.event_start_date+`</p>
            <a href="eventDetail.html" class="btn btn-primary">Buy ticket</a>
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
    xmlhttp.send();
}
loadEvent();
