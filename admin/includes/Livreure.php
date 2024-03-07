<?php
$Livreure = new livreure();
$rows =$Livreure->getAllLivreure();
$a =0;
$b=0;
$c=0;
$ExtentionValide=0;
$ExtentionValide2=0;
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_GET["EditeLivr"]) && isset($_POST["CIN"]) && isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Tele"]) && isset($_POST["Email"]) && isset($_POST["MDP"]) ){

    	$CIN = $_POST['CIN'];
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Tele = $_POST['Tele'];
        $Email = $_POST['Email'];
        $MDP = $_POST['MDP'];
        $Imagename = $_FILES['Image']['name'];
        $fileImg="img\Livreures\\".$Imagename;
        if(file_exists($fileImg)){
                	$Livreure->UpdateLivr($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$_POST['Image']);
					global $c;
       			    $c=1;
       			    
                

                }else{
                    $ImageTmp = $_FILES['Image']['tmp_name'];
	  				$arrayExtension = array("png","jpg","jpg");
	  				$explo=explode('.', $Imagename);
	  				$ImageExtension = strtolower(end($explo));
  				     if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;
                    move_uploaded_file($ImageTmp, "img\Livreures\\".$Image);#deplace un file vers une destination
                    
                    $Livreure->UpdateLivr($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$Image);
                    global $c;
       			    $c=1;
       			    
			      
	             }else{

                	$ExtentionValide2=1;
                	 echo ('<script>window.open("?Livreure&EditeLivr&ExtentionValide2=1&CINLivr='.$CIN.'","_self");</script>');
                	 echo $ExtentionValide2;
                  }
                }
       

    }elseif(isset($_GET["AddLivreur"]) && isset($_POST["CIN"]) && isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Tele"]) && isset($_POST["Email"]) && isset($_POST["MDP"]) ){
		
                $CIN = $_POST['CIN'];
		        $Nom = $_POST['Nom'];
		        $Prenom = $_POST['Prenom'];
		        $Tele = $_POST['Tele'];
		        $Email = $_POST['Email'];
		        $MDP = $_POST['MDP'];
		        $Imagename = $_FILES['Image']['name'];
  				$ImageTmp = $_FILES['Image']['tmp_name'];
  				$arrayExtension = array("png","jpg","jpg");
  				$explo=explode('.', $Imagename);
  				$ImageExtension = strtolower(end($explo));

  				 if(in_array($ImageExtension, $arrayExtension)){
                	$Image=rand(0,1000).'_'.$Imagename;
                    move_uploaded_file($ImageTmp, "img\Livreures\\".$Image);#deplace un file vers une destination
                    
                    
			        $countcheck =$Livreure->checkitem($CIN);
	                if($countcheck==0) {
	       
				        $Livreure->LivreurProperties($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$Image);
						$Livreure->setLivreur();
	                    global $b;
	                    $b=1;
			
		            }else{
						global $a;
						$a = 1;
               }
	             }elseif(empty($Imagename)){
                   $Image="UserDefault.png";
                   $countcheck =$Livreure->checkitem($Nom);
	                if($countcheck==0) {
	       
				         $Livreure->LivreurProperties($CIN,$Nom,$Prenom,$Tele,$Email,$MDP,$Image);
						$Livreure->setLivreur();
	                    global $b;
	                    $b=1;
			
		            }else{
						global $a;
						$a = 1;
                     }
	             }else{
                   $ExtentionValide=1;

                 }
  			
		       
               
               
	}
}if(isset($_GET['AddLivreur'])){ ?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-plus"></i> Add Dilevery</h3>
		</div>
            <form class="Login" method="post" action="Index.php?Livreure&AddLivreur" enctype="multipart/form-data">
					<?php if($a==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Ce Livreure et deja existe!
							  </div>";
					}elseif($b==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Livreure Ajouter!
						      </div>";
					}elseif($ExtentionValide==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					} ?>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">CIN</label>
				    <input  type="text" name="CIN" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Last Name</label>
				    <input  type="text" name="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">First Name</label>
				    <input  type="text" name="Prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Phone</label>
				    <input  type="text" name="Tele" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Email</label>
				    <input  type="text" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Image</label>
				    
						  <input type="file" style="display: block;" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
						 
					
				  </div>
				  <div class=" mb-3">
				    <label for="exampleInputEmail1" class="form-label">Password</label>
				    <input  type="text" name="MDP" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
				   
				  </div>
				  
				  
				  <a class="btn btn-primary" href="?Livreure"><i class="fas fa-angle-left"></i> Return</a>
				  <input style="float: right;" type="submit"  class="btn btn-success" value="Add" name="mm">
				  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>

<?php }elseif(isset($_GET["EditeLivr"])){
	if(isset($_GET["CINLivr"])){
		?>
	<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> Edit Dilevery</h3>
		</div>
		<?php
		 $rowsEdite=$Livreure->getAllLivreureEdite($_GET['CINLivr']);
		foreach($rowsEdite as $key ){ ?>
            <form class="Login" method="post" action="Index.php?Livreure&EditeLivr" enctype="multipart/form-data">
            	<?php if(isset($_GET['ExtentionValide2'])){
					if($_GET['ExtentionValide2']==1){
						echo "<div class='alert alert-danger' role='alert'>
								  Merci de saisir une image de extension PNG ou JPG ou JPEG!
							  </div>";
					}
				}   ?>
				      <input type="hidden" name="CIN" value="<?php echo ($key["CIN"]); ?>">
					  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Last Name</label>
					    <input  type="text" name="Nom" class="form-control" value="<?php echo ($key["Nom"]); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" >
					   
				      </div>
				      <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">First Name</label>
					    <input  type="text" name="Prenom" class="form-control" value="<?php echo ($key["Prenom"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
			  		   <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Phone</label>
					    <input  type="text" name="Tele" class="form-control" value="<?php echo ($key["Tele"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
			  		  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Email</label>
					    <input  type="text" name="Email" class="form-control" value="<?php echo ($key["Email"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
			  		  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Image</label>
					    <?php echo "<img id='ImageEdite' style='width: 94px; height: 94px; display: block;' src='img\Livreures\\".$key["Image"]."' />"; ?>
							  <input type="file" id="FileEdite" style="display: none;" value="<?php echo ($key["Image"]); ?>" name="Image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
							 
						
					  </div>
			  		  <div class=" mb-3">
					    <label for="exampleInputEmail1" class="form-label">Password</label>
					    <input  type="text" name="MDP" class="form-control" value="<?php echo ($key["MDP"]); ?>"  id="exampleInputEmail1" aria-describedby="emailHelp" >
				   
			  		  </div>
				  	  
					 
					  
					  
					  <a class="btn btn-primary" href="?Livreure"><i class="fas fa-angle-left"></i> Return</a>
					  <input style="float: right;"  type="submit"  class="btn btn-success" value="Edit" name="mm">
					  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
			</form>
	        <?php }
	}else{ ?>

	        	 <form class="Login" method="post" action="Index.php?Livreure&EditeLivr">
				    <?php if($c==1){
						echo "<div class='alert alert-success ' role='alert'>
						          Livreure Bien Modifier! </br> redirection...
						      </div>";
						      // echo " <script>
						      // 	window.setTimeout(window.open('?Categories','_self'), 900000000000000000000000000000000000000000);
						      // </script>";
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Livreure'>";
					}else{
						echo "nn";
					}  ?>
					
			</form>
	        <?php }
}elseif(isset($_GET["VoirLivre"])){
   	 if(isset($_GET["CINLivr"])){
   	 	$rowsClient =$Livreure->getAllLivreureEdite($_GET["CINLivr"]);
   	 	?>
   	 	<div class="DonneClient">
   	 		<div class="container-fluid">
   	 			<div class="row">
   	 				<?php foreach ($rowsClient as $key) {
   	 							
   	 						?>
   	 				<div class="col-xl-4 col-sm-12">
   	 					<div style="     margin-left: 38px;   position: relative;width: 252px;height: 308px;overflow: hidden;">
   	 					 
                          <img class="rounded float-start"style="    position: absolute;width: 100%;height: 100%;"src=<?php echo "./img/Livreures/".$key[6] ;?>
                            >
   	 					</div>
   	 				</div>
   	 				<div class="col-xl-8 col-sm-12">
   	 					<div class="donneText">
   	 						
   	 					<div class="ContenuP"  style="background-color:#e9eaee">
   	 					<div class="Contenu">
   	 						<label>CIN:</label>
   	 						<label> <?php echo $key[0]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Last Name:</label>
   	 						<label> <?php echo $key[1];?> </label>
   	 					</div>
   	 					</div>

   	 					<div class="ContenuP">
   	 					<div class="Contenu">
   	 						<label>First Name:</label>
   	 						<label> <?php echo $key[2]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Phone:</label>
   	 						<label> <?php echo$key[3]; ?> </label>
   	 					</div>
   	 				    </div>

   	 				   

   	 				    <div class="ContenuP" style="background-color:#e9eaee" >
   	 					<div class="Contenu">
   	 						<label>Email:</label>
   	 						<label> <?php echo$key[4]; ?> </label>
   	 					</div>
   	 					<div class="Contenu">
   	 						<label>Password:</label>
   	 						<label><?php echo$key[5]; ?> </label>
   	 					</div>
   	 				    </div>
   	 				   
   	 					</div>
   	 				
   	 				</div>
   	 				<?php } ?>
   	 			</div>
   	 		</div>
   	 	</div>
   	 <?php }
   }elseif(isset($_GET["DeleteLivr"])){
	$var = $_GET['CINLivr'];
	$Livreure->SupprimerLivr($var);
	?>
	 <div style="width: 500px;margin: 102px auto;">
        	<div class="container-fluid">
          	<div class="row">
          		<div class="col-xl-12">
          			<div class='alert alert-success ' role='alert'>
						          Livreure Bien Supprimer! </br> redirection...
			        </div>
          		</div>
          	</div>
          </div>
        </div>
	<?php
   
						      echo "<meta http-equiv='refresh' content='3 ; url=Index.php?Livreure'>";
}else{


?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<h3 class="h3 mb-0 text-gray-800"><i class="fas fa-biking"></i> Dilevery</h3>
		</div>
		<div class="col-xl-12">

	      <div class="Table-Commande">
	      	<?php
	      	 if(sizeof($rows)>0){
             ?>

	        <table class="table table1">
	        	<thead>
		                  <tr>
		                    <th scope="col">CIN</th>
		                    <th scope="col">Last Name</th>
		                    <th scope="col">First Name</th>
		                    <th scope="col">Phone</th>
		                    <th scope="col">Email</th>
		                    <th scope="col">Password</th>
		              
		                  </tr>
		                </thead>
		                <tbody>
		              <?php
		              foreach($rows as $key){
		                  echo "<tr>";
		                  echo "<td> " .$key['CIN'] ." </td>";
		                  echo "<td> " .$key['Nom'] ." </td>";
		                  echo "<td> " .$key['Prenom'] ." </td>";
		                  echo "<td> " .$key['Tele'] ." </td>";
		                  echo "<td> " .$key['Email'] ." </td>";
                          echo "<td> " .$key['MDP'] ." </td>";
                          echo "<td style='width: 214px;'>
                          <a title='Delete' href='Index.php?Livreure&DeleteLivr&CINLivr=".$key['CIN']."' class='confirme btn btn-danger'><i class=' fas fa-trash-alt'></i> </a> 
                          <a title='Edite' href='?Livreure&EditeLivr&CINLivr=".$key['CIN']."' class='btn btn-success'><i class='far fa-edit'></i></a>
                            <a title='Voir' href='?Livreure&VoirLivre&CINLivr=".$key['CIN']."' class='btn btn-success'><i class='far fa-eye'></i></a>"
                          ;

		                  echo "</td>";

		                  echo "</tr>";
		                 
		              }
		            ?>
		              
		                  
		                </tbody>
	        </table>
	         <?php }else{
	         	echo "<h1>Existe pas</h1>";
	         }?>
		  </div>
		  <a href="Index.php?Livreure&AddLivreur" class="btn btn-primary"><i class="fa fa-plus"></i>Add New Dilevery</a>
	    </div>
	</div>
   </div>
<?php } ?>