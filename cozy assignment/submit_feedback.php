<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'campaign_feedback';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];
    $rating = $_POST["rating"];

    
    $sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $name, $email, $feedback, $rating);

        if ($stmt->execute()) {
             
            $to = "your_email@example.com";
            $subject = "New Feedback";
            $message = "Name: $name\nEmail: $email\nFeedback: $feedback\nRating: $rating";
            $headers = "From: $email";
            mail($to, $subject, $message, $headers);

            header("Location: thank_you.html");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
