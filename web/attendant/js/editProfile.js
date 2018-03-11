var attendant;
var now = new Date();

function showProfile(attendant) {
    var birth = attendant.birth_date.split("-");
    var old =parseInt(now.getFullYear()-birth[0]);
    console.log(birth[0]);
    console.log(old);
    $("#profile-table").append(`<form action="../../service/attendant/editProfile.php" method="POST" enctype="multipart/form-data"><table class="table"> <tbody>

    <tr class="table-success"> <td> 
    
    <label for="picture" class="pointer"><img id="shownImage" src="../../service/profile/`+attendant.picture +`" class="float-left " width="250px" height="250px"><input name="picture" id="picture"  type="file" hidden value="../../service/profile/`+attendant.picture +`" onchange="changeImage()"></label>  </td>
    <td style="width:100%">
    <p><label for="first-name"><span class="bold-font">First name :&nbsp&nbsp   </span><input name="first-name" id="first-name" type="text" required value="`+ attendant.first_name+ `"></p>
    <p><label for="last-name"><span class="bold-font">Last name :&nbsp&nbsp&nbsp&nbsp</span><input name="last-name" id="last-name" type="text" required value="`+ attendant.last_name+ `"></p>
    <p><label for="email"><span class="bold-font">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp</span><input name="email" id="email" type="text" required value="` + attendant.email + `"></p>
    <p><label for="tel"><span class="bold-font">Tel &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp</span><input name="tel" id="tel" type="text" required value="` + attendant.phone + `"></p>
    <label for="submit-btn" class="btn btn-save">Save<input hidden type="submit" name="submit-btn" id="submit-btn"></label><a href="profile.html" class="btn btn-cancel">Cancel</a>
    </td>
    </tr>
    </tbody>
    </table></form>`);


}

function changeImage() {
    let input = document.getElementById("picture");
    if (input.files && input.files[0]) {
        let reader = new FileReader()
        reader.onload = (e) => {
            $("#shownImage").attr("src", e.target.result);
        }
        reader.readAsDataURL(input.files[0])
    }
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
    xmlhttp.open("GET", "../../service/attendant/loadProfile.php", true);
    xmlhttp.send();
}

loadProfile();
