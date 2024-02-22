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
                $delete_token = "DELETE FROM password_reset_tokens WHERE token = '$token'";
                if ($conn->query($update_sql) === TRUE && $conn->query($delete_token) === TRUE){
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
    <link rel="stylesheet" href="./Styles/Style.css" />

</head>
<body>

<?php if (!isset($_POST["token"])): ?>
    <div class="login-container">
    <form class="form" method="post">
    <div class="topbar"><img src="./Images/logo.png" alt="logo"><h1 class="login-text" style="font-size: 2rem; font-weight: 800;">Reset Password For VGEC Portal</h1></div>
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Reset Password</button>
    </form>
</div>
<?php endif; ?>

</body>
</html>
