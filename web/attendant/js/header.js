var categories;
function showCategories(events){
    
        for(i=0; i < categories.length; i++){
            $("#categories") .append(`<a class="dropdown-item" href="home.html?category=`+categories[i].id+`">`+categories[i].name+`</a>`)
        }
    
    
}  

function loadEvent(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            categories = JSON.parse(this.responseText);
            console.log(categories)
            showCategories(categories);
        }
    };
    xmlhttp.open("GET", "../../service/attendant/header.php", true);
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
