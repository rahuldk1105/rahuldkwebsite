<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define the path to the text file where you want to store the data
    $file = 'user_data.txt';

    // Get form data
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['new-password'];
    $accountType = isset($_POST['account-type']) ? $_POST['account-type'] : '';
    $profilePicture = isset($_FILES['file']) ? $_FILES['file']['name'] : '';
    $age = $_POST['age'];
    $referrer = $_POST['referrer'];
    $bio = $_POST['bio'];

    // Create a formatted string with the data
    $data = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nPassword: $password\nAccount Type: $accountType\nProfile Picture: $profilePicture\nAge: $age\nReferrer: $referrer\nBio: $bio\n\n";

    // Append the data to the text file
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    echo "Data has been saved successfully.";
} else {
    echo "Invalid request.";
}
?>
