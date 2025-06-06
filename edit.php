<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$id ="";
$name = "";
$email = "";
$phone = "";
$address="";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
 if(isset($_GET["id"])){

  header("Location: index.php");
  exit;
    }
  
$id =$_GET["id"];
// read the row of the selected client from database table
$sql = "SELECT * FROM clients WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(!$row){
    header("Location: index.php");
    exit;

 }
$name = $row["name"];
$email = $row["email"];
$phone = $row["phone"];
$address = $row["address"];
}
else{
$id  = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

do{
if (empty($id)||empty($name) || empty($email) || empty($phone) || empty($address)) {
    $errorMessage = "All fields are required.";
    break;

}
// update the client in the database
$sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', address='$address'
WHERE id=$id";
$result = $conn->query($sql);

$result = $conn->query($sql);
if(!$result) {
    $errorMessage = "Invalid query: " . $conn->error;
    break;
}
$successMessage = "Client updated correctly";
header("location: index.php");
exit;
}while(true);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>myshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style1.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- awesome -->
  <script src="https://kit.fontawesome.com/9d18520064.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container my-5">
        <h2>New client</h2>
        
        <?php
        if(!empty($errorMessage)) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <form action="" method="post">
        <input type="post" value="<?php echo $id; ?>" name="id" >
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label"id="name"><i class="fa-solid fa-user-secret"></i>Name:</label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" >
            </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><i class="fa-solid fa-envelope"></i>Email:</label>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" value="<?php echo $email;?>" >
            </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><i class="fa-solid fa-phone"></i>Phone:</label>
            <div class="col-sm-6">
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" >
            </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label"><i class="fa-solid fa-address-book"></i></i> Address:</label>
            <div class="col-sm-6">
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" >
                </div>
            </div>
            
            <?php
            if(!empty($successMessage)) {
              echo"
              <div class='row mb-3'>
              <div class='offset-sm-3 col-sm-6'>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>$successMessage<strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
              </div>
              <\div>
              ";
            }
            ?>
            <div class="row mb-3">
      <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      <div class="col-sm-3 d-grid">
        <a href="index.php" class="btn btn-outline-primary"role="button">Cancel</a>
            </div>
        </form>
  </div>
</body>
</html>