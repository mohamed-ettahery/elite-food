<?php
require "includes/classes/livreure.php";


$CINS=$_SESSION['IDLivreure'];
$Livr=new livreure();
$ronws=$Livr->getAllLivreureEdite($CINS);



if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_GET["NVIM"])){
  	
$Imagename = $_FILES['Image']['name'];
	 $fileImg="../admin/img/Livreures\\".$Imagename;
 	 $ImageTmp = $_FILES['Image']['tmp_name'];
	 $Image=rand(0,1000).'_'.$Imagename;
	 move_uploaded_file($ImageTmp, "../admin/img/Livreures\\".$Image);
	  $Livr->UpdateLivrImg($CINS,$Image);
	    // echo '<script>window.open("Livreure.php","_self");</script>';
	}
elseif(isset($_GET["Anulle"])){
   $OLDImage=$_POST['OLDImage'];
 
   $Livr->UpdateLivrImg($CINS,$OLDImage);
 
}elseif(isset($_GET['Editer'])){
 
   $Livr->UpdateLivr($_GET['CINLIV'],$_POST['Nom'],$_POST['Prenom'],$_POST['Tele'],$_POST['Email'],$_POST['Password']);
   echo '<script>window.open("Index.php?Profil","_self");</script>';

}
	 
	}
?>
   <div class="Livreure" style="margin-top: -23px;">
   	 <div class="">

   	 		<?php foreach ($ronws as $key ) {
   	 			// code...
   	 		?>		
   	 	<div class="row">
   	 		<div class="Photo">
   	 		<div class="col-xl-12">
   	 		
   	 				<form id="myfo" method="POST" action="Index.php?Profil&NVIM" enctype="multipart/form-data">
   	 					<p id="P1">..</p>
   	 					<?php if(!empty($Image)){
   	 						echo "<img id='Photo' src='../admin/img/Livreures\\".$Image."' />";
   	 					}elseif(!empty($OLDImage)){
   	 						echo "<img id='Photo' src='../admin/img/Livreures\\".$OLDImage."' />";
   	 					}else{
   	 						echo "<img src='../admin/img/Livreures\\".$key[6]."' id='Photo'>";
   	 					}?>
   	 					
	                    <input style="display:none;top: 175px;" type="file" name="Image" id="File">
	                   
	                    
                    </form>
                    <form style="    position: relative;top: -33px;left: 1px;" id="myfo1" method="POST" action="Index.php?Profil&Anulle" enctype="multipart/form-data">
                    	 
                    	 <input style="display:none" type="text" name="OLDImage" value=<?php echo $key[6]; ?>>

                         <input style="display:none" type="submit" name="" value="Anuller" id="Anuller">
                    </form>
   	 					
   	 				
   	 				

   	 			
   	 			</div>
   	 		</div>

   	 		<div class="col-xl-12" style="text-align: center;" >
   	 			<div id="Nompr" class="NomPre" style="    margin-top: 75px;">
           <form action="Index.php?Profil&Editer&CINLIV=<?php echo $key[0]; ?>" method="post">
                   	<input id="HiddenNom" type="hidden" name="Nom" value=<?php echo $key[1];?>>
                   	<input id="HiddenPrenom" type="hidden" name="Prenom" value=<?php echo $key[2];?>>
   	 				<input class="NPEdite" type="text" id="inpPr" name="" style="display:none">
   	 				<h2 id="hnpr" style="display:inline;"><?php echo $key[1] ." ".$key[2]; ?></h2>
   	 				<i style="   display: none; font-size: 23px;margin-left: 86px;" class="fas fa-edit" id="ICO"></i>
   	 			</div>
   	 			
   	 		</div>
   	 		
   	 			
   	 		<div class="boxDonne" style="    margin-left: 78px;">
            <div class="col-12">
            	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profile-description-box">
                                <div>
                                	<i style="color: #f71212" class=" fas fa-phone-alt"></i>
                                	<label><?php echo $key[3]; ?></label>
                                	<input type="text" name="" value="">
                                	<i class="fas fa-edit" id="ICO"></i>
                                	<input type="hidden" name="Tele" value=<?php echo $key[3]; ?>>
                                </div>
                                <div>
                                	<i style="color: #f71212" class="fas fa-unlock-alt"></i> 
                                	<label><?php echo $key[5]; ?></label>
                                	<input type="text" name="">
                                	<i class="fas fa-edit" id="ICO"></i>
                                	<input type="hidden" name="Password" value=<?php echo $key[5]; ?>>
                                </div>
                                


                                   
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-description-box">
                               <div>
                               	<i style="color: #f71212" class="fas fa-envelope"></i> 
                               	<label><?php echo $key[4]; ?></label>
                               	<input type="text" name="">
                               	<i class="fas fa-edit" id="ICO"></i>
                               	<input type="hidden" name="Email" value=<?php echo $key[4]; ?>>
                               </div>
                               

                                  
                               
                            </div>
                           
                            <!-- <span class="btn btn-info" onclick='closeAbout()'>Click</span> -->
                        </div>
                        <div class="col-md-6">
                            <input class="btn btn-info" type="submit" name="" value="Save">
                        </div>
                    </div>

                </form>
                </div>
                
   	 	</div>
   	 	</div>
   <?php } ?>
   	 </div>
   </div>