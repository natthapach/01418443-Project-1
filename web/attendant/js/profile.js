var attendants;
function showProfile(profile, order) {
    $("#profile-table").append((`<table class="table">) <thead>
    <tr class="table-success"> <td> `+ (profile.pictures.length > 0 ? `<img src="`+profile.pictures[0]+`" class="float-left" width="304px" height="236px">` : '')` +  </td>
    <td style="width:100%">
    <p><span class="bold">First name :&nbsp&nbsp</span>`+ profile.first_name+ `</p>
    <p><span class="bold">Last name :&nbsp&nbsp</span>`+ profile.last_name+ `</p>
    <p><span class="bold">Email :&nbsp&nbsp</span>` + profile.email + `</p>
    <p><span class="bold">Gender :&nbsp&nbsp</span>`+ profile.gender+`</p>
    <p><span class="bold">Age :&nbsp&nbsp</span>`+ 20 +`years old</p>
</td>
</tr>
</tbody>
</table>`));

}
function loadProfile(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            attendants = JSON.parse(this.responseText);
            console.log(attendants);

            for (i in attendants) {
                if(attendants.id == user.id){
                    showProfile(attendants[i], i)
                }
                
            }
        }
    };
    xmlhttp.open("GET", "../../service/attendant/loadEvent.php", true);
    xmlhttp.send();
}
loadProfile();
