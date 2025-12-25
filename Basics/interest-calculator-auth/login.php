<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($stored_password);
        $stmt->fetch();

        if (password_verify($password, $stored_password)) {
            $_SESSION['username'] = $username;
            header("Location: cal.php");
            exit();
        }
    }

    header("Location: login.php?error=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Invalid username or password</p>";
}
?>

<a href="index.php">Create Account</a>

</body>
</html>
