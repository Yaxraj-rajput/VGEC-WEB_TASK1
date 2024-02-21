<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["token"])) {
        $token = $_POST["token"];
        
        $sql = "SELECT email, expiry_time FROM password_reset_tokens WHERE token = '$token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row["email"];
            $expiry_time = strtotime($row["expiry_time"]);

            if (time() < $expiry_time) {
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm_password"];

                if ($password !== $confirm_password) {
                    echo "Passwords do not match.";
                    exit;
                }

                // Hash the new password
                $hashed_password = md5($password);

                $update_sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                echo "Token has expired.";
            }
        } else {
            echo "Invalid token.";
        }
    } else {
        echo "Token not provided.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>

<?php if (!isset($_POST["token"])): ?>
    <form method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Reset Password</button>
    </form>
<?php endif; ?>

</body>
</html>
