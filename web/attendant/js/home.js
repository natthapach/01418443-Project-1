var events;
var $_GET = location.search.substr(1).split("&").reduce((o,i)=>(u=decodeURIComponent,[k,v]=i.split("="),o[u(k)]=v&&u(v),o),{});
console.log($_GET)
function showEvent(event, order) {
    let category = $_GET['category']
    if (category=='' || category==event.category_id || category == undefined)
        $("#event-table").append(`
        <div class="col-xs-12 col-sm-6" >
        
        <div class="card event-card" style="width:100%; height: 80%"> <h3>`+event.name+`</h3>`+
        (event.pictures.length > 0 ? `<img class="card-img-top" src='../../service/pictures/`+event.pictures[0].path+`'alt="Card image" width="100%" height="200px">` : '') +
            `<div class="card-body">
                <h5 class="card-title">`+event.place+`</h5>
                <p class="card-text">`+event.event_start_date+`</p>
                <form action="eventDetail.php?event=`+event.id+`" method="post">
                <label class="btn buy-btn buy-btn:hover" for="submit-btn`+event.id+`">Buy ticket</label><input hidden type="submit" name="submit-btn`+event.id+`" id="submit-btn`+event.id+`" class="btn buy-btn buy-btn:hover">
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
            for (i in events) {
                if (i != 'categories')
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
