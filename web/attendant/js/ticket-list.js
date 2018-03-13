$.ajax({
    url : "../../service/attendant/ticket-list.php",
    dataType : "json",
    success : function(res){
        createTable(res);
    }
});
function createTable(res){
  $strcoming = '';
  $strjoined = '';

  $str = '';
  for (i = 0; i<res.length;i++){
    $dateandtime = res[i]['event_start_date'].split(" ");
    $date = $dateandtime[0];
    $time = $dateandtime[1].split(":");
    $time = $time[0]+':'+$time[1];
    if(res[i]['is_checkin']=='0'){
      $strcoming+= '<tr><td><a href="eventDetail.php?event='+res[i]['id']+'">'+res[i]['name']+'</a></td><td>'+res[i]['place']+'</td><td>'+$date + '<br>' +
      $time +'</td><td>'+
      '<img id="myImg" src="../../service/attendant/generate.php?text='+res[i]['attentded_code']+'"  alt="'+res[i]['name']+'--'+res[i]['attentded_code']+
      '" width="50" height="50" data-target="#myModal">'+
      '<div id="myModal" class="modal"><span class="close">&times;</span>'+
      '<div id="nameimg"></div><img class="modal-content" id="img01"><div id="caption"></div></div>'+'</td></tr>';
    }
    if (res[i]['is_checkin']=='1'){
      $strjoined+= '<tr><td><a href="eventDetail.php?event='+res[i]['id']+'">'+res[i]['name']+'</a></td><td>'+res[i]['place']+'</td><td>'+$date + '<br>' +
      $time +'</td><td>'+
      '<img id="myImg" src="../../service/attendant/generate.php?text='+res[i]['attentded_code']+'"  alt="'+res[i]['name']+'--'+res[i]['attentded_code']+
      '" width="50" height="50" data-target="#myModal">'+
      '<div id="myModal" class="modal"><span class="close">&times;</span>'+
      '<div id="nameimg"></div><img class="modal-content" id="img01"><div id="caption"></div></div>'+'</td></tr>';
    }
  }
  $(".tbody-coming").html($strcoming);
  $(".tbody-joined").html($strjoined);

  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg');
  var modalImg = document.getElementById("img01");
  var nameText = document.getElementById('nameimg');
  var captionText = document.getElementById("caption");

        $(document).ready(function () {
            $('img').on('click', function () {
              var str = this.alt.split('--');
              modal.style.display = "block";
              modalImg.src = this.src;
              nameText.innerHTML = str[0];
              captionText.innerHTML = str[1];
            });
        });

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

}
