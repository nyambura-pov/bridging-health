<?php

echo "Hello, this is recover_password.php";
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is provided
    if (isset($_POST["email"])) {
        $email = $_POST["email"];

        // Connect to the database
        $host = "localhost";
        $user = "root"; 
        $pass = ""; 
        $db = "login";

        $conn = new mysqli($host, $user, $pass, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to fetch the sender's email from the database
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error executing SQL query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Fetch the sender's email address
            $row = $result->fetch_assoc();
            $senderEmail = $row["email"];

            // Generate a recovery OTP
            $recoveryOTP = generateRecoveryOTP();

            // Here you would store the recovery OTP in your database with the user's email for verification
            // Example:
            // storeRecoveryOTPInDatabase($email, $recoveryOTP);

            // Now you would send an email to the user with the recovery OTP
            $subject = "Password Recovery OTP";
            $message = "Your password recovery OTP is: $recoveryOTP";
            $headers = "From: $senderEmail"; // Use the sender's email fetched from the database

            // Send email
            if (mail($email, $subject, $message, $headers)) {
                echo "A recovery OTP has been sent to your email.";
            } else {
                echo "Failed to send recovery OTP. Please try again later.";
            }
        } else {
            echo "Email not found in the database.";
        }

        // Close connection
        $conn->close();

    } else {
        // If email is not provided, show an error
        echo "Email is required for password recovery.";
    }
}

// Function to generate a random recovery OTP
function generateRecoveryOTP($length = 6) {
    $characters = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $otp;
}
?>
