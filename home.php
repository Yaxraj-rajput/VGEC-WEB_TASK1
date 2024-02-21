<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    if (isset($_POST['title']) && isset($_POST['description'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO todos (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $description);

        if ($stmt->execute()) {
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(['status' => 'success', 'message' => 'To Do Added Successfully']);
                exit;
            } else {
                echo "<script>alert('To Do Added Successfully')</script>";
            }
        } else {
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                echo json_encode(['status' => 'error', 'message' => 'Failed to Add To Do']);
                exit;
            } else {
                echo "<script>alert('Failed to Add To Do')</script>";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD TO DO | VGEC</title>
    <link rel="stylesheet" href="./Styles/Style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".form").on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: '', // current page
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                var data = JSON.parse(response);
                alert(data.message);
                if(data.status === 'success') {
                    location.reload(); // reload the page to get the updated list
                }
}
                }
            });
        });
    });
    </script>
  </head>
  <body>
    <div class="main-container">
        <form action="" method="POST" class="form">
          <h1 style="font-size: 2rem; font-weight: 800">Hello <?php echo $_SESSION["username"]?> Add A To Do</h1>
          <input type="text" placeholder="Title" name="title" required />
          <input
            type="text"
            placeholder="Description"
            name="description"
            required
          />
          <button name="submit" value="submit" class="btn">Add</button>
        </form>
      <div class="display-todo">
        <table>
         
          <?php
            $sql = "SELECT * FROM todos";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Time Added</th><th>Action</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['time_added'] ?></td>
            <td><a class="edit" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a><a class="delete" style="background: red;" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>

          </tr>
          <?php ; } }else{ echo"<span>No todo for now</span>";}?>
        </table>
      </div>
    </div>
  </body>
</html>