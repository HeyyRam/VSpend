<?php
// database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expense_tracker";

// create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname,3307);

// check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $amount = $_POST["amount"];
    $name = $_POST["name"];
    $date = $_POST["date"];

    $errors=array();

    if(!is_numeric($amount)){
      $errors[]="Enter Valid Amount";
    }

    for($i=0;$i<strlen($name);$i++){
      if(is_numeric($name[$i])){
        $errors[]="Enter Valid Name";
      }
    }

    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo "<script> alert($error);</script>";
      }
    }
    else{
      $sql = "INSERT INTO add_expense (Category, Name, Amount, Date) VALUES ('$category', '$name', '$amount', '$date')";

    
      if (mysqli_query($conn, $sql)) {
        echo "<script>";
        echo 'alert("Record Added Successfully!");';
        echo "</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    }

    // insert the form data into the database
    
    
   


// close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VSpend</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--Linking-->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="script.js"></script>
  <style>
    .middle{
      background-image: url("72b014558b4025e1a0dddf6f7dd0de54.jpg");
    margin-bottom: 10px;
    margin-top: 0;
    position: relative;
    background-size: cover;
    height: 85vh;
    padding-top: 10px;
        
    }
    .middle a{
      text-decoration: none;
  
    }
    .middle button{
      margin-left: 650px;
      margin-top: 300px;
      width: 250px;
      height: 70px;
      border-radius: 10px;
      font-size: 20px;
      background-color: #C4DFAA;

    }
    .middle button:hover {
      transform: scale(1.03) ;
      transition: 0.5s;
      color: #C4DFAA;
      background-color: #738678;

    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">VSpend</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Add</a></li>
          <li><a href="spendings.php">Spendings</a></li>
          <li><a href="savings.php">Savings</a></li>
          
       
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <div class="middle">
    <a href="add.html"><button type="button">Add More</button></a>
  </div>

  <footer class="footer-distributed">

    <div class="footer-right">

      <a href="https://www.instagram.com/obhi_nahi/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
      <a href="https://www.linkedin.com/in/abhiram-mujumdar-b8988823b/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
      <a href="https://github.com/HeyyRam"><i class="fa-brands fa-github" target="_blank"></i></a>
      <a href="#"><i class="fa-solid fa-envelope"></i></a>

    </div>

    <div class="footer-left">

      <p class="footer-links">
        <a class="link-1" href="index.html">Home</a>

        <a href="#">Add</a>

        <a href="spendings.php">Spendings</a>

        <a href="savings.php">Savings</a>

      
      </p>

    </div>

  </footer>
  
</body>

</html>
