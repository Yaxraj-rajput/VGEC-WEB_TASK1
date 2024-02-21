<?php 


include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM todos WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: home.php");
} else {
    echo "<script>alert('Failed to Delete To Do')</script>";
}


?>