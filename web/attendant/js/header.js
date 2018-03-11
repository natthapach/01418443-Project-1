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
console.log($('.search-content').children())
$('.search-bar').on('click', function () {
    $('.search-bar').addClass('open');
    $('.search-content').addClass('show');
});
$('body').on('click', function (e) {
    let search_bar = document.getElementById('search-bar')
    let search_content = document.getElementById('search-content')
    if (e.target != $('input') && !jQuery.contains(search_content, e.target) && e.target != search_content) {
        $('.search-bar').removeClass('open');
        $('.search-content').removeClass('show');
    }
});
console.log($('#search-submit'))
$('#search-submit').on('click', function() {
    let keyword = $('#search-keyword').val();
    let location = $('#search-location').val();
    let organizer = $('#search-organizer').val();
    let from = $('#search-from').val();
    let to = $('#search-to').val();
    console.log(location, organizer, from, to)
    window.location.href = "home.html?key="+keyword+"&loc="+location+"&org="+organizer+"&from="+from+"&to="+to;
})

loadEvent();
