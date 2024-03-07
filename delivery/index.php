<?php
session_start();
if(isset($_SESSION['IDLivreure'])){
spl_autoload_register(function($class)
{
    require "includes/classes/$class.php";
});
$Photo= $_SESSION["ImageLivreure"];
 $Nom=$_SESSION['NomLivreure'];
 $Prenom =$_SESSION['PrenomLivreure'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

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
<style>
        .Table-Commande{
     background-color: white;
    
    position: relative;
    overflow-y: auto;
    margin-bottom: 2%;
    margin-left: 18px;
    text-align: center;
    border-radius: 3px;
    margin-top: 9px;
    padding: 26px;
  }
   .Table-Commande th{
    border: none;
    border-bottom: none !important;
}
.Table-Commande h1{
    font-family: 'Roboto', sans-serif;
}
.Photo{

        background: linear-gradient(
103deg, #ff3d3d, #ffccccba);
}
.navbarS{
        background: linear-gradient(
103deg, #ff3d3d, #ffccccba);
}

    </style>

    
</head>

<body id="page-top">
      <div id="wrapper">
  <!-- Sidebar -->
        <ul class="navbarS navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-biking"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dilevery</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

       <br/>

            <!-- Heading -->
          

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="ProfilActive">
                <a class="nav-link collapsed" href="Index.php?Profil" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Profil</span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item" id="CommandeActive">
                <a class="nav-link collapsed" href="Index.php?Commande"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Orders</span>
                </a>
                
            </li>
          
           
            <li class="nav-item" id="DeconnectActive">
                <a class="nav-link collapsed" href="Logout.php" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                   <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                
            </li>

            
          

           

          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  

                    
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                       

                      
                      
                    
                            
                          

                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $Nom . " ".$Prenom; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../admin/img/Livreures//<?php echo $Photo; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              <?php
                 if(isset($_GET['Profil']))
                 {
                    require "includes/Profil.php";
                     echo "<script>
                    document.getElementById('ProfilActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==0){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";

                 }elseif(isset($_GET['Commande'])){
                    require "includes/Commande.php";
                      echo "<script>
                    document.getElementById('CommandeActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==1){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }
              
                else{
                    require "includes/Profil.php";
                 }
              ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Elite Food 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
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
</html>
<?php }else{
     header('Location: Logout.php');
     exit();
     } ?>