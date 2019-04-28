<head>
    <script type="text/javascript" src='admin.php'> </script>
    <title>abc</title><meta charset="utf-8"/>
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
            <th class="text-center">Check-in</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $sessionid =file_get_contents('login.session', true);

        $conn = mysqli_connect("localhost", "root", "", "HotelDB");
        $reuslt = mysqli_query($conn, "SELECT * FROM Reservation WHERE accountid='$sessionid'");

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
            <span class="table-checkin"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Check-in</button></span>
          </td>
        </tr>

        <?php endwhile; ?>
    </tbody>
</table>

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

$('.table-checkin').click(function () {

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
