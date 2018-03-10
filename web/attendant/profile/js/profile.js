var attendant;
var now = new Date();

function showProfile(attendant) {
    var birth = attendant.birth_date.split("-");
    var old =parseInt(now.getFullYear()-birth[0]);
    console.log(birth[0]);
    console.log(old);
    $("#profile-table").append(`<table class="table"> <thead>
    <tr class="table-success"> <td> `+ (attendant.picture ? `<img src="../../../service/profile/`+attendant.picture +`" class="float-left" width="250px" height="250px">` : '') +`  </td>
    <td style="width:100%">
    <button type="button" class="btn btn btn-dark" style="float : right"><a href="editProfile.html">Edit</a></button>
    <p><span class="bold-font">First name :&nbsp&nbsp</span>`+ attendant.first_name+ `</p>
    <p><span class="bold-font">Last name :&nbsp&nbsp</span>`+ attendant.last_name+ `</p>
    <p><span class="bold-font">Email :&nbsp&nbsp</span>` + attendant.email + `</p>
    <p><span class="bold-font">Gender :&nbsp&nbsp</span>`+ attendant.gender+`</p>
    <p><span class="bold-font">Age :&nbsp&nbsp</span>`+ old +` years old</p>
</td>
</tr>
</tbody>
</table>`);


}
function loadProfile(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            attendant = JSON.parse(this.responseText);
            console.log(attendant);
            showProfile(attendant);

            // for (i in attendants) {
            //     if(attendants.id == user.id){
            //         showProfile(attendants[i], i)
            //     }
                
            // }
        }
    };
    xmlhttp.open("GET", "../../../service/attendant/loadProfile.php", true);
    xmlhttp.send();
}

loadProfile();
