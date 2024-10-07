<?php include("nav.php");?>

<?php
// Connect to your database
include("databasec.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['update'])) {
    // Capture form data
    $hed = mysqli_real_escape_string($DB_con, $_POST['hed']);
    $main = mysqli_real_escape_string($DB_con, $_POST['main']);
    $side = mysqli_real_escape_string($DB_con, $_POST['side']);
    $fut = mysqli_real_escape_string($DB_con, $_POST['fut']);

    // Insert data into the 'digi' table
    $query = "INSERT INTO `back`(`hed`, `main`, `side`, `fut`) VALUES ('$hed', '$main', '$side', '$fut')";

    if (mysqli_query($DB_con, $query)) {
        echo "<script>alert('Data inserted successfully!');</script>";
    } else {
        echo "<script>alert('Error inserting data!');</script>";
    }
}

// Check if an update request was sent
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $sr_no = mysqli_real_escape_string($DB_con, $_POST['sr_no']);
    $hed = mysqli_real_escape_string($DB_con, $_POST['hed']);
    $main = mysqli_real_escape_string($DB_con, $_POST['main']);
    $side = mysqli_real_escape_string($DB_con, $_POST['side']);
    $fut = mysqli_real_escape_string($DB_con, $_POST['fut']);

    // Update query
    $updateQuery = "UPDATE `back` 
                    SET `hed` = '$hed', 
                        `main` = '$main', 
                        `side` = '$side', 
                        `fut` = '$fut' 
                    WHERE `sr_no` = '$sr_no'";

    if (mysqli_query($DB_con, $updateQuery)) {
        echo "Record updated successfully!";
        echo "<script>window.location='datasci.php';</script>"; // Redirect after update
    } else {
        echo "Error updating record: " . mysqli_error($DB_con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert and Update Data in Digital Marketing</title>
    <!-- Styles and scripts here -->
</head>
<body>
    <!-- Rest of your HTML content -->
    <table class="table table-bordered table-striped mt-3 bg-dark text-light" style="margin-left:300px;">
        <thead class="thead-dark">
            <tr>
                <th>Header</th>
                <th>Main Content</th>
                <th>Side Content</th>
                <th>Future Scope</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the database connection file
            include("databasec.php");

            // Write the query to fetch data
            $fetchQuery = "SELECT `hed`, `main`, `side`, `fut` FROM `back`";

            // Execute the query
            $result = mysqli_query($DB_con, $fetchQuery);

            // Check if there are rows returned
            if (mysqli_num_rows($result) > 0) {
                // Output data for each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['hed'] . "</td>";
                    echo "<td>" . $row['main'] . "</td>";
                    echo "<td>" . $row['side'] . "</td>";
                    echo "<td>" . $row['fut'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table> <br> <br><br>
</div><br><br>
    <!-- Update Form Section -->
    <div class="container text-light bg-dark mt-5" style="margin-left:300px;">
        <div class="row">
            <div class="col-xl-12">
                <h2>Update Data</h2>

                <?php
                // Check if sr no is provided via GET request and fetch the current data for editing
                if (isset($_GET['sr_no'])) {
                    $sr_no = mysqli_real_escape_string($DB_con, $_GET['sr_no']);

                    // Fetch the data for the specific `sr_no`
                    $fetchQuery = "SELECT `sr_no`, `hed`, `main`, `side`, `fut` FROM `back` WHERE `sr_no` = '$sr_no'";
                    $result = mysqli_query($DB_con, $fetchQuery);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result); // Get the current data for this record
                    } else {
                        echo "No record found with the given serial number!";
                        exit;
                    }
                }
                ?>

                <form method="POST" action="">
                    <input type="hidden" name="sr_no" value="<?php echo $row['sr_no']; ?>">

                    <div class="form-group">
                        <label for="hed">Header:</label>
                        <input type="text" name="hed" class="form-control" value="<?php echo $row['hed']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="main">Main Content:</label>
                        <textarea name="main" class="form-control" required><?php echo $row['main']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="side">Side Content:</label>
                        <textarea name="side" class="form-control" required><?php echo $row['side']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="fut">Future Scope:</label>
                        <textarea name="fut" class="form-control" required><?php echo $row['fut']; ?></textarea>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
 <br><br><br>
    <!-- Insert Form Section -->
    <div class="container bg-dark text-light" style="margin-left:300px;">
        <h2>Insert Data into DataScience Table</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="hed">Header (hed):</label>
                <input type="text" name="hed" id="hed" class="form-control" placeholder="Enter header" required>
            </div>
            <div class="form-group" style="margin-left:-300px;">
                <label for="main">Main Content (main):</label>
                <textarea name="main" id="main" class="form-control" rows="5" placeholder="Enter main content" required></textarea>
            </div>
            <div class="form-group">
                <label for="side">Side Content (side):</label>
                <textarea name="side" id="side" class="form-control" rows="5" placeholder="Enter side content" required></textarea>
            </div>
            <div class="form-group">
                <label for="fut">Future Scope (fut):</label>
                <textarea name="fut" id="fut" class="form-control" rows="5" placeholder="Enter future scope" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Insert Data</button>
        </form>
    </div>
</body>
</html>
