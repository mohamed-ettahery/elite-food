<?php
session_start();
if(isset($_SESSION['IDAdimin'])){
  $NomAdm= $_SESSION['Nom'];
  $PrenomAdm = $_SESSION['Prenom'];
   

spl_autoload_register(function($class)
{
    require "includes/classes/$class.php";
});

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="layouts/css/DashAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="layouts/css/DashAdmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layouts/css/DashAdmin/css/BackCss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<style>
    .states .progress {
    width: 150px;
    height: 150px !important;
    
    line-height: 150px;
    background: none;
  
    margin: 20px auto;
    box-shadow: none;
    position: relative
}

.states .progress:after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0
}

.states .progress>span {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1
}

.states .progress .progress-left {
    left: 0
}

.states .progress .progress-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0
}

.states .progress .progress-left .progress-bar {
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left
}

.states .progress .progress-right {
    right: 0
}

.states .progress .progress-right .progress-bar {
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transition: all 0.6s;
    transform-origin: center right;
    /* animation: loading-1 1.8s linear forwards */
}

.states .progress .progress-value {
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #000;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%
}

.states .progress.blue .progress-bar {
    border-color: #049dff
}

.states .progress.blue .progress-left .progress-bar {
    /* animation: loading-2 1.5s linear forwards 1.8s */
    transition: all 0.6s;
}

.states .progress.yellow .progress-bar {
    border-color: #fdba04
}

.states .progress.yellow .progress-right .progress-bar {
    /* animation: loading-3 1.8s linear forwards */
    transition: all 0.6s;
}

.states .progress.yellow .progress-left .progress-bar {
    animation: none
}


.MArgCol{
    margin-top: 3%;
}

.MArgCol h1{
    font-family: 'Lato';
    font-size: 20px;
}
.Valide{
   border-color:greenyellow !important ;
}
.NonValide{
    border-color:red !important;
}
.Attend{
    border-color: orange !important;
}
.Green{
text-shadow:-2px 0px 3px greenyellow ;
}
.red{
    text-shadow:-2px 0px 3px red;
}
.Orange{
    text-shadow:-2px 0px 3px orange ;
}
.Ana a{
  color:red !important;
    }
    .navbarS{
        background: linear-gradient(
103deg, #ff3d3d, #ffccccba);
}
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul  class="navbarS navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img style="    width: 83px;" class="img-profile rounded-circle"
                                    src="img/logo.png">
                </div>
                <div class="sidebar-brand-text mx-3" style="    margin-left: -15px !important;">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="DashActive">
                <a class="nav-link" href="Index.php?Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="ClietnActive">
                <a class="nav-link collapsed" href="Index.php?Clients" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Clients</span>
                </a>
                
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item" id="CommandeActive">
                <a class="nav-link collapsed" href="Index.php?Commandes"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Orders</span>
                </a>
                
            </li>
            <li class="nav-item" id="CategoriesActive">
                <a class="nav-link collapsed" href="Index.php?Categories" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-cubes"></i>
                    <span>Categories</span>
                </a>
                
            </li>
            <li class="nav-item" id="ProduitActive">
                <a class="nav-link collapsed" href="Index.php?Produits" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-utensils"></i>
                    <span>Dishes</span>
                </a>
                
            </li>
            <li class="nav-item" id="LivreureActive">
                <a class="nav-link collapsed" href="Index.php?Livreure" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-biking"></i>
                    <span>Dilevery</span>
                </a>
                
            </li>
            <li class="nav-item" id="BlogActive">
                <a class="nav-link collapsed" href="Index.php?Blog" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-newspaper"></i>
                    <span>Blogs</span>
                </a>
                
            </li>
             <li class="nav-item" id="CommentActive">
                <a class="nav-link collapsed" href="Index.php?Comment" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="far fa-comments"></i>
                    <span>Comments</span>
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
                        <li class="nav-item dropdown no-arrow d-sm-none">
                           
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                      
                      
                    
                            
                          

                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img style="    width: 57px;" class="img-profile rounded-circle"
                                    src="img/logo.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <a class="dropdown-item" href="Logout.php"  data-target="#logoutModal">
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
                 if(isset($_GET['Dashboard']))
                 {
                    require "includes/Dashboard.php";

                 }elseif(isset($_GET['Clients'])){
                    require "includes/Clients.php";
                    echo "<script>
                    document.getElementById('ClietnActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==1){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }elseif(isset($_GET['Commandes'])){
                    require "includes/Commandes.php";
                      echo "<script>
                    document.getElementById('CommandeActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==2){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }elseif(isset($_GET['Categories'])){
                    require "includes/Categories.php";
                    echo "<script>
                    document.getElementById('CategoriesActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==3){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }elseif(isset($_GET['Produits'])){
                    require "includes/Produits.php";
                    echo "<script>
                    document.getElementById('ProduitActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==4){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }elseif(isset($_GET['Livreure'])){
                    require "includes/Livreure.php";
                    echo "<script>
                    document.getElementById('LivreureActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==5){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }
                 // elseif(isset($_GET['AddCat'])){
                 //    require "includes/Livreure.php";
                 //    echo "<script>
                 //    document.getElementById('CommandeActive').classList.add('active');
                 //    var Items=document.querySelectorAll('.nav-item');
                 //        for (var i = 0; i < Items.length; i++) {
                 //           if(i==2){
                 //            continue;
                 //           }
                               
                 //               this.classList.remove('active');

                        
                 //    }
                     
                 //     </script>";
                 // }
                 elseif(isset($_GET['Blog'])){
                    require "includes/Blog.php";
                    echo "<script>
                    document.getElementById('BlogActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==6){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }elseif(isset($_GET['Comment'])){
                    require "includes/Comment.php";
                    echo "<script>
                    document.getElementById('CommentActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==7){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
                 }else{
                     require "includes/Dashboard.php";
                     echo "<script>
                    document.getElementById('DashActive').classList.add('active');
                    var Items=document.querySelectorAll('.nav-item');
                        for (var i = 0; i < Items.length; i++) {
                           if(i==0){
                            continue;
                           }
                               
                               this.classList.remove('active');

                        
                    }
                     
                     </script>";
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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
<!--     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

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
    <script src="layouts/js/DashJs/DashJS.js"></script>
    <script src="layouts/js/DashJs/Client.js"></script>
    <script type="text/javascript" src="layouts/js/DashJs/DashCommande.js"></script>
    <script type="text/javascript" src="layouts/js/DashJs/DashCategorie.js"></script>
</body>

</html>
<?php }else{
     header('Location: Login.php');
     exit();
} ?>