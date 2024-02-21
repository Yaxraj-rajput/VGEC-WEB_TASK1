<?php

include 'config.php';


if (isset($_POST['submit'])) {


if (isset($_POST['title']) && isset($_POST['description'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
}

$sql = "INSERT INTO todos (title, description) VALUES ('$title', '$description')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>alert('To Do Added Successfully')</script>";
} else {
    echo "<script>alert('Failed to Add To Do')</script>";
}

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD TO DO | VGEC</title>
    <link rel="stylesheet" href="./Styles/style.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="form">
        <form action="" method="POST" class="login-email">
          <h1 style="font-size: 2rem; font-weight: 800">Add To Do</h1>
          <input type="text" placeholder="Title" name="title" required />
          <input
            type="text"
            placeholder="Description"
            name="description"
            required
          />
          <button name="submit" value="submit" class="btn">Add</button>
        </form>
      </div>
      <div class="display-todo">
        <table>
         
          <?php
            $sql = "SELECT * FROM todos";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Time Added</th><th>Action</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['time_added'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>

          </tr>
          <?php ; } }else{ echo"<span>No todo for now</span>";}?>
        </table>
      </div>
    </div>
  </body>
</html>
