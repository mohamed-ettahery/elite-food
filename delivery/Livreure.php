<?php
require "includes/classes/livreure.php";
$CINS="cc";
$Livr=new livreure();
$ronws=$Livr->getAllLivreureEdite($CINS);



if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_GET["NVIM"])){
  	
$Imagename = $_FILES['Image']['name'];
	 $fileImg="img\Livreures\\".$Imagename;
 	 $ImageTmp = $_FILES['Image']['tmp_name'];
	 $Image=rand(0,1000).'_'.$Imagename;
	 move_uploaded_file($ImageTmp, "img\\".$Image);
	  $Livr->UpdateLivrImg($CINS,$Image);
	    // echo '<script>window.open("Livreure.php","_self");</script>';
	}
elseif(isset($_GET["Anulle"])){
   $OLDImage=$_POST['OLDImage'];
 
   $Livr->UpdateLivrImg($CINS,$OLDImage);
 
}elseif(isset($_GET['Editer'])){
 
   $Livr->UpdateLivr($_GET['CINLIV'],$_POST['Nom'],$_POST['Prenom'],$_POST['Tele'],$_POST['Email'],$_POST['Password']);
   echo '<script>window.open("Livreure.php","_self");</script>';

}
	 
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Livreure</title>
	<link href="layouts/css/DashAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="layouts/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="layouts/css/BackCss.css">
	<style type="text/css">

.profile-description-box div input{
	/*display: inline;*/
}
	</style>
</head>
<body>
   <div class="Livreure">
   	 <div class="container">

   	 		<?php foreach ($ronws as $key ) {
   	 			// code...
   	 		?>		
   	 	<div class="row">
   	 		<div class="Photo">
   	 		<div class="col-xl-12">
   	 		
   	 				<form id="myfo" method="POST" action="Livreure.php?NVIM" enctype="multipart/form-data">
   	 					<p id="P1">..</p>
   	 					<?php if(!empty($Image)){
   	 						echo "<img id='Photo' src='img\\".$Image."' />";
   	 					}elseif(!empty($OLDImage)){
   	 						echo "<img id='Photo' src='img\\".$OLDImage."' />";
   	 					}else{
   	 						echo "<img src='img\\".$key[6]."' id='Photo'>";
   	 					}?>
   	 					
	                    <input style="display:none;top: 175px;" type="file" name="Image" id="File">
	                   
	                    
                    </form>
                    <form style="    position: relative;top: -33px;left: 1px;" id="myfo1" method="POST" action="Livreure.php?Anulle" enctype="multipart/form-data">
                    	 
                    	 <input style="display:none" type="text" name="OLDImage" value=<?php echo $key[6]; ?>>

                         <input style="display:none" type="submit" name="" value="Anuller" id="Anuller">
                    </form>
   	 					
   	 				
   	 				

   	 			
   	 			</div>
   	 		</div>

   	 		<div class="col-xl-12" style="text-align: center;" >
   	 			<div id="Nompr" class="NomPre" style="    margin-top: 75px;">
           <form action="Livreure.php?Editer&CINLIV=<?php echo $key[0]; ?>" method="post">
                   	<input id="HiddenNom" type="hidden" name="Nom" value=<?php echo $key[1];?>>
                   	<input id="HiddenPrenom" type="hidden" name="Prenom" value=<?php echo $key[2];?>>
   	 				<input class="NPEdite" type="text" id="inpPr" name="" style="display:none">
   	 				<h2 id="hnpr" style="display:inline;"><?php echo $key[1] ." ".$key[2]; ?></h2>
   	 				<i style="   display: none; font-size: 23px;margin-left: 86px;" class="fas fa-edit" id="ICO"></i>
   	 			</div>
   	 			
   	 		</div>
   	 		
   	 			
   	 		
            <div class="col-12">
            	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile-description-box">
                                <div>
                                	<i class=" fas fa-phone-alt"></i>
                                	<label><?php echo$key[3]; ?></label>
                                	<input type="text" name="" value="">
                                	<i class="fas fa-edit" id="ICO"></i>
                                	<input type="hidden" name="Tele" value=<?php echo $key[3]; ?>>
                                </div>
                                <div>
                                	<i class="fas fa-unlock-alt"></i> 
                                	<label><?php echo$key[5]; ?></label>
                                	<input type="text" name="">
                                	<i class="fas fa-edit" id="ICO"></i>
                                	<input type="hidden" name="Password" value=<?php echo $key[5]; ?>>
                                </div>
                                


                                   
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-description-box">
                               <div>
                               	<i class="fas fa-envelope"></i> 
                               	<label><?php echo$key[4]; ?></label>
                               	<input type="text" name="">
                               	<i class="fas fa-edit" id="ICO"></i>
                               	<input type="hidden" name="Email" value=<?php echo $key[4]; ?>>
                               </div>
                               

                                  
                               
                            </div>
                           
                            <!-- <span class="btn btn-info" onclick='closeAbout()'>Click</span> -->
                        </div>
                        <div class="col-md-6">
                            <input type="submit" name="" value="upload">
                        </div>
                    </div>

                </form>
                </div>
                
   	 	</div>
   <?php } ?>
   	 </div>
   </div>
 
    
</body>
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
</html>
<!-- ./admin/img/Livreures -->