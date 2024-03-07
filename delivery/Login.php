<?php 
require "includes/classes/livreure.php";
$a=-1;
session_start();
// if(isset($_SESSION['IDLivreure'])){
//    header('Location: Index.php');
   
// }

   if($_SERVER['REQUEST_METHOD']=='POST'){
      $username=$_POST['email'];
      $Password=$_POST['psw'];
     
      $Livr=new livreure();
      $rows=$Livr->checkLivreur($username,$Password);
      $count =count($rows);
  
          

   
if($count > 0){

     
      $_SESSION['IDLivreure']=$rows[0][1];
      $_SESSION["ImageLivreure"]=$rows[0][3];
      $_SESSION['NomLivreure']=$rows[0][4];
      $_SESSION['PrenomLivreure']=$rows[0][5];
      // echo $_SESSION['IDUser'];
        header('Location: Index.php');
      exit();
   }else{
   	$a=1;
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="layouts/css/DashAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="layouts/css/bootstrap.min.css">
    <link href="layouts/css/DashAdmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layouts/css/BackCss.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="layouts/css/DashAdmin/css/Login.css">
</head>
<body>
<div class="login-page">
    <div class="container">
        <h1 class="text-center login-title"><span data-class ="login" >Login Dilevery</span></h1>
        <!-- Start Login -->
        <form action="Login.php" method="POST" class="login">
        	<?php if($a==1){
        		echo " <div class='alert alert-danger ' role='alert'>
                     Your Email or your password incorrect
        </div>";
        	} ?>
            <div class="input-box">
            	<input type="text" class="form-control" name="email" placeholder="email" autocomplete="off" required/>
            </div>
            <div class="input-box">
            	<input type="password" class="form-control" name="psw" placeholder="password" autocomplete="new-password" required/>
            </div>
            <input type="submit" class="form-control btn btn-info" name="login" value="Login"/>
        </form>
        <!-- End Login -->
       
      
   
    </div>
</div>
</body>
  <!-- Bootstrap core JavaScript-->
    <script src="layouts/css/DashAdmin/vendor/jquery/jquery.min.js"></script>
    <script src="layouts/css/DashAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="layouts/css/DashAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/DashJs/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="layouts/css/DashAdmin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/DashJs/demo/chart-area-demo.js"></script>
    <script src="js/DashJs/demo/chart-pie-demo.js"></script>
    
    <script type="text/javascript" src="layouts/js/Backjs.js"></script>
    <script type="text/javascript" src="layouts/js/BackjsCommande.js"></script>
    <script type="text/javascript" src="layouts/js/Login.js"></script>
</html>