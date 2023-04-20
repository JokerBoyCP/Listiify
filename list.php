<?php

require "header.php";
require "includes/db_connector.inc.php";

if (!$_SESSION == NULL) {
?>

<body>
  <form method="post">
    <label for="task">New Task:</label>
    <input type="text" name="task" id="task">
    <button type="submit" name="add">Add Task</button>
  </form>
  <table>
    <thead>
      <tr>
        <th>Task</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php //while ($row = mysqli_fetch_assoc(<$result)) { ?>
        <!-- <tr>
          <td><?php //echo $row['task']; ?></td>
          <td>
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="delete">Delete</button>
            </form>
          </td>
        </tr> -->
      <?php //} ?>
    </tbody>
  </table>
</body>
<?php
 // Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['add'])) {
    // Add a new task for the user
    $task = $_POST['task'];
    $user_id = $_SESSION['idUsers'];
    // echo $user_id, $task;
    // $sql = "INSERT INTO tasks (user_id, task) VALUES ($user_id, $task)";
    // mysqli_query($conn, $sql);
    // Check if email is taken
	$stmt = $conn->prepare("INSERT INTO tasks (user_id, task) VALUES (?,?)");
	$stmt->bind_param("ss", $user_id, $task);
	$stmt->execute();
  $stmt->close();
  } elseif (isset($_POST['delete'])) {
    // Delete a task for the user
    $id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM tasks WHERE id = $id AND user_id = $user_id";
    mysqli_query($conn, $sql);
  }
}


// Display the user's tasks in a table
?>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #ffffff;
  }

  main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60vh;
  }

  .wrapper-main {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
  }

  #add{
   
    margin-top:1rem;
    align-items: end;
  }

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  input[type="text"],
  input[type="password"] {
    border: none;
    border-radius: 8px;
    padding: 10px;
    font-size: 16px;
    background-color: #f2f2f2;
  }
</style>

<?php

require "footer.php";
}else{
  echo "Login to access this page!";
}
?>