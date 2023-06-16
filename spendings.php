<?php 
$conn=mysqli_connect("localhost","root","","expense_tracker",3307);
if(!$conn){
  die("Connection Error :(");
}

$query1="SELECT * FROM add_expense";
$result=mysqli_query($conn,$query1);

$query2="SELECT SUM(Amount) AS Amt_Sum FROM add_expense WHERE Date=CURDATE()";
$d_sum=mysqli_query($conn,$query2);

$query3="SELECT AVG(Amount) AS Amt_Avg FROM add_expense WHERE Date=CURDATE()";
$d_avg=mysqli_query($conn,$query3);

$query4="SELECT SUM(Amount) as Amt_Sum FROM add_expense WHERE month(Date)=month(CURDATE())";
$m_sum=mysqli_query($conn,$query4);

$query5="SELECT AVG(Amount) as Amt_Avg FROM add_expense WHERE month(Date)=month(CURDATE())";
$m_avg=mysqli_query($conn,$query5);

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

  <Style>
    .view{
    background-image: url("desktop-wallpaper-35-sage-green-aesthetic-shades-of-green-layers-green-simple.jpg");
    animation: 0.75s ease-out 0s 1 dropDown;
    transition: 0.5s;
    position: relative;
    background-size: cover;
    height: auto;
    padding-top: 10px;
}

.view h2{
    margin-top: 80px;
    text-align: center;
    font-size: 30px;
}

.view table{
    margin-left: 180px;
    padding: 10px;
    border-spacing: 0px;
    border-radius: 10px;
}

.view th{
    width: 290px;
    height: 90px;
    font-size: 19px;
    text-align: center;
    background-color: #C4DFAA;
}

.view td{
    width: 250px;
    height: 60px;
    font-size: 17px;
    text-align: center;
    background-color: #C4DFAA;
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
          <li><a href="add.html">Add</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Spendings</a></li>
          <li><a href="savings.php">Savings</a></li>
          
         
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <section class="view">
    <div class="v_container">
      <h2>View Your Spendings</h2>
      <table class="t_spend" >
        <tr>
          <th>Date</th>
          <th>Category</th>
          <th>Name</th>
          <th>Amount</th>
        </tr>
        <tr>
          <?php while($rows=mysqli_fetch_assoc($result))
          {

        
          ?>
          <td> <?php echo $rows['Date']; ?> </td>
          <td> <?php echo $rows['Category']; ?> </td>
          <td> <?php echo $rows['Name']; ?> </td>
          <td> <?php echo $rows['Amount']; ?> </td>
        </tr>
        <?php 
          }
        ?>
      </table>
      <table class="t_calc">
        <tr>
          <th>Monthly Total</th>
          <th>Monthly Average</th>
          <th>Daily Total</th>
          <th>Daily Average</th>
        </tr>
        <tr>
          <td> <?php $rows3=mysqli_fetch_assoc($m_sum);
                echo $rows3['Amt_Sum']; ?> </td>
          <td> <?php $rows4=mysqli_fetch_assoc($m_avg);
                echo $rows4['Amt_Avg']; ?> </td>
          <td> <?php $rows1=mysqli_fetch_assoc($d_sum);
                echo $rows1['Amt_Sum']; ?> </td>
          <td> <?php $rows2=mysqli_fetch_assoc($d_avg);
                echo $rows2['Amt_Avg']; ?> </td>
        </tr>
      </table>
    </div>

  </section>
  
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

        <a href="add.html">Add</a>

        <a href="#">Spendings</a>

        <a href="savings.php">Savings</a>

      
      </p>

    </div>

  </footer>


</body>
</html>

<?php
mysqli_close($conn);
?>