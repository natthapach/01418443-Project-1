var events;
var isEventNotFound = false; 
var $_GET = location.search.substr(1).split("&").reduce((o,i)=>(u=decodeURIComponent,[k,v]=i.split("="),o[u(k)]=v&&u(v),o),{});
console.log($_GET)
function showEvent(event, order) {
    let category = $_GET['category']
    let key = $_GET['key']
    let loc = $_GET['loc']
    let org = $_GET['org']
    var from = ($_GET['from'] == '' || $_GET['from'] == undefined ? '' : sqldate2jsdate($_GET['from']))
    var to = ($_GET['to'] == '' || $_GET['to'] == undefined ? '' : sqldate2jsdate($_GET['to']))
    let date = sqldate2jsdate(event.event_start_date)
    // console.log(event.place.includes(loc));
    console.log(event.name.toLowerCase());
    if ((category=='' || category==event.category_id || category == undefined) &&
    (key == undefined || key=='' || event.name.toLowerCase().includes(key.toLowerCase())) &&
    (org == undefined || org=='' || event.organizer.toLowerCase().includes(org.toLowerCase())) &&
    (loc == undefined || loc=='' || event.place.toLowerCase().includes(loc.toLowerCase())) &&
    (compare_date3(from, to, date))
    ) {
        isEventNotFound = true;
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
   
}
function sqldate2jsdate(sqlDate) {
    var sqlDateArr1 = sqlDate.split("-");
    var sYear = sqlDateArr1[0];
    var sMonth = (Number(sqlDateArr1[1]) - 1).toString();
    var sqlDateArr2 = sqlDateArr1[2].split(" ");
    var sDay = sqlDateArr2[0];
    return new Date(sYear,sMonth,sDay);    
}
function compare_date2(date1, date2) {
    if (date1 == '') return 0;
    if (date2 == '') return 0;
    if (date1 > date2) return 1;
    if (date1 < date2) return -1;
    return 0;
}

function compare_date3(from, to, date) {
    if (compare_date2(from, date) != 1 && compare_date2(to, date) != -1) {
        return true;
    }
    return false;
}


function loadEvent(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            events = JSON.parse(this.responseText);
            isEventNotFound = false; 
            for (i in events) {
                showEvent(events[i], i)
            }
            if (!isEventNotFound) {
                $("#event-table").append("<h3 style='margin-bottom: 50px'>--Event not found.--</h3>   ");
            }
        }
    };
    xmlhttp.open("GET", "../../service/attendant/loadEvent.php", true);
    xmlhttp.overrideMimeType('application/javascript; charset=utf-8')
    xmlhttp.send();
}
loadEvent();