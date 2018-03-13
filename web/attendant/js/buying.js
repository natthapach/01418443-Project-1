$.ajax({
    url : "../../service/attendant/buying.php",
    dataType : "json",
    success : function(res){
        createTable(res);
    }
});

function createTable(res){
$str = '';
$eventid = '';
console.log($eventid);
for (i = 0; i<res.length;i++){
  $dateandtime = res[i]['event_start_date'].split(" ");
  $date = $dateandtime[0];
  $time = $dateandtime[1].split(":");
  $time = $time[0]+':'+$time[1];
  if (res[i]['status_id']=='W'){
    $status='ยังไม่ชำระเงิน<br><button type="button" class="btn btn-primary"onclick="MoneyTransfer('+
    res[i]["id"]+')">แจ้งโอนเงิน</button> <button type="button" class="btn btn-danger" class="control" id="cancelEvent"'+
    ' onclick="CancelEvent('+res[i]["id"]+')">Cancel</button> ';
  }else if (res[i]['status_id']=='P'){
    $status='รอดำเนินการ';
  }else if (res[i]['status_id']=='C'){
    $status='ชำระเงินเรียบร้อย';
  }else{
    $status='ยกเลิกแล้ว';
  }
    $str+= '<tr><td><a href="eventDetail.php?event='+res[i]['id']+'">'+res[i]['name']+'</a></td><td>'+res[i]['place']+'</td><td>'
    +$date + '<br>' + $time +
    '</td><td>'+res[i]['price']+
    '</td><td>'+$status+'</td></tr>';
}
$(".tbody").html($str);

$('#cancelEvent').on("click", function() {
 $("#myModal").modal();
});

$('#confirm').on('click', function (e) {
  var javascriptVariable = $eventid;
window.location.href = "../../service/attendant/cancelEvent.php?eventid=" + javascriptVariable;
})
}

function MoneyTransfer(eventid) {
  var javascriptVariable = eventid;
  window.location.href = "MoneyTransfer.php?eventid=" + javascriptVariable;
}

function CancelEvent(eventid){
  $eventid = eventid;
//   var javascriptVariable = eventid;
// window.location.href = "../../service/attendant/cancelEvent.php?eventid=" + javascriptVariable;
}
