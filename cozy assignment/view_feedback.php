<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, feedback, rating, submission_date FROM feedback";
$result = $conn->query($sql);

echo '<!DOCTYPE html>
<html>
<head>
    <title>Feedback Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>';

if ($result->num_rows > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Rating</th>
                <th>Submission Date</th>
            </tr>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["feedback"] . "</td>
                <td>" . $row["rating"] . "</td>
                <td>" . $row["submission_date"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No feedback available.";
}


echo '</body></html>';


$conn->close();
?>
