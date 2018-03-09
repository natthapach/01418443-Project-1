function initMap() {
    let bangkok = {lat: 13.806137, lng: 100.5230946};
    let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: bangkok
    });
    let marker = new google.maps.Marker({
        position: bangkok,
        map: map
    });
}
