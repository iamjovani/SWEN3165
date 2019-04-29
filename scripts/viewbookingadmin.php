<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
    <script type="text/javascript" src='admin.php'> </script>
    <title>Check in</title><meta charset="utf-8"/>
</head>
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Reservations</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
    <thead>
        <tr>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
            <th class="text-center">Type of Booking</th>
            <th class="text-center">Number of Adults</th>
            <th class="text-center">Number of Children</th>
            <th class="text-center">Remove</th>
            <th class="text-center">Check-in</th>
            <th class="text-center">Update</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "HotelDB");
        $reuslt = mysqli_query($conn, "SELECT * FROM Reservation");

        while ($row  = mysqli_fetch_assoc($reuslt)) :
        ?>

        <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['startdate']; ?></td>
            <td><?php echo $row['enddate']; ?></td>
            <td><?php echo $row['bookingtype']; ?></td>
            <td><?php echo $row['numadults']; ?></td>
            <td><?php echo $row['numchildren']; ?></td>


          <td>
           <span class="table-Remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          </td>

          <td>
            <span class="table-Checkin"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Check-in</button></span>
          </td>
          <td>
            <span class="table-Update"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Update</button></span>
          </td>

        </tr>
        <tr class="hide" id="update">
            <td><input name="firstname" type="text" class="form-control" placeholder=""></td>
            <td><input name="lastname" type="text" class="form-control" placeholder=""></td>
            <td><input name="email" type="text" class="form-control" placeholder=""></td>
            <td><input name="startdate" type="text" class="form-control" placeholder=""></td>
            <td><input name="enddate" type="text" class="form-control" placeholder=""></td>
            <td><input name="bookingtype" type="text" class="form-control" placeholder=""></td>
            <td><input name="numadults" type="text" class="form-control" placeholder=""></td>
            <td><input name="numchildren" type="text" class="form-control" placeholder=""></td>
            <td><span id="done"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">done</button></span></td>
         </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<div class="hide" id="checkin">
     <h4> Room which are available</h4>
     <table class="table table-bordered table-responsive-md table-striped text-center">
   <thead>
       <tr>
         <th class="text-center">Room Number</th>
         <th class="text-center">Room type</th>
         <th class="text-center">status</th>
         <th class="text-center"> </th>

       </tr>
   </thead>

   <tbody>
     <?php
     $conn = mysqli_connect("localhost", "root", "", "HotelDB");
     $reuslt = mysqli_query($conn, "SELECT * FROM Room");

     while ($row  = mysqli_fetch_assoc($reuslt)) :
     ?>

     <tr>
         <td><?php echo $row['roomnum']; ?></td>
         <td><?php echo $row['roomtype']; ?></td>
         <td>Available</td>
         <td><span><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">select</button></span></td>
       </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<span id="ok"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">ok</button></span>
</div>

<footer>
    <a href="../home.html">Logout</a>
</form>
</footer>


<link rel="stylesheet" href="../assets/css/bootstrap.css" />
<script src="../assets/js/jquery-2.2.4.min.js"></script>
<script src="../assets/js/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables.bootstrap.js"></script>
<script src="../assets/js/dataTables.bootstrap.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.bootstrap.js"></script>

<style>
    .pt-3-half {
padding-top: 1.4rem;
}
</style>

<script>
    $(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "paging": false // false to disable pagination
  });
  $('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple" // for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});


var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
$TABLE.find('table').append($clone);
});

$('.table-Remove').click(function () {
$(this).parents('tr').detach();
});

$('.table-Checkin').click(function () {
  var hide =document.getElementById("checkin");
  hide.classList.remove("hide");
});

$('#ok').click(function () {
  var hide =document.getElementBy("checkin");
  hide.classList.add("hide");
});

$('.table-Update').click(function () {
    //$(this).parents('tr').remove("hide");
    var hide =document.getElementBy("update");
    hide.classList.remove("hide");
});

$('#done').click(function () {
  var hide =document.getElementById("update");
  hide.classList.add("hide");
});

$('.table-up').click(function () {
var $row = $(this).parents('tr');
if ($row.index() === 1) return;
$row.prev().before($row.get(0));
});

$('.table-down').click(function () {
var $row = $(this).parents('tr');
$row.next().after($row.get(0));
});


jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
var $rows = $TABLE.find('tr:not(:hidden)');
var headers = [];
var data = [];


$($rows.shift()).find('th:not(:empty)').each(function () {
headers.push($(this).text().toLowerCase());
});


$rows.each(function () {
var $td = $(this).find('td');
var h = {};


headers.forEach(function (header, i) {
h[header] = $td.eq(i).text();
});

data.push(h);
});

// Output the result
$EXPORT.text(JSON.stringify(data));
});
</script>
