<?php
// 1. Database Connection Credentials [1]
$servername = "localhost";
$username = "root"; // Default XAMPP username [1]
$password = "";     // Default XAMPP password is empty [1]
$dbname = "web_project_db";

// 2. Create Connection [1]
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check Connection [1]
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Handle Form Submission [1]
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and Collect Data [1]
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']); [2]
    $message = htmlspecialchars($_POST['message']); [2]

    // Prepare SQL Statement (Security: Prevents SQL Injection) [2]
    $stmt = $conn->prepare("INSERT INTO contact_messages (user_email, subject_line, message_text) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $subject, $message); [2]

    // Execute and Redirect [2], [3]
    if ($stmt->execute()) {
        header("Location: success.html");
        exit();
    } else {
        echo "Error: " . $stmt->error; [2]
    }
    $stmt->close(); [4]
}
$conn->close(); [4]
?>