<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Complaints with Solved Status</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Complaint Details</th>
                    <th scope="col">Department</th>
                    <th scope="col">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establishing connection to the database
                $server = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cwh_project";

                $con = mysqli_connect($server, $username, $password, $dbname);

                // Check connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // SQL query to fetch complaint details, department, and username
                $sql = "SELECT * from update_complaint where status='ongoing'";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["days"] . "</td>";
                        echo "<td>" . $row["cno"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>0 results</td></tr>";
                }
                $con->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
