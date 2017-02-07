<html>
<head>
<title>Room Book </title>

  <script  src="js/jquery-3.1.1.min.js" ></script>
  
  <script> 
$(document).ready(function(){
var rooms = [];
var amount = 500;
$(".room").click(function(){
var total_class = $('.green').length;
var book_room = $(this).attr("data-book"); 
var current_book = $(this).attr("data-current"); 
if(current_book == 1 ){ 
var room_no = $(this).attr("data-number");
$(this).removeClass('green'); 
$(this).removeAttr('data-current'); 
rooms.splice( rooms.indexOf(room_no), 1 );
$(".book_rooms").val(rooms); 
$(".amount").val( rooms.length * amount );
return true;
} 
else if(book_room == 1){ 
alert("Already booked");
return false;
} 
else if(total_class < 5){ 
var room_no = $(this).attr("data-number");
rooms.push(room_no);
$(".book_rooms").val(rooms);
$(".amount").val( rooms.length * amount );
$(".total_rooms").val( rooms.length);

$(this).attr('data-current', '1');
$(this).addClass('green'); 
return true;
}
else if(total_class >= 15){ 
alert("Maximum 5 rooms only")
return false;
} 
});
});
</script>
<style>
.hotel{width:900px;float:left;min-height:150px;border:1px solid #CCC;padding:0 0 10px 10px }
.room{background:#CCC;float:left;margin:10px 10px 0 0;cursor:pointer;padding:4;}
.cancel_book{background:#CCC;}
.green{background:#00B70C;}
.red{background:red;}
</style> 
</head>

<body>

<div class="hotel">
<?php
$total_floor=10;
$total_rooms_per_floor=10;
$booked_room=array(1005,206,307,401,803);
$skip_rooms=array(802,406,608,502,305);
//if you want to end room at n then floor_end will be n+1
$foor_end=array(111,212,311,410,510,610,710,810,911,1010);
$room=1;
for ($i=1; $i <=$total_floor; $i++) { 
 echo "<div class='room'>$i</div>";
 switch ($i) {
   case 1:
     $room=101;
     break;
    case 2:
     $room=201;
     break;
    case 3:
     $room=301;
     break;
     case 4:
     $room=401;
     break;
     case 5:
     $room=501;
     break;
	 case 6:
     $room=601;
     break;
	 case 7:
     $room=701;
     break;
	 case 8:
     $room=801;
     break;
	 case 9:
     $room=901;
     break;
	 case 10:
     $room=1001;
     break;
 }

   for ($j=1; $j <=$total_rooms_per_floor ; $j++) { 
   
if(in_array($room,$foor_end)){ break;}

if(in_array($room,$skip_rooms)){ $room++;continue;}
 
if(in_array($room,$booked_room)){ $booked="red"; $book_room="data-book='1'"; }

else { $booked=""; $book_room="";}
echo "<div class='room $booked' data-number='$room' $book_room ><img src='img/room.png' width='20' height='20'>".($room)."</div>";
$room++;

  }
  echo "<br><br><br>";
}
?>
</div>

<form method="post">
room No :<input type="text" name="rooms" class="book_rooms"><br>
Total Rooms :<input type="text" name="total_rooms" class="total_rooms"><br>
Total Amount :<input type="text" name="amount" class="amount"><br>
<input type="submit" value="submit" class="submit">
</form>
</body>
</html>