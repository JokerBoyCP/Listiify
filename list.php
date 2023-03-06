<?php

require "header.php";

?>

<main>
  <div class="wrapper-main">
    <h1>Tasks</h1>
    <form method="post" action="add_task.php">
  <label for="list_name">List Name:</label>
  <input type="text" id="list_name" name="list_name">
  <br>
  <label for="task">Task:</label>
  <input type="text" id="task" name="task">
  <br>
  <input type="submit" name="add" value="Add Task">
</form>

  </div>
</main>
<?php
  if (isset($_POST['add/update'])) {
    $task = $_POST['task'];
    $list_id = $_POST['list_id'];
    if (empty($task)) {
      echo "Task field is required.";
    } else {
      // Check if list ID exists for this user
      $user_id = $_SESSION['idUsers'];
      $stmt = $conn->prepare("SELECT * FROM lists WHERE idUsers = ? AND list_id = ?");
      $stmt->bind_param("ii", $user_id, $list_id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows == 0) {
        echo "List does not exist or does not belong to you.";
      } else {
        // Insert or update task in database
        $task_id = $_POST['task_id'];
        if (empty($task_id)) {
          $stmt = $conn->prepare("INSERT INTO tasks (list_id, task) VALUES (?, ?)");
          $stmt->bind_param("is", $list_id, $task);
        } else {
          $stmt = $conn->prepare("UPDATE tasks SET task = ? WHERE task_id = ?");
          $stmt->bind_param("si", $task, $task_id);
        }
        $stmt->execute();
        echo "Task added/updated successfully.";
      }
    }
  }

  // Check if form has been submitted to create new list
  if (isset($_POST['create_list'])) {
    $list_name = $_POST['list_name'];
    if (empty($list_name)) {
      echo "List name field is required.";
    } else {
      // Insert new list into database
      $user_id = $_SESSION['idUsers'];
      $stmt = $conn->prepare("INSERT INTO lists (idUsers, list_name) VALUES (?, ?)");
      $stmt->bind_param("is", $user_id, $list_name);
      $stmt->execute();
      echo "List created successfully.";
    }
  }

  // Check if form has been submitted to delete list
  if (isset($_POST['delete_list'])) {
    $list_id = $_POST['list_id'];
    // Delete list and all associated tasks from database
    $user_id = $_SESSION['idUsers'];
    $stmt = $conn->prepare("DELETE FROM lists WHERE idUsers = ? AND list_id = ?");
    $stmt->bind_param("ii", $user_id, $list_id);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM tasks WHERE list_id = ?");
    $stmt->bind_param("i", $list_id);
    $stmt->execute();
    echo "List deleted successfully.";
  }

  // Display list of user's lists
  $user_id = $_SESSION['idUsers'];
  $stmt = $conn->prepare("SELECT * FROM lists WHERE isUsers = ?");
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['list_name']) . "</h2>";
    echo "<form method='post'>";
  }
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

?>