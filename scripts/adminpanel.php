<table class="table">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type of Booking</th>
            <th>Number of Children</th>
            <th>Number of Adults</th>
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
        </tr>

        <?php endwhile; ?>
    </tbody>
</table>

<link rel="stylesheet" href="../assets/css/bootstrap.css" />
