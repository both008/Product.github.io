<!DOCTYPE html>
<html>
<head>
  <title>Client List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- link css-->
  <link rel="stylesheet" href="style.css">
  <!-- link awesome -->
  <script src="https://kit.fontawesome.com/9d18520064.js" crossorigin="anonymous"></script>
  
</head>
<body>
<div class="container my-5">
  <h2>List of Clients</h2>
  <a href="create.php" class="btn btn-primary mb-3">New Client</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr class="table-primary">
        <th>ID</th>
        <th><i class="fa-solid fa-user-secret"></i>Name</th>
        <th><i class="fa-solid fa-envelope"></i>Email</th>
        <th><i class="fa-solid fa-phone"></i>Phone</th>
        <th><i class="fa-solid fa-address-card"></i>Address</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $conn = new mysqli("localhost", "root", "", "myshop");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query("SELECT * FROM clients");
        while($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['address']}</td>
            <td>{$row['created_at']}</td>
            <td>
              <a href='update.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
              <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
            </td>
          </tr>";
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
