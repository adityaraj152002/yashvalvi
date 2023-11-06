<!DOCTYPE html>
<html>
<head>
    <title>Railways registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "database-1.cnwnhpuqjzem.ap-south-1.rds.amazonaws.com 3306";
        $username = "admin";
        $password = "12345678";
        $dbname = "train";

        $conn = new mysqli($database-1.cnwnhpuqjzem.ap-south-1.rds.amazonaws.com 3306, $admin, $12345678, $train);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $birthdate = $_POST["birthdate"];
        $gender = $_POST["gender"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (firstname, lastname, email, password, birthdate, gender) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $hashed_password, $birthdate, $gender);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <form id="reg-form" method="POST" action="#">
        <h1>Create a New Account</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="firstname"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="firstname" required>

        <label for="lastname"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lastname" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="confirm-password"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="confirm-password" required>

        <label for="birthdate"><b>Date of Birth</b></label>
        <input type="date" placeholder="Enter Birthdate" name="birthdate" required>

        <label for="gender"><b>Gender</b></label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </form>
</div>

<script src="./validation.js"></script>
</body>
</html>
