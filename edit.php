<?php 

include 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM todos WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$description = $row['description'];



if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "UPDATE todos SET title='$title', description='$description' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: home.php");
    } else {
        echo "<script>alert('Failed to Update To Do')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Styles/Style.css" />
</head>
<body>
<div class="main-container">
    <form action="" method="POST" class="form">
        <h1 style="font-size: 2rem; font-weight: 800">Update To Do</h1>
        <input type="text" placeholder="Title" name="title" value="<?php echo $title; ?>" required />
        <input type="text" placeholder="Description" name="description" value="<?php echo $description; ?>" required />
        <button name="submit" value="submit" class="btn">Update</button>
    </form>
    </div>
</body>
</html>