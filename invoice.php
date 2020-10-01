<?php 

include 'connection.php';

$gbid = $_GET['gbid'];

$query = "SELECT * FROM usedparts WHERE bookid = '$gbid'";
$query1 = "SELECT quantity FROM usedparts WHERE bookid = '$gbid'";
$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);
$price = 10000;

      /*while( $row = mysqli_fetch_assoc( $result ) ){
            echo "<tr><td>{$row['bookid']}</td><td>{$row['parts']}</td><td>{$row['quantity']}</td><td>{$price*$row['quantity']}</td></tr>\n";
            } */
$query6 = "SELECT bookid, parts FROM usedparts WHERE bookid = '".$gbid."'";
$result6 = mysqli_query($con, $query6);
$row2 = mysqli_fetch_assoc($result6);
$cart = $row2['parts'];            


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

 <h1 style="text-align:center;">Online Garage Mnagement System</h1>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!--<th>ID</th>-->
                      <th>Parts Used</th>
                      <th>Quantity</th>
                      <th>Price per Quantity</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  
                  </tbody>
                </table>
    <h1 id="disp"></h1>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    <!-- End of Content Wrapper -->

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
<script>
    document.addEventListener("DOMContentLoaded",() => {
    var cart = JSON.parse('<?php echo $cart;?>');
        var price;
        var sum = 0;
        
    
    for (var i=0; i < cart.length; ++i){
        /*console.log(cart[i].partName);*/
        if (cart[i].partName == 'engine'){
            price = 100000;
        }
        else if (cart[i].partName == 'tyres'){
            price = 20000;
        }
        else if(cart[i].partName == 'steering'){
            price = 20000;
        }
        const html = `
                  <thead>
                    <tr>
                      <th>${cart[i].partName}</th>
                      <th>${cart[i].qty}</th>
                        <th>${price*cart[i].qty}</th>
                    </tr>
                  </thead>
      `;
        sum += price*cart[i].qty;
      document.getElementById('dataTable').innerHTML += html;
        const html2 = `Total : ${sum}`;
        document.getElementById("disp").innerHTML = html2;
    }

         
})</script> 

</body>


</html>