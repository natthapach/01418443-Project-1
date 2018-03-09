$.ajax({
    url : "../../service/attendant/ticket-list.php",
    dataType : "json",
    success : function(res){
        createTable(res);
    }
});
function createTable(res){
  $str = '';
  for (i = 0; i<res.length;i++){
    $dateandtime = res[i]['event_start_date'].split(" ");
    $date = $dateandtime[0];
    $time = $dateandtime[1].split(":");
    $time = $time[0]+':'+$time[1];
    $str+= '<tr><td>'+res[i]['name']+'</td><td>'+res[i]['place']+'</td><td>'+$date + '<br>' +
    $time +'</td><td>'+
    '<img id="myImg" src="../../service/attendant/generate.php?text='+res[i]['attentded_code']+'"  alt="'+res[i]['name']+
    '" width="50" height="50" data-target="#myModal">'+
    '<div id="myModal" class="modal"><span class="close">&times;</span>'+
    '<img class="modal-content" id="img01"><div id="caption"></div></div>'+'</td></tr>';
  }
  $(".tbody").html($str);

  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

        $(document).ready(function () {
            $('img').on('click', function () {
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            });
        });

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

}