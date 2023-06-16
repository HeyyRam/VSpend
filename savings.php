<?php
$conn=mysqli_connect("localhost","root","","expense_tracker",3307);
if(!$conn){
  die("Connection Error :(");
}

$query="SELECT SUM(Amount) AS Amt_Sum FROM add_expense WHERE Date=CURDATE()";
$d_sum=mysqli_query($conn,$query);

$query1="SELECT SUM(Amount) AS Amt_Sum FROM add_expense WHERE month(Date)=month(CURDATE())";
$m_sum=mysqli_query($conn,$query1);

$rows1=mysqli_fetch_assoc($d_sum);
$d_expense=$rows1['Amt_Sum'];

$rows2=mysqli_fetch_assoc($m_sum);
$m_expense=$rows2['Amt_Sum'];

$d_savings=0;
$m_savings=0;

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
          <li><a href="spendings.php">Spendings</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Savings</a></li>
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <section class="save">
    <div class="v_save">
      <h2>Savings</h2>
      <form action="savings.php" method="post">
        <div>
          <label for="daily_limit"><p>Enter Daily Limit:</p></label><br>
          <input type="number" id="daily_limit" name="daily_limit">

        </div>
        <div>
          <label for="monthly_limit"><p>Enter Monthly Limit:</p></label><br>
          <input type="number" id="monthly_limit" name="monthly_limit">
        </div>
        <div>
          <input type="submit" value="Submit">
        </div>
        
        
      </form>
      <?php
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $daily_limit=$_POST['daily_limit'];
        $monthly_limit=$_POST['monthly_limit'];
    
        $d_savings=$daily_limit-$d_expense;
        $m_savings=$monthly_limit-$m_expense;
        
    }
    
    mysqli_close($conn);
    
    ?>

      <div>
          <table id="table">
            <tr>
              <th>Daily Expense</th>
              <th>Daily Savings</th>
              <th>Monthly Expense</th>
              <th>Monthly Savings</th>
            </tr>
            <tr>
              <td id="d_expense"> <?php echo $d_expense; ?> </td>
              <td id="d_savings"> <?php 
                   try{
                    echo $d_savings;
                   }
                   catch(Exception $e){echo "Enter Daily Limit";} ?> 
              </td>
              <td id="m_expense"> <?php echo $m_expense; ?> </td>
              <td id="m_savings"> <?php
                  try{
                   echo $m_savings;
                  }
                  catch(Exception $e){echo "Enter Monthly Limit";} ?>   </td>
            </tr>
          </table>
        </div>
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

        <a href="spendings.php">Spendings</a>

        <a href="#">Savings</a>

      
      </p>

    </div>

  </footer>

  
</body>
</html>

<script>
  var table=document.getElementId('table');
  table.
  sav=Number(sav);
  if(sav<0){
    sav.style.backgroundColor="red";
  }

</script>