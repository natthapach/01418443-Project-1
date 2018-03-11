$.ajax({
      url : "../../service/attendant/joined.php",
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
      $str+= '<tr><td><a href="#">'+res[i]['name']+'</a></td><td>'+res[i]['place']+'</td><td>'+$date + '<br>' + $time +'</td></tr>';
  }
  $(".tbody").append($str);
}
